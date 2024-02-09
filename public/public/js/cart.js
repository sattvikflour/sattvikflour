
      // Example JavaScript code
      $(document).ready(function () {
        // Dummy data for the cart
        var cartItems = [
            { name: 'Product 1', price: 20.00, quantity: 2 },
            { name: 'Product 2', price: 30.00, quantity: 1 },
        ];

        // Function to update the cart modal content
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

        // Function to remove an item from the cart
        window.removeItem = function (itemName) {
            cartItems = cartItems.filter(function (item) {
                return item.name !== itemName;
            });

            updateCartModal();
        };

        // Triggered when the cart icon is clicked
        $('#cartIcon').on('click', function () {
            updateCartModal();
        });
    }); 
   
   
   $(document).ready(function() {
        $('#cartBtn').on('click', function() {
            // Gather product information from data attributes
            var productName = $(this).data('product-name');
            var productPrice = 200;//$(this).data('product-price');
            var grindingType = $("input[name='grinding']:checked").val();
            var packingSize = $("input[name='packing']:checked").val();
            var quantity = $('#quantity').val();
            console.log("hello");

            // Send data to Laravel backend using AJAX
            $.ajax({
                type: 'POST',
                url: '/add-to-cart', // Replace with your actual route
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    productName: productName,
                    productPrice: productPrice,
                    grindingType: grindingType,
                    packingSize: packingSize,
                    quantity: quantity
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });