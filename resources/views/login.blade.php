<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="moteler_asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="moteler_asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="moteler_asset/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

          @if(session('mess'))
          <div class="alert alert-success">
            {{ session('mess') }}
          </div>
          @endif
          
        <form action="login" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label for="exampleInputEmail1">Tài Khoản</label>
            <input class="form-control" id="" type="text" name="user"  placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input class="form-control" id="" type="password" name="pass" placeholder="">
          </div>
          {{--  <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>  --}}
          {{--  <a class="btn btn-primary btn-block">Login</a>  --}}
          <button class="btn btn-primary btn-block">Đăng Nhập</button>
        </form>
        <div class="text-center">
          {{--  <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>  --}}
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="moteler_asset/vendor/jquery/jquery.min.js"></script>
  <script src="moteler_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="moteler_asset/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
