<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="{{asset('user')}}/css/user.css">
  <link rel="stylesheet" href="{{asset('user')}}/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

  <div class="wrapper">
    <h2>Login</h2>

    <form action="{{ url('login/postlogin') }}" method="POST">
      @csrf
      <div class="input-box" >
        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <div class="alert alert-danger" style="color: red; font-size: 13px">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-box" style="position: relative; margin-top: 25px;" >
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye" id="togglePassword" style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;"></i>
        @error('password')
        <div class="alert alert-danger" style="color: red; font-size: 13px">{{ $message }}</div>
        @enderror
      </div>

      <div class="policy" style=" margin-top: 25px;">
        <input type="checkbox">
        <h3> Remember password</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Login now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="{{ url('register/index') }}">register now</a></h3>
      </div>

    </form>
  </div>

  @if(session('need_verify'))
  <div id="verifyOverlay" class="verify-overlay">
    <div id="verifyBox" class="verify-alert">
      <div class="verify-alert-header">
        <span>Unverified email</span>
        <button class="verify-alert-close" onclick="closeVerifyBox()">&times;</button>
      </div>
      <p class="verify-alert-message">
        Please check your email to verify your account before logging in.
      </p>
    </div>
  </div>
  @endif

  <script src="{{asset('user')}}/js/login.js"> </script>

</body>

</html>