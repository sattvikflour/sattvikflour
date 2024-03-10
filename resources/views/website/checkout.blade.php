@include('website.layouts.header')
<!-- cart section -->
@include('website.partials.cart')
<!-- end cart section -->
@include('website.partials.login')
{{-- @php 
  //dd($product) 
 @endphp --}}
@php
    $products = [
        (object) ['prod_name' => 'Product A', 'quantity' => 2, 'price' => 25.0],
        (object) ['prod_name' => 'Product B', 'quantity' => 1, 'price' => 30.0],
        (object) ['prod_name' => 'Product C', 'quantity' => 3, 'price' => 15.0],
    ];

    // Example calculation for other variables
    $subtotal = 0;
    $taxRate = 0.05; // 5%
    $deliveryFee = 5.0;
    $discount = 40.0;

    foreach ($products as $product) {
        $subtotal += $product->quantity * $product->price;
    }

    $taxes = $subtotal * $taxRate;
    $totalAmount = $subtotal + $taxes + $deliveryFee;
@endphp

<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-stretch">
        <div class="col-md-6">
            <h2 class="checkout-header">Checkout</h2>

            <ul class="checkout-list">
                <li class="checkout-item">
                    <span class="checkout-label">Product Name</span>
                    <span class="checkout-label">Quantity</span>
                    <span class="checkout-label">Price</span>
                </li>
                @foreach ($cartData as $item)
                    <li class="checkout-item">
                        <span class="product-name">{{ $item['productName'] }}<br>
                            @if ($item['productType'] != null)
                                {{ ucwords(str_replace('-', ' ', $item['productType'])) }}
                            @endif
                            @if ($item['packagingOption'] != null)
                                {{ $item['packagingOption'] }}Kg
                            @endif
                        </span>
                        <span>{{ $item['quantity'] }}</span>
                        <span>${{ $item['productPrice'] }}</span>
                    </li>
                @endforeach
            </ul>

            <hr class="checkout-divider">

            <div class="checkout-item">
                <span class="checkout-label">Sub-total:</span>
                <span>${{ $subtotal }}</span>
            </div>
            <div class="checkout-item">
                <span class="checkout-label">Taxes (5%):</span>
                <span>${{ $taxes }}</span>
            </div>
            <div class="checkout-item">
                <span class="checkout-label">Delivery Fee:</span>
                <span>${{ $deliveryFee }}</span>
            </div>
            <div class="checkout-item">
                <span class="checkout-label">Discount:</span>
                <span>${{ $discount }}</span>
            </div>
            <hr class="checkout-divider">

            <div class="checkout-item total-amount">
                <span class="checkout-label">Total Payable Amount:</span>
                <span>${{ $totalAmount }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="delivery-details">
                <h3>Delivery Details</h3>
                <!-- Add the delivery address and change address button here -->
                <p>Delivery Address: Your Address Here</p>
                <button class="btn btn-primary">Change Address</button>

                <hr>

                <!-- Payment Options -->
                <h3>Payment Options</h3>
                <div class="payment-options">
                    <label>
                        <input type="radio" name="payment" value="phonepe"> PhonePe
                    </label>
                    <label>
                        <input type="radio" name="payment" value="cod"> Cash on Delivery
                    </label>
                </div>

                <!-- Place Order Button -->
                <button class="btn btn-success mt-3">Place Order</button>
            </div>
        </div>
    </div>
</div>

<!-- app section -->
@include('website.partials.app_section')
<!-- end app section -->

<!-- footer section -->
@include('website.layouts.footer')
<!-- footer section -->
