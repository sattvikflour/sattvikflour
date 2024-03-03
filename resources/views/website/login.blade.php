@include('website.layouts.header')
<!-- slider section -->
@include('website.partials.slider')
<!-- end slider section -->
<!-- cart section -->
@include('website.partials.cart')
@include('website.partials.logout_modal')
@php 
//dd($categories) 
@endphp
<div class="col-lg-5 offset-lg-2 border-double border-4 border-primary p-4">
    <div class="box-rounded bg-white p-4">
        <h3 class="mb-4 text-center">Sign In</h3>
        <p class="text-center">Login using an existing account or create a new account <a
                href="{{ URL::to('register') }}">here<span></span></a>.</p>
        <form id="form" class="form-border" method="post" action="{{ URL::to('login-submit') }}" autocomplete="off">
            @csrf
            @if (Session::get('status') == 'success')
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

            @if (Session::get('status') == 'error')
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="mb-3">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                    required>
            </div>

            <div class="mb-3">
                <div class="input-group-merge form-password-toggle">
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Password" required minlength="8">
                    {{-- <span toggle="#password-field" class="zmdi zmdi-eye toggle-password"></span> --}}
                </div>
                <label id="password-error" class="error" for="password"></label>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="rememberme" id="rememberme" class="form-check-input">
                    <label class="form-check-label" for="rememberme">Remember Me</label>
                </div>
                <a href="{{ URL::to('forgot-password') }}"
                    class="text-decoration-none d-block mt-2">Forgot Password?</a>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-custom btn-fullwidth bg-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


  <!-- app section -->
  @include('website.partials.app_section')
  <!-- end app section -->
  @include('website.layouts.footer')



