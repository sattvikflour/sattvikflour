<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/admin.css') }}">
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="navbar-brand">
            {{-- <img src="{{ asset('path/to/company/logo.png') }}" alt="Company Logo" width="250">  --}}
            Sattvik Flour
        </div>
        <div class="welcome-text mr-3 nav navbar-nav navbar-right p-3 ">
            <span class="text-white">Welcome Super Admin</span>
        </div>
        <div>
            <button class="btn btn-outline-light" id="logoutBtn">
                 Logout <i class="zmdi zmdi-power"></i>
            </button>
        </div>
    </nav>  
    <div class="sidebar">
        <ul>
            <li class="active">
                <a href="/admin/dashboard" class="toggled waves-effect waves-block">
                    <i class="zmdi zmdi-home"></i>
                    <span>Dashboard</span> 
                </a>
            </li>
            <li>
                <a href="/categories" class="waves-effect waves-block">
                    <i class="zmdi zmdi-view-list"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="" class="waves-effect waves-block">
                    <i class="zmdi zmdi-shopping-cart"></i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="" class="waves-effect waves-block">
                    <i class="zmdi zmdi-accounts"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="" class="waves-effect waves-block">
                    <i class="zmdi zmdi-settings"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>    
    <div class="content">
        @yield('content')
    </div>

    <!-- Logout Modal -->
{{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmLogout">Logout</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="zmdi zmdi-alert-circle zmdi-hc-5x text-warning mb-3"></i>
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmLogout">Logout</button>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('public/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/js/admin.js') }}"></script>
    @yield('javascript')
</body>
</html>
