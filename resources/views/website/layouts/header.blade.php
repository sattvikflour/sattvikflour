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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/index.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/sweetalert2.css') }}"/>

  <!-- styles for template -->
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
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span> </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Features </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> About Us </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="cartIcon" data-toggle="modal" data-target="#cartModal">
                    <span>Cart</span><img src="{{ asset('public/assets/icons/cart.svg') }}" alt="" />
                </a>
                </li>
              @if (Auth::guard('user')->check())
                            <li class="nav-item">
                                  <img src="https://picsum.photos/200" alt="Profile Image" class="img-fluid rounded-circle" style="margin: 0px; width: 50px; height: 50px;">
                                </li>
                                <li class="nav-item">
                                {{-- <a href = "#" class="custom-user-section" style="align-items: center; margin:10px 5px;"> --}}
                                <a href = "#" class="nav-link" style="align-items: center; margin:10px 5px;">
                                  <span style="align-items: center"> Hello, {{ Session::get('firstname') }} </span>                               
                                </a>
                            </li>
                            <li class="nav-item">
                              <a href ="#" class="nav-link" id="logoutBtn">
                                  <i class="zmdi zmdi-power" style="font-size: 25px;"></i>
                              </a>
                          </li>
                        @else
                        <li class="nav-item">
                            <a class="btn-custom nav-link" href="#" id="loginBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.007" height="15.647" viewBox="0 0 13.007 15.647">
                                    <g id="noun-sign-in-5051222" transform="translate(-25 -19.953)">
                                      <path id="Path_6260" data-name="Path 6260" d="M37.175,21.968l-2.706-1.9a.7.7,0,0,0-.676-.052.646.646,0,0,0-.338.572v1.639h-3.9A1.965,1.965,0,0,0,27.6,24.18v2.94H25.65a.65.65,0,0,0,0,1.3H27.6v2.94a1.965,1.965,0,0,0,1.951,1.951h3.9V34.95a.646.646,0,0,0,.338.572.693.693,0,0,0,.312.078.622.622,0,0,0,.364-.13l2.706-1.9a1.949,1.949,0,0,0,.832-1.587v-8.4A1.961,1.961,0,0,0,37.175,21.968ZM29.553,31.984a.644.644,0,0,1-.65-.65V28.42h2l-.832.832a.638.638,0,0,0,.468,1.093.668.668,0,0,0,.468-.182l1.951-1.951a.629.629,0,0,0,0-.911L30.983,25.35a.644.644,0,0,0-.911.911l.832.832h-2V24.18a.644.644,0,0,1,.65-.65h3.9v8.455Z" fill="#fff"/>
                                    </g>
                                </svg>
                                Login
                            </a>
                          </li>
                            <li class="nav-item">
                            <a class="btn-custom nav-link" href="{{ URL::to('/register') }}" data-id="registerBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12.639" height="15.573" viewBox="0 0 12.639 15.573">
                                    <g id="noun-register-2738603" transform="translate(-14.03 -8)">
                                      <g id="Group_1453" data-name="Group 1453" transform="translate(14.03 8)">
                                        <path id="Path_6261" data-name="Path 6261" d="M16.179,8h9.289a1.2,1.2,0,0,1,1.2,1.2v13.17a1.2,1.2,0,0,1-1.2,1.2H16.179a1.205,1.205,0,0,1-1.2-1.2v-.307h.858a.476.476,0,0,0,.475-.475V20.8a.476.476,0,0,0-.475-.475h-.858v-.9h.858a.476.476,0,0,0,.475-.475v-.792a.476.476,0,0,0-.475-.475h-.858v-.9h.858a.476.476,0,0,0,.475-.475v-.792a.476.476,0,0,0-.475-.475h-.858v-.9h.858a.476.476,0,0,0,.475-.475v-.792a.476.476,0,0,0-.475-.475h-.858v-.9h.858a.476.476,0,0,0,.475-.475v-.792a.476.476,0,0,0-.475-.475h-.858V9.2a1.205,1.205,0,0,1,1.2-1.2Zm-1.99,2.056h1.647a.159.159,0,0,1,.158.158v.792a.159.159,0,0,1-.158.158H14.188a.159.159,0,0,1-.158-.158v-.792A.159.159,0,0,1,14.188,10.056Zm0,10.583h1.647a.159.159,0,0,1,.158.158v.792a.159.159,0,0,1-.158.158H14.188a.159.159,0,0,1-.158-.158V20.8A.159.159,0,0,1,14.188,20.639Zm0-2.646h1.647a.159.159,0,0,1,.158.158v.792a.159.159,0,0,1-.158.158H14.188a.159.159,0,0,1-.158-.158v-.792A.159.159,0,0,1,14.188,17.993Zm0-2.646h1.647a.159.159,0,0,1,.158.158V16.3a.159.159,0,0,1-.158.158H14.188a.159.159,0,0,1-.158-.158v-.792A.159.159,0,0,1,14.188,15.348Zm0-2.646h1.647a.159.159,0,0,1,.158.158v.792a.159.159,0,0,1-.158.158H14.188a.159.159,0,0,1-.158-.158v-.792A.159.159,0,0,1,14.188,12.7Zm4.19,4.442a8.625,8.625,0,0,0-.176,1.113.393.393,0,0,0,.332.433,17.964,17.964,0,0,0,2.334.2l.109-2.01c-.078-.218-.123-.111-.251-.314a.994.994,0,0,0-.175.184,2.089,2.089,0,0,0-.154.289c-.011-.177-.022-.354-.052-.565s-.079-.457-.129-.7a1.958,1.958,0,0,1-.446.32,9.4,9.4,0,0,0-.95.354A1.106,1.106,0,0,0,18.378,17.144Zm1.7-3.221a.243.243,0,0,0-.05.006.136.136,0,0,0-.076.078.375.375,0,0,0-.01.147,1.5,1.5,0,0,0,.03.2,1.871,1.871,0,0,0,.059.217.22.22,0,0,0,.064.107.307.307,0,0,0,.1.049h0l.014.213a.494.494,0,0,0,.14.321l.047.049v.379a.2.2,0,0,0,.082.166l.593.459.593-.459a.2.2,0,0,0,.082-.166v-.371l.055-.058a.5.5,0,0,0,.138-.319l.013-.205.024-.007a.3.3,0,0,0,.1-.049.235.235,0,0,0,.064-.1A1.3,1.3,0,0,0,22.2,14.4a1.384,1.384,0,0,0,.032-.2.484.484,0,0,0-.008-.181.134.134,0,0,0-.085-.085.191.191,0,0,0-.054-.012v-.007l.02-.022a.861.861,0,0,0,.166-.46,1.021,1.021,0,0,0-.095-.54.248.248,0,0,0-.26-.108.611.611,0,0,0-.183-.368.966.966,0,0,0-.548-.2,1.067,1.067,0,0,0-.594.157c-.142.084-.27.2-.371.271a.809.809,0,0,0-.323.836,1.087,1.087,0,0,0,.159.406l.008.009v.008c0,.006.018.012.006.015Zm1.19,2.955.146,2.013a14.184,14.184,0,0,0,2.316-.186.392.392,0,0,0,.32-.431,8.713,8.713,0,0,0-.178-1.13,1.107,1.107,0,0,0-.443-.7,9.441,9.441,0,0,0-.95-.354,1.953,1.953,0,0,1-.446-.32c-.049.246-.1.492-.129.7s-.041.388-.052.565a2.063,2.063,0,0,0-.154-.289.979.979,0,0,0-.175-.184C21.4,16.762,21.351,16.673,21.263,16.878Z" transform="translate(-14.03 -8)" fill="#fff"/>
                                      </g>
                                    </g>
                                </svg>
                                Register
                            </a>
                            </li>
                            <span id="menu-btn"></span>
                        @endif
                      </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>