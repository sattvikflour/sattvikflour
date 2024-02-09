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
    <!-- slider section -->
    <!-- end slider section -->
  {{-- @php 
  //dd($product) 
 @endphp --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('public/assets/images/' . $product->prod_img) }}" class="img-fluid" alt="{{ $product->prod_name }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->prod_name }}</h2>
                <p>{{ $product->prod_description }}</p>
                
                <div class="grinding-options mt-4">
                  <label for="grinding-options" class="font-weight-bold">Type of Grinding</label>
                  <div class="form-check">
                      <input type="radio" class="form-check-input" id="fine-grind" name="grinding" value="fine-grind">
                      <label class="form-check-label" for="fine-grind">Fine Grind</label>
                  </div>
                  <div class="form-check">
                      <input type="radio" class="form-check-input" id="normal-grind" name="grinding" value="normal-grind">
                      <label class="form-check-label" for="normal-grind">Normal Grind</label>
                  </div>
                  <div class="form-check">
                      <input type="radio" class="form-check-input" id="coarse-grind" name="grinding" value="coarse-grind">
                      <label class="form-check-label" for="coarse-grind">Coarse Grind</label>
                  </div>
              </div>

                <div class="packing-options mt-4">
                    <label for="packing-options" class="font-weight-bold">Available Packing Options</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="10kg" name="packing" value="10kg">
                        <label class="form-check-label" for="10kg">10 Kg</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="5kg" name="packing" value="5kg">
                        <label class="form-check-label" for="5kg">5 Kg</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="2kg" name="packing" value="2kg">
                        <label class="form-check-label" for="2kg">2 Kg</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="1kg" name="packing" value="1kg">
                        <label class="form-check-label" for="1kg">1 Kg</label>
                    </div>
                </div>

                <div class="order-quantity mt-4">
                    <label for="quantity" class="font-weight-bold">Order Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success btn-rectangle" id="cartBtn" data-product-name="{{ $product->prod_name }}" data-product-price="{{ $product->prod_price }}">Add to Cart</button>
                    <button class="btn btn-primary btn-rectangle">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center" style="width: 100%;" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" id="cartItems">
              <!-- Cart items will be displayed here -->
          </div>
          <div class="modal-footer">
              <p class="total-price">Total Price: $0.00</p>
              <button type="button" class="btn btn-primary" id="checkoutBtn" onclick="location.href='/checkout'">Checkout</button>
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
                  <img src="{{ asset('public/assets/icons/play-store.png') }}" style="size: 10px" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('public/assets/icons/slider-img.svg') }}" alt="">
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

  <script src="{{ asset('public/js/jquery-3.7.1.js') }}"></script>
  <script src="{{ asset('public/js/popper.min.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap.js') }}"></script>
  <script src="{{ asset('public/js/cart.js') }}"></script>
  <script src="{{ asset('public/js/checkout.js') }}"></script>

</body>

</html>