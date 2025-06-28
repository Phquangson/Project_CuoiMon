<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="{{asset('user')}}/css/user.css">
   </head>
<body>

  <div class="wrapper">
    <h2>Login</h2>
    <form action="#" method="post">
      <div class="input-box">
        <input type="text" placeholder="username" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="password" required>
      </div>
      <div class="policy">
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
  
</body>
</html>