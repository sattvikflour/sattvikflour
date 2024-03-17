@extends('admin.layouts.layout')
@section('title')
    Categories - Admin
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('public/css/draggable.css') }}"> --}}
    <style>
        .item {
            cursor: move;
            /* Enables drag functionality */
        }

        .item.dragging {
            opacity: 0.6;
            /* Sets opacity of dragged item */
        }

        .item.dragging :where(.details, i) {
            opacity: 0;
            /* Hides details and icon of dragged item */
        }
    </style>
@endsection
@section('content')
    <h2>Category List</h2>
    <div class="container mt-4">
        <div class="mb-4">
            <button id="add-category" class="btn btn-primary mr-2">Add Category</button>
            <button id="save-order"class="btn btn-success" onclick="saveOrder()">Save Order</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Display Order</th>
                    <th>Category Name</th>
                    <th>Availability Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="sortable-list">
                @foreach ($categories as $category)
                    <tr class="item" draggable="true">
                        <td>{{ $category->id }}</td>
                        <td class="display_order display-order" id="display{{ $category->id }}">
                            @if ($category->display_order == null)
                                {{ $category->id }}
                            @else
                                {{ $category->display_order }}
                            @endif
                        </td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->avail_status }}</td>
                        <td>
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}">
                                <img src="/public/assets/icons/edit.png" alt="Edit" style="width: 40px;">
                            </a>
                            {{-- <div class="drag-handle"> --}}
                            <img src="/public/assets/icons/drag.png" alt="drag" style="width: 40px;">
                            {{-- </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('public/js/draggable.js') }}"></script>
    <script>
        document.getElementById("add-category").addEventListener("click", function() {
            window.location.href = "{{ route('category.create') }}";
        });
    </script>
    <script>
        function saveOrder() {
            // Prepare data
            var orderData = [];
            $('#products-table tbody tr').each(function() {
                var productId = $(this).find('.display-order').attr('id').replace('display-order',
                    ''); //first removing display-order from id attr
                var displayOrder = $(this).find('.display-order').text();
                orderData.push({
                    id: productId,
                    display_order: displayOrder
                });
            });
            var csrfToken = '{{ csrf_token() }}';
            $.ajax({
                url: "{{ URL::to('ajax-update-product-order') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    _token: csrfToken,
                    order_data: orderData
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
