<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Motel</title>

  <base href=" {{ asset('') }} ">

  <!-- Bootstrap core CSS-->
  <link href="moteler_asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="moteler_asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="moteler_asset/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="moteler_asset/css/sb-admin.css" rel="stylesheet">

  {{-- form --}}
  <link rel="icon" type="image/png" href="moteler_asset/images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/vendor/noui/nouislider.min.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/css/util.css">
  <link rel="stylesheet" type="text/css" href="moteler_asset/form/css/main.css">

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    {{-- end form --}}

  <link rel="stylesheet" type="text/css" href="moteler_asset/css/mystyle.css">

  {{-- <link rel="stylesheet" type="text/css" href="moteler_asset/pages/catalogue_room.css"> --}}
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  @include('moteler.layout.header')
  
  <div class="content-wrapper">
    
   {{--  nội dung  --}}
   @yield('content')


    
    {{-- @include('moteler.layout.footer') --}}
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLoginLabel">Đăng xuất</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn muốn "đăng xuất" khỏi hệ thống?.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Trở lại</button>
            <a class="btn btn-primary" href="logout">Đăng xuất</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="moteler_asset/vendor/jquery/jquery.min.js"></script>
    <script src="moteler_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="moteler_asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="moteler_asset/vendor/chart.js/Chart.min.js"></script>
    <script src="moteler_asset/vendor/datatables/jquery.dataTables.js"></script>
    <script src="moteler_asset/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="moteler_asset/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="moteler_asset/js/sb-admin-datatables.min.js"></script>
    <script src="moteler_asset/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
