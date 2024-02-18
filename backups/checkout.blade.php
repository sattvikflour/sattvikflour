<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Home-Sattvik Flour</title>

  <!-- slider stylesheet -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/index.css') }}"/>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.css') }}"/>

  <!-- Custom styles for this template -->
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('public/css/responsive.css') }}"rel="stylesheet" />
  <link href="{{ asset('public/css/cart.css') }}"rel="stylesheet" />
  <link href="{{ asset('public/css/checkout.css') }}"rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Sattvik Flour
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="about.html"> Features </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="how.html"> About Us </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span>Cart</span> <img src="assets/icons/cart.svg" alt="" />
                  </a>
                </li>
                <li class="nav-item">
                  {{-- <a class="nav-link" href="#" id="cartIcon">
                    <span>Cart</span> <img src="assets/icons/cart.svg" alt="" />
                  </a> --}}
                  <a class="nav-link" href="#" id="cartIcon" data-toggle="modal" data-target="#cartModal">
                    <i class="fa fa-shopping-cart"></i> Cart
                </a>
                </li>
                <li class="nav-item" style="display:none">
                  <a class="nav-link" href="#"> Login</a>
                </li>
                <li class="nav-item" style="display:none">
                  <a class="nav-link" href="{{URL::to('/register')}}"> Sign Up</a>
                </li>
              </ul>
              <div class="user_option">
                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
   </div>
  </div>
    <!-- end header section -->
    <!-- cart section -->
    @include('website.partials.cart')
    <!-- end cart section -->
  {{-- @php 
  //dd($product) 
 @endphp --}}
@php
$products = [
    (object)['prod_name' => 'Product A', 'quantity' => 2, 'price' => 25.00],
    (object)['prod_name' => 'Product B', 'quantity' => 1, 'price' => 30.00],
    (object)['prod_name' => 'Product C', 'quantity' => 3, 'price' => 15.00],
];

// Example calculation for other variables
$subtotal = 0;
$taxRate = 0.05; // 5%
$deliveryFee = 5.00;
$discount = 40.00;

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
          <span class="product-name">{{ $item['productName'] }}<br>({{ $item['grindingType'] }} {{ $item['packingSize'] }})</span>
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

  <section class="app_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h2>
              Our Powerful app to connect it all
            </h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam
            </p>
            <div class="download_box">
              <h5>
                Download Now
              </h5>
              <div class="btn-box">
                <a href="">
                  <img src="{{ asset('public/assets/icons/app-store.png') }}" alt="">
                </a>
                <a href="">
                  <img src="{{ asset('public/assets/icons/play-store.png') }}" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('public/assets/icons/slider-img.png') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end app section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <div class="info_logo">
              <a href="index.html">
                <span>
                  Sattvik Flour
                </span>
              </a>
            </div>
            <h5>
              Contact Us
            </h5>
            <div>
              <div class="img-box">
                <img src="{{ asset('public/assets/icons/location.png') }}" width="18px" alt="" />
              </div>
              <p>
                Dighi, Pune
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="{{ asset('public/assets/icons/phone.png') }}" width="18px" alt="" />
              </div>
              <p>
                +91 9175113022
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="{{ asset('public/assets/icons/envelope.png') }}" width="18px" alt="" />
              </div>
              <p>
                care@sattvik.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Address
            </h5>
            <p>
           Shop No. 123,  Abcd Nagar, Pune , 400111
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Links
            </h5>
            <ul>
              <li>
                <a href="">
                  Link 1
                </a>
              </li>
              <li>
                <a href="">
                  Link 2
                </a>
              </li>
              <li>
                <a href="">
                  Link 3
                </a>
              </li>
              <li>
                <a href="">
                  Link 4
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email" />
              <button>
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2023 All Rights Reserved By
      <a href="#">Abhijit Abdagire</a>
    </p>
  </section>
  <!-- footer section -->

  <!-- Scripts -->
  <script src="{{ asset('public/js/jquery-3.7.1.js') }}"></script>
  <script src="{{ asset('public/js/popper.min.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap.js') }}"></script>
  <script src="{{ asset('public/js/cart.js') }}"></script>
  <script src="{{ asset('public/js/checkout.js') }}"></script>
</body>

</html>