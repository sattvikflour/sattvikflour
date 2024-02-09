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
          <a class="navbar-brand" href="#">
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
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span> </a>
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
                    {{-- <i class="fa fa-shopping-cart"></i> {{ asset('public/assets/icons/cart.svg') }} --}}
                    <span>Cart</span><img src="{{ asset('public/assets/icons/cart.svg') }}" alt="" />
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