<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link rel="stylesheet" href="{{asset('user')}}/register.css">
</head>

<body>

    <div class="wrapper">
        <h2>Registration</h2>
        <form action="{{ url('register/save') }}" method="post">
            @csrf

            <div class="input-box ">
                <input type="text" name="name" placeholder="Enter your name"  required>
                @error('name')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="input-box" style="margin-top: 25px;">
                <input type="email" name="email" placeholder="Enter your email"  required>
                @error('email')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="input-box"  style="margin-top: 25px;">
                <input type="password" name="password" placeholder="Create password" required>
                @error('password')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="input-box " style="margin-top: 25px;">
                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
            </div>

            <div class="policy">
                <input type="checkbox" required>
                <h3>I accept all terms & conditions</h3>
            </div>

            <div class="input-box button">
                <input type="submit" value="Register Now">
            </div>

            <div class="text">
                <h3>Already have an account? <a href="{{ url('/') }}">Login now</a></h3>
            </div>
        </form>
    </div>

</body>

</html>