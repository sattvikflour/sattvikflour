<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Product Form</title>
</head>
<body>

<div class="container mt-5">
    <h2>Add New Product</h2>
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" >
        @csrf

        <!-- Product Category ID (Assuming you have a select input for categories) -->
        <div class="form-group">
            <label for="prodCategory">Product Category:</label>
            <input type="text" class="form-control" id="prodCategory" name="prodCategory">
            {{-- <select class="form-control" id="prodCategory" name="prodCategory">
                <!-- Options will be dynamically populated from your categories -->
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <!-- Add more options as needed -->
            </select> --}}
        </div>

        <!-- Product Name -->
        <div class="form-group">
            <label for="prodName">Product Name:</label>
            <input type="text" class="form-control" id="prodName" name="prodName">
        </div>

        <!-- Product Original Price -->
        <div class="form-group">
            <label for="prodOriginalPrice">Product Original Price:</label>
            <input type="text" class="form-control" id="prodOriginalPrice" name="prodOriginalPrice">
        </div>

        <!-- Product Offer Status and Offer Price -->
        <div class="form-group">
            <label for="prodOfferStatus">Product Offer Status:</label>
            <select class="form-control" id="prodOfferStatus" name="prodOfferStatus" onchange="toggleOfferField()">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prodOfferPrice">Product Offer Price:</label>
            <input type="text" class="form-control" id="prodOfferPrice" name="prodOfferPrice" disabled>
        </div>

        <!-- Product Badge Status -->
        <div class="form-group">
            <label for="prodBadgeStatus">Product Badge Status:</label>
            <select class="form-control" id="prodBadgeStatus" name="prodBadgeStatus" onchange="toggleBadgeField()">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prodBadgeText">Product Badge Text:</label>
            <input type="text" class="form-control" id="prodBadgeText" name="prodBadgeText" disabled>
        </div>

        <!-- Product Image -->
        <div class="form-group">
            <label for="prod_img">Product Image URL:</label>
            <input type="file" class="form-control" id="prod_img" name="prod_img">
        </div>

        <!-- Product Details -->
        <div class="form-group">
            <label for="prodDetails">Product Details:</label>
            <textarea class="form-control" id="prodDetails" name="prodDetails" rows="3"></textarea>
        </div>

        <!-- Product Description -->
        <div class="form-group">
            <label for="productDescription">Product Description:</label>
            <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
        </div>

      <!-- Product Status -->
        <div class="form-group">
            <label for="prodStatus">Product Status:</label>
            <select class="form-control" id="prodStatus" name="prodStatus">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Product</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function toggleOfferField() {
        var selectedOfferStatus = document.getElementById("prodOfferStatus").value;
        var prodOfferPrice = document.getElementById("prodOfferPrice");

        // You can customize this logic based on your specific requirements
        if (selectedOfferStatus === "1") {
            prodOfferPrice.disabled = false;
        } else {
            prodOfferPrice.disabled = true;
        }
    }
</script>

<script>
    function toggleBadgeField() {
        var selectedBadgeStatus = document.getElementById("prodBadgeStatus").value;
        var badgetext = document.getElementById("prodBadgeText");

        // You can customize this logic based on your specific requirements
        if (selectedBadgeStatus === "1") {
            badgetext.disabled = false;
        } else {
            badgetext.disabled = true;
        }
    }
</script>
</body>
</html>