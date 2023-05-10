<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="backend/assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="backend/assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="backend/assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
  <link href="backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="backend/assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="backend/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="backend/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="backend/assets/css/sleek.css" />

  
  <script src="backend/assets/plugins/nprogress/nprogress.js"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/index.html">
                
                  
                  <span class="brand-name ">Login Form</span>
                </a>
              </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong> .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Sign In</h4>
             
        <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" class="form-control input-lg"  aria-describedby="emailHelp" placeholder="UserEmail" name="email">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" placeholder="Password" name="password">
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <p><a class="text-blue" href="{{ route('password.request') }}">Forgot Your Password?</a></p>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                    <p>Don't have an account yet ?
                      <a class="text-blue" href="{{ route('register') }}">Sign Up</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">&copy; 2023 Copyright
        </p>
      </div>
    </div>
</body>
</html>