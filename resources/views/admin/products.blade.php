@extends('admin.layouts.layout')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<style>
    /* Custom CSS for draggable icon */
    .drag-handle {
        cursor: move;
    }
</style>
@endsection
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <select id="category-dropdown" style="height:40px;width:200px">
        <option value="all">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
        @endforeach
    </select>
    <div>
        <button id="add-product" class="btn btn-primary mr-2">Add Product</button>
        <button id="save-order"class="btn btn-success" onclick="saveOrder()" style="display: none;">Save Order</button>
    </div>
</div>
{{-- <div class="dropdown mb-5">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="category-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      All Categories
    </button>
    <div class="dropdown-menu" aria-labelledby="category-dropdown">
      <a class="dropdown-item" href="#" data-value="6">All Categories</a>
      @foreach($categories as $category)
          <a class="dropdown-item" href="#" data-value="{{ $category->id }}">{{ $category->category_name }}</a>
      @endforeach
    </div>
  </div> --}}
  
{{-- @dd($category ,$products) --}}

<!-- HTML structure for the table -->
<table id="products-table" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Checkbox</th>
            <th>ID</th>
            <th>Display Order</th>
            <th>Product Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- table body -->
    </tbody>
</table>

@endsection
@section('javascript')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    document.getElementById("add-product").addEventListener("click", function() {
        window.location.href = "{{ route('product.create') }}";
    });
</script>

<script>
    $(document).ready(function() {
    let dataListView = $('#products-table').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    searching: false,
    ajax: {
        url: "{{ URL::to('ajax-get-products') }}",
        data: function(d) {
            d.category_id = $('#category-dropdown').val();
            return d;
        },
        "draw": 1,
        "recordsTotal": 0,
        "recordsFiltered": 0
    },
    columns: [
        {
            data: 'checkbox',
        },
        {
            data: "id"
        },
        {
            data: "display_order",
        },
        {
            data: "prod_name"
        },
        {
            data: "action"
        }
    ],
    columnDefs: [{
            targets: 0,
            orderable: false,
            responsivePriority: 3,
            render: function(data, type, full) {
                return (
                    `<div class="form-check">
                        <input class="form-check-input dt-checkboxes" type="checkbox" value=${full['id']} id="checkboxId${full['id']}" />
                        <label class="form-check-label" for="checkboxId${full['id']}"></label>
                    </div>`
                );
            }
        },
        {
            targets: 1,
            render: function(data, type, full) {
                return `<span class="text-capitalize">${full['id']}</span>`;
            }
        },
        {
            targets: 2,
            render: function(data, type, full) {
                return `<span id="display-order${full['id']}" class="display-order text-capitalize">${full['display_order']}</span>`;
            }
        },
        {
            targets: 3,
            render: function(data, type, full) {
                return `<span class="text-capitalize">${full['prod_name']}</span>`;
            }
        },
        {
            // Actions 
            targets: -1,
            title: "Actions",
            orderable: false,
            render: function(data, type, full) {
                let actions = '';
                actions += `<a href="${full['edit']}" class="btn btn-sm btn-info m-1" title="Edit Product"> Edit </a>`;
                actions += `<a href="${full['delete']}" class="action-delete btn btn-sm btn-danger m-1" data-id=${full['id']}>Delete</a>`;
                actions += `<span class="drag-handle">&#9776;</span>`;
                return actions;
            }
        }
    ],
    language: {
        processing: "Loading...",
    },
    order: [], // Remove order since it's not needed here
        draw: 1,
        recordsTotal: 0,
        recordsFiltered: 0
});

        $('#products-table tbody').sortable({
        update: function(event, ui) {
            // Update the display order values
            $('#products-table tbody tr').each(function(index) {
                $(this).find('.display-order').text(index + 1);
            });
        }
    }).disableSelection();

$('#category-dropdown').on('change', function() {
        dataListView.ajax.url("{{ URL::to('ajax-get-products') }}?category_id=" + $(this).val()).load();
    });
});
</script>

<script>
    function saveOrder() {
        // Prepare data
        var orderData = [];
        $('#products-table tbody tr').each(function() {
            var productId = $(this).find('.display-order').attr('id').replace('display-order', ''); //first removing display-order from id attr
            var displayOrder = $(this).find('.display-order').text();
            orderData.push({ id: productId, display_order: displayOrder });
        });
        var csrfToken = '{{ csrf_token() }}';
        $.ajax({
            url: "{{ URL::to('ajax-update-order') }}",
            type: "POST",       
             headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: { _token: csrfToken, order_data: orderData },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    </script>

<script>

    // Listen for changes in the dropdown selection
    $('#category-dropdown').change(function() {
        var selectedValue = $(this).val();
        
        // If "All Categories" is selected, hide the "Save Order" button; otherwise, show it
        if (selectedValue === 'all') {
            $('#save-order').hide();
        } else {
            $('#save-order').show();
        }
    });
</script>


{{-- //Below also work --}}
{{-- <script>

$(document).ready(function() {
    let dataListView = $('#products-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        searching: false,
        ajax: {
            url: "{{ URL::to('ajax-get-products') }}",
            data: function(d) {
                d.category_id = 9;//$('#category-dropdown').val();
            }
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            },
            {
                data: "id"
            },
            {
                data: "display_order",
                name: "display_order"
            },
            {
                data: "prod_name",
                name: "prod_name"
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ],
        language: {
            processing: "Loading..."
        },
        order: [], // Remove order since it's not needed here
        draw: 1,
        recordsTotal: 0,
        recordsFiltered: 0
    });
});

    </script> --}}
@endsection