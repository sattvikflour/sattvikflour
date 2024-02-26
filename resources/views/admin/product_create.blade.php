@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <form id="product-form" enctype="multipart/form-data">
            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                <label for="category-dropdown">Select Product Category:<br> <br>
                <select id="category-dropdown" style="height:40px;width:200px">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
                    @endforeach
                </select>
                </label>
            </div>
            <div class="form-group">
                <label for="prod_name">Product Name:</label>
                <input type="text" class="form-control" id="prod_name" name="prod_name">
                <small id="prod_name_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="prod_original_price">Original Price:</label>
                <input type="number" class="form-control" id="prod_original_price" name="prod_original_price" step="0.01">
                <small id="prod_original_price_error" class="text-danger" style="display: none;">This field is required</small>

            </div>
            <div class="form-group">
                <label for="prod_offer_status">Offer Status:</label>
                <select class="form-control" id="prod_offer_status" name="prod_offer_status">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prod_offer_price">Offer Price:</label>
                <input type="number" class="form-control" id="prod_offer_price" name="prod_offer_price" step="0.01">
                <small id="prod_offer_price_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="prod_badge_status">Badge Status:</label>
                <select class="form-control" id="prod_badge_status" name="prod_badge_status">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prod_badge_text">Badge Text:</label>
                <input type="text" class="form-control" id="prod_badge_text" name="prod_badge_text">
                <small id="prod_badge_text_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="prod_img">Product Image:</label>
                <input type="file" class="form-control-file" id="prod_img" name="prod_img">
                <small id="prod_img_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="prod_details">Product Details:</label>
                <textarea class="form-control" id="prod_details" name="prod_details" rows="3"></textarea>
                <small id="prod_details_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="prod_description">Product Description:</label>
                <textarea class="form-control" id="prod_description" name="prod_description" rows="3"></textarea>
                <small id="prod_description_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="prod_types_avail">Types Available:</label>
                <select class="form-control" id="prod_types_avail" name="prod_types_avail">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prod_type_label">Product Type Label:</label>
                <input type="text" class="form-control" id="prod_type_label" name="prod_type_label">
                <small id="prod_type_label_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="packaging_opts_avail">Packaging Options Available:</label>
                <select class="form-control" id="packaging_opts_avail" name="packaging_opts_avail">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="packaging_opts_label">Packaging Options Label:</label>
                <input type="text" class="form-control" id="packaging_opts_label" name="packaging_opts_label">
                <small id="packaging_opts_label_error" class="text-danger" style="display: none;">This field is required</small>
            </div>
            <div class="form-group">
                <label for="prod_status">Product Status:</label>
                <select class="form-control" id="prod_status" name="prod_status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

@section('javascript')
    <script>
        // JavaScript for submitting the form
        document.getElementById('product-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // You can handle form submission using JavaScript (e.g., AJAX)
        });
    </script>

    
<script>
    $(document).ready(function() {
        console.log("Document ready");
        $('#prod_offer_status').change(function() {
            var offerStatus = $(this).val();
            if (offerStatus === '1') {
                $('#prod_offer_price_container').show();
                $('#prod_offer_price').attr('required', true);
            } else {
                $('#prod_offer_price_container').hide();
                $('#prod_offer_price').removeAttr('required');
            }
        });
    });

    $(document).ready(function() {
        console.log("Document ready");
    $('#product-form').submit(function(e) {
        console.log("Document ready");
        e.preventDefault();
        var isValid = true;

        // Validation for required fields
        $('.form-control').each(function() {
            if ($(this).prop('required') && !$(this).val()) {
                isValid = false;
                var errorId = $(this).attr('id') + '_error';
                $('#' + errorId).show(); // Show error message
            } else {
                var errorId = $(this).attr('id') + '_error';
                $('#' + errorId).hide(); // Hide error message if input is not empty
            }
        });

        if (isValid) {
            // Form submission logic here
            console.log('Form submitted successfully!');
        }
    });

    // Hide error messages when inputs change
    $('.form-control').change(function() {
        var errorId = $(this).attr('id') + '_error';
        $('#' + errorId).hide();
    });
});
</script>

@endsection