<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <!-- CSS cho template của login và register -->
    <link rel="stylesheet" href="{{asset('user')}}/css/user.css">

    <link rel="stylesheet" href="{{asset('user')}}/css/register.css">
    <!-- Font Awesome CDN bản 4 hoặc 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <div class="wrapper">
        <h2>Registration</h2>
        <form action="{{ url('register/save') }}" method="post">
            @csrf

            <div class="input-box ">
                <input type="text" name="name" value="{{ old('name')}}" placeholder="Your name" required>
                @error('name')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="input-box" style="margin-top: 25px;">
                <input type="email" name="email" value="{{ old('email')}}" placeholder="Your email" required>
                @error('email')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="input-box input-password" style="margin-top: 25px;">
                <input type="password" id="password" name="password" placeholder="Password" required>
                @error('password')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="input-box input-password" style="margin-top: 25px;">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
            </div>

            <div class="policy" style="margin-top: 10px;">
                <input type="checkbox" id="showPasswords">
                <h3> Show password </h3>
            </div>

            <div class="policy" style="margin-top: 5px;">
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

    @if(session('success_verify'))
    <div id="successModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <span> Registration successful! </span>
                <button class="custom-modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="custom-modal-body">
                <p>Please check your email to verify your account.</p>
            </div>
            <div class="custom-modal-footer">
                <button onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
    @endif

    <script src="{{asset('user')}}/js/register.js"> </script>

</body>

</html>