<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('admin')}}/login/fonts/icomoon/style.css">

  <link rel="stylesheet" href="{{asset('admin')}}//login/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('admin')}}/login/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="{{asset('admin')}}/login/css/style.css">

  <title>Login Admin</title>

</head>

<body>


  <div class="d-md-flex half">
    <div class="bg"></div>

    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3>Login to <strong>Admin</strong></h3>
                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>


              <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="form-group first">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                </div>

                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0">
                    <span class="caption">Remembe me</span>
                    <input type="checkbox" name="remember" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

                @if($errors->any())
                <div class="alert alert-danger mt-3">
                  {{ $errors->first() }}
                </div>
                @endif
              </form>
              

            </div>
          </div>
        </div>
      </div>
    </div>


  </div>



  <script src="{{asset('admin')}}/login/js/jquery-3.3.1.min.js"></script>
  <script src="{{asset('admin')}}/login/js/popper.min.js"></script>
  <script src="{{asset('admin')}}/login/js/bootstrap.min.js"></script>
  <script src="{{asset('admin')}}/login/js/main.js"></script>
</body>

</html>