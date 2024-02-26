<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
</head>
<body>

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="categoryDropdown" class="form-label">Select Category:</label>
            <select class="form-select" id="categoryDropdown">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <table class="table table-bordered" id="productTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <!-- Add your actions buttons here, e.g., edit, delete, etc. -->
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper.js (for dropdown functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eZbK1js3mMAqK3LozuUnApVI9H43uK7lsrS+4Y5PVrC3FO8fIWSsFXxqXlFi+00E" crossorigin="anonymous"></script>

<!-- jQuery (ensure it is loaded before your custom script) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-oTJ8LOr9W5J2YRYjEznjPL9F8cl+CcPXBynv9+L2yv6Z2acKlQnbO7bb+RyoNhoj" crossorigin="anonymous"></script>

<script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Attach an event listener to the category dropdown
        $('#categoryDropdown').change(function() {
            // Get the selected category ID
            var categoryId = $(this).val();

            // Make an AJAX request to fetch products based on the selected category
            $.ajax({
                url: '/get-products/' + categoryId, // Update the URL based on your Laravel route
                type: 'GET',
                success: function(data) {
                    // Replace the content of the product table with the new products
                    $('#productTable tbody').html(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

</body>
</html>
