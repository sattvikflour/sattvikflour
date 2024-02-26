@extends('admin.layouts.layout')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
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
        <button class="btn btn-primary mr-2">Add Product</button>
        <button class="btn btn-success">Save Order</button>
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
        <!-- table body will be filled dynamically by jquery datatable -->
    </tbody>
</table>

@endsection
@section('javascript')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

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
                return `<span class="text-capitalize">${full['display_order']}</span>`;
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
                actions += `<button class="action-delete btn btn-sm btn-danger m-1" data-id=${full['id']}>Delete</button>`;
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
$('#category-dropdown').on('change', function() {
        dataListView.ajax.url("{{ URL::to('ajax-get-products') }}?category_id=" + $(this).val()).load();
    });
});
</script>

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