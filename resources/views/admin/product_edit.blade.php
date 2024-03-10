@extends('admin.layouts.layout')
@section('css')
    <style>
        #prod-offer-price-container,
        #prod-badge-text-container,
        #prod-type-label-container,
        #packaging-opts-label-container {
            display: none;
        }

        .form-group .input-group .btn {
            margin-right: 15px;
        }

        .card {
            min-height: 400px;
            min-width: ;
        }
    </style>
@endsection

{{-- @dd($product); --}}

@section('content')
    <div class="container row mt-4 mb-4">
        <div class="col-md-7 col-lg-7">
            <div class="card w-100">
                <div class="card-body">
                    <form id="product-form" method="POST" action="{{ route('product.update', ['id' => $product->id]) }}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                            <label for="category-dropdown">Select Product Category:<br> <br>
                                <select id="category-dropdown" name="product-category" style="height:40px;width:200px">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="prod-name">Product Name:</label>
                            <input type="text" class="form-control" id="prod-name" name="prod-name"
                                value ="{{ $product->prod_name }}" required>
                            <small id="prod-name-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="prod-original-price">Original Price:</label>
                            <input type="number" class="form-control" id="prod-original-price" name="prod-original-price"
                                value ="{{ $product->prod_original_price }}" step="0.01" required>
                            <small id="prod-original-price-error" class="text-danger" style="display: none;">This field is
                                required</small>

                        </div>
                        <div class="form-group">
                            <label for="prod-offer-status">Offer Status:</label>
                            <select class="form-control" id="prod-offer-status" name="prod-offer-status">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group" id="prod-offer-price-container">
                            <label for="prod-offer-price">Offer Price:</label>
                            <input type="number" class="form-control" id="prod-offer-price" name="prod-offer-price"
                                value ="{{ $product->prod_offer_price }}" step="0.01">
                            <small id="prod-offer-price-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="prod-badge-status">Badge Status:</label>
                            <select class="form-control" id="prod-badge-status" name="prod-badge-status">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group" id="prod-badge-text-container">
                            <label for="prod-badge-text">Badge Text:</label>
                            <input type="text" class="form-control" id="prod-badge-text" name="prod-badge-text">
                            <small id="prod-badge-text-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="multi-img-avail">Multiple Image Available:</label>
                            <select class="form-control" id="multi-img-avail" name="multi-img-avail">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prod-img">Product Image:</label>
                            <input type="file" class="form-control-file" id="prod-img" name="prod-img" required>
                            <small id="prod-img-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="prod-details">Product Details:</label>
                            <textarea class="form-control" id="prod-details" name="prod-details" rows="3" required></textarea>
                            <small id="prod-details-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="prod-description">Product Description:</label>
                            <textarea class="form-control" id="prod-description" name="prod-description" rows="3"></textarea>
                            <small id="prod-description-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="prod-summary">Product Summary:</label>
                            <textarea class="form-control" id="prod-summary" name="prod-summary" rows="3"></textarea>
                            <small id="prod-summary-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="prod-types-avail">Types Available:</label>
                            <select class="form-control" id="prod-types-avail" name="prod-types-avail">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group" id="prod-type-label-container">
                            <label for="prod-type-label">Product Type Label:</label>
                            <input type="text" class="form-control" id="prod-type-label" name="prod-type-label">
                            <small id="prod-type-label-error" class="text-danger" style="display: none;">This field is
                                required</small>
                        </div>
                        <div class="form-group">
                            <label for="packaging-opts-avail">Packaging Options Available:</label>
                            <select class="form-control" id="packaging-opts-avail" name="packaging-opts-avail">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group" id="packaging-opts-label-container">
                            <label for="packaging-opts-label">Packaging Options Label:</label>
                            <input type="text" class="form-control" id="packaging-opts-label"
                                name="packaging-opts-label">
                            <small id="packaging-opts-label-error" class="text-danger" style="display: none;">This field
                                is required</small>
                        </div>
                        <div class="form-group">
                            <label for="prod-specs-avail">Product Specifications Available:</label>
                            <select class="form-control" id="prod-specs-avail" name="prod-specs-avail">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prod-status">Product Status:</label>
                            <select class="form-control" id="prod-status" name="prod-status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-5">
        <h3>Product Packaging Options</h3>
        <form id="packagingForm">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary add-option-btn" type="button">Add</button>
                    </div>
                </div>
            </div>
        </form>
       </div> --}}

        <div class="col-md-5 col-lg-5">
            <div class="row mb-4">
                <div class="card w-100">
                    <div class="card-body">
                        <h3>Product Type</h3>
                        <div class="form-group">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary add-type-btn" type="button">Add</button>
                                <button class="btn btn-outline-secondary save-type-btn" type="button">Save</button>
                            </div>
                        </div>
                        <form id="prodTypeForm">
                            @csrf
                            <div class="form-group">
                                <label for="prodType">Packaging Option</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="prodType" name="productType[]">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary remove-type-btn"
                                            type="button">Remove</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card w-100">
                    <div class="card-body">
                        <h3>Product Packaging Options</h3>
                        <div class="form-group">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary add-option-btn" type="button">Add</button>
                                <button class="btn btn-outline-secondary save-option-btn" type="button">Save</button>
                            </div>
                        </div>
                        <form id="packagingOptForm">
                            @csrf
                            <div class="form-group">
                                <label for="packagingOption">Packaging Option</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="packagingOption"
                                        name="packagingOption[]">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary remove-option-btn"
                                            type="button">Remove</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#prod-offer-status').change(function() {
                var offerStatus = $(this).val();
                if (offerStatus === '1') {
                    $('#prod-offer-price-container').css('display', 'block');
                    $('#prod-offer-price').attr('required', true);
                } else {
                    $('#prod-offer-price-container').css('display', 'none');
                    $('#prod-offer-price').removeAttr('required');
                }
            });

            // prod-badge-status dropdown
            $('#prod-badge-status').change(function() {
                var badgeStatus = $(this).val();
                if (badgeStatus === '1') {
                    $('#prod-badge-text-container').css('display', 'block');
                    $('#prod-badge-text').attr('required', true);
                } else {
                    $('#prod-badge-text-container').css('display', 'none');
                    $('#prod-badge-text').removeAttr('required');
                }
            });

            $('#prod-types-avail').change(function() {
                var typesAvail = $(this).val();
                if (typesAvail === '1') {
                    $('#prod-type-label-container').css('display', 'block');
                    $('#prod-type-label').attr('required', true);
                } else {
                    $('#prod-type-label-container').css('display', 'none');
                    $('#prod-type-label').removeAttr('required');
                }
            });

            $('#packaging-opts-avail').change(function() {
                var packagingOpts = $(this).val();
                if (packagingOpts === '1') {
                    $('#packaging-opts-label-container').css('display', 'block');
                    $('#packaging-opts-label').attr('required', true);
                } else {
                    $('#packaging-opts-label-container').css('display', 'none');
                    $('#packaging-opts-label').removeAttr('required');
                }
            });
        });

        $(document).ready(function() {
            $('#product-form').submit(function(event) {
                var isValid = true;

                $('.form-control').each(function() {
                    if ($(this).prop('required') && !$(this).val()) {
                        isValid = false;
                        var errorId = $(this).attr('id') + '-error';
                        $('#' + errorId).show();
                    } else {
                        var errorId = $(this).attr('id') + '-error';
                        $('#' + errorId).hide();
                    }
                });
                //auto focus scroll
                if (!isValid) {
                    var firstError = document.querySelector('.text-danger');
                    var navbarHeight = $('#navbar').outerHeight() + 55;

                    if (firstError) {
                        event.preventDefault();
                        var errorPosition = firstError.getBoundingClientRect().top + window.scrollY;
                        window.scrollTo({
                            top: errorPosition - navbarHeight,
                            behavior: 'smooth'
                        });
                    }
                }
            });

            $('.form-control').change(function() {
                var errorId = $(this).attr('id') + '-error';
                $('#' + errorId).hide();
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            //Product Type JS

            $(".add-type-btn").click(function() {
                var productTypeHtml = `
                <div class="form-group">
                    <label for="prodType">Packaging Option</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="prodType" name="productType[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary remove-type-btn" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            `;
                $("#prodTypeForm").append(productTypeHtml);
            });

            $(document).on("click", ".remove-type-btn", function() {
                $(this).closest(".form-group").remove();
            });

            $("#prodTypeForm").submit(function(e) {
                e.preventDefault();
            });

            $(".save-type-btn").click(function() {

                var productId = "{{ $product->id }}";
                var formData = $("#prodTypeForm").serialize();
                formData += "&product_id=" + productId;
                $.ajax({
                    type: "POST",
                    url: "{{ route('ajax-packaging-options') }}",
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    //     'Authorization': 'Bearer ' + '',
                    // },
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            //Packaging Options JS


            $(".add-option-btn").click(function() {
                var packagingOptionHtml = `
                <div class="form-group">
                    <label for="packagingOption">Packaging Option</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="packagingOption" name="packagingOption[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary remove-option-btn" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            `;
                $("#packagingOptForm").append(packagingOptionHtml);
            });

            $(document).on("click", ".remove-option-btn", function() {
                $(this).closest(".form-group").remove();
            });

            $("#packagingOptForm").submit(function(e) {
                e.preventDefault();
            });

            $(".save-option-btn").click(function() {

                var productId = "{{ $product->id }}";
                var formData = $("#packagingOptForm").serialize();
                formData += "&product_id=" + productId;
                $.ajax({
                    type: "POST",
                    url: "{{ route('ajax-packaging-options') }}",
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    //     'Authorization': 'Bearer ' + '',
                    // },
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
