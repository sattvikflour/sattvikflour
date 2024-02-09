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
    <!-- end header section -->
    <!-- slider section -->
    <!-- end slider section -->
  @php 
  //dd($products) 
  @endphp
  <div class="row mt-4 mb-4 mx-4">
    {{-- @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
              <a href="{{route("prod_id",["prod_id"=>$product->id])}}">
                <img src="{{ asset('public/assets/images/' . $product->prod_img)}}" class="card-img-top" alt="{{ $product->prod_name }}">
              </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->prod_name }}</h5>
                    <a href="{{route("prod_id",["prod_id"=>$product->id])}}" class="btn btn-primary btn-block">Order Now</a>
                </div>
            </div>
        </div>
    @endforeach --}}
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card position-relative">
            @if($product->prod_badge_status == 1)
                <span class="badge badge-primary badge-top-right">{{ $product->prod_badge_text }}</span>
            @endif
            <a href="{{ route('prod_id', ['prod_id' => $product->id]) }}">
                <img src="{{ asset('public/assets/images/' . $product->prod_img) }}" class="card-img-top" alt="{{ $product->prod_name }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ $product->prod_name }}</h5>
                @if($product->prod_offer_status == 1)
                    <p class="card-text"><b>
                      Rs. {{ $product->prod_offer_price }}</b>
                        <del>Rs. {{ $product->prod_original_price }}</del>
                    </p>
                @else
                    <p class="card-text text-center"><b>Rs. {{ $product->prod_original_price }}</b></p>
                @endif
                <div class="d-flex justify-content-between">
                  <button class="btn btn-success btn-rectangle" id="cartBtn">Add to Cart</button>
                  <button href="{{ route('prod_id', ['prod_id' => $product->id]) }}" class="btn btn-primary btn-rectangle">Order Now</button>
              </div>
            </div>
        </div>
    </div>
@endforeach
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