
      $(document).ready(function () {
        var cartItems = [
            { name: 'Product 1', price: 20.00, quantity: 2 },
            { name: 'Product 2', price: 30.00, quantity: 1 },
        ];

        // update cart
        function updateCartModal() {
            var cartItemsHtml = '';
            var totalPrice = 0;

            cartItems.forEach(function (item) {
                var itemTotal = item.price * item.quantity;
                totalPrice += itemTotal;

                cartItemsHtml += '<div class="cart-item">';
                cartItemsHtml += '<span>' + item.name + ' - $' + item.price.toFixed(2) + ' x ' + item.quantity + '</span>';
                cartItemsHtml += '<button class="btn btn-danger btn-sm" onclick="removeItem(\'' + item.name + '\')">Remove</button>';
                cartItemsHtml += '</div>';
            });

            $('#cartItems').html(cartItemsHtml);
            $('.total-price').text('Total Price: $' + totalPrice.toFixed(2));
        }

        // Remove an item from the cart
        window.removeItem = function (itemName) {
            cartItems = cartItems.filter(function (item) {
                return item.name !== itemName;
            });

            updateCartModal();
        };

        $('#cartIcon').on('click', function () {
            updateCartModal();
        });
    }); 
   
   
   $(document).ready(function() {
        $('#cartBtn').on('click', function() {
            var productId = $(this).data('product-id');
            var productType = $("input[name='product-type']:checked").val();
            var packagingOption = $("input[name='packaging']:checked").val();
            var quantity = $('#quantity').val();
            console.log("Added Successfully");

                    // Create data object with required parameters
        var data = {
            productId: productId,
            quantity: quantity
        };

        // if type available
        if (productType) {
            data.productType = productType;
        }

        // if packagingOption available
        if (packagingOption) {
            data.packagingOption = packagingOption;
        }

            // AJAX Call
            $.ajax({
                type: 'POST',
                url: '/ajax-add-to-cart',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });