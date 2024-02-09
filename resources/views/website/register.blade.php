<!DOCTYPE html>
<html lang="en">
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
    <div id="registerForm" class="reg">
        <div class=regcontainer>
          <h3>Fill Up Below Form to Register</h3>
          <div>
            <form id="myForm" method="POST" action="{{ route('registration-submit') }}" onsubmit="return validateForm()">
                @csrf
              <label for="firstname">Enter your Full Name</label><br>
              <input name="firstname" id="firstname" type="text" required><br><br>
    
              <label for="lastname">Enter your Last Name</label><br>
              <input name="lastname" id="lastname" type="text" required><br><br>
    
              <label for="address">Enter your Address</label><br>
              <input name="address" id="address" type="text" required><br><br>
    
              <label for="city">Enter your City</label><br>
              <input name="city" id="city" type="text" value="Pune" readonly><br><br>
    
              <label for="number">Enter your Phone Number</label><br>
              <input type="tel" name="number" id="number" pattern="[0-9]{10}" maxlength="10"
                onchange="checkNumberAvailability()" required><br><br>
    
              <div id="availabilitysection" style="display:none">
                <span id="availablemsg" style="color:green"></span><br><br>
              </div>
              <div id="errorsection" style="display:none">
                <span id="error" style="color:red"></span><br><br>
              </div>
            <div>
              <label for="password">Enter your Password</label><br>
              <div class="password-input-container">
              <input type="password" name="password" id="password" type="text" required  minlength="8" onchange = "checkPassword()">
             <div id="togglePassword" class="eye-icon" onclick= "togglePasswordVisibility('password', 'togglePassword')">
                <img src="public/logos/eyeclosed.svg" alt="Toggle Password Visibility">
                </div>
              </div>
              <span id="passwordError" style="color: red;"></span>
              <br><br>
              </div>
    
            <div>
                <label for="confirmPassword">Confirm Password:</label>
                <div class="password-input-container">
                <input type="password" id="confirmPassword" name="confirmPassword" required minlength="8" onchange = "checkPassword()">
             <div id="toggleConfPassword" class="eye-icon" onclick="togglePasswordVisibility('confirmPassword', 'toggleConfPassword')">
                <img src="public/logos/eyeclosed.svg" alt="Toggle Password Visibility">
                </div>
              </div>
                <span id="confirmPasswordError" style="color: red;"></span>
              <br><br>
            </div>
    
              <button type="submit">Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    
      <script src="/js1/register.js')}}"></script>
</body>
</html>