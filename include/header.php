<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/fevicon.png" type="image/png" sizes="16x16">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/dist/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="asset/plugins/select2/css/select2.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="asset/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="asset/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="asset/dist/css/s2.css" rel="stylesheet">
  <link href="asset/dist/font/font.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- data table -->
  <link rel="stylesheet" href="asset/plugins/datatables/dataTables.bootstrap4.css">
  <script src="asset/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <center>
      <?php
        if ( isset($_GET['oldPassword_err'])){
            $oldPassword_err = $_GET['oldPassword_err'];
          ?>
            <div class="alert alert-danger">
                <strong>Errors!!!</strong> <?php echo $oldPassword_err; ?> 
            </div>
      <?php } ?>
      <?php
        if ( isset($_GET['password_match_err'])){
            $password_match_err = $_GET['password_match_err'];
          ?>
            <div class="alert alert-danger">
                <strong>Errors!!!</strong> <?php echo $password_match_err; ?> 
            </div>
      <?php } ?>
      <?php
        if ( isset($_GET['passwordSuccessMsg'])){
            $passwordSuccessMsg = $_GET['passwordSuccessMsg'];
          ?>
            <div class="alert alert-success">
                <strong>Congrats!!!</strong> <?php echo $passwordSuccessMsg; ?> 
            </div>
      <?php } ?>
  </center>
   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Right navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"><i class="fa fa-cloud-sun text-primary"></i> <b> Today Weather: </b> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Temperature:&nbsp;&nbsp; <b> <span id="weather"></span>&#8451; </b></a> 
      </li>
      <li class="nav-item">
        <a class="nav-link">Humidity:&nbsp;&nbsp; <b><span id="humidity"></span>%</b></a> 
      </li>
      <li class="nav-item">
        <a class="nav-link">Pressure:&nbsp;&nbsp; <b><span id="pressure"></span>mb</b></a> 
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link elevation-3" data-toggle="dropdown" href="#">
          Hi, <?php echo $_SESSION['employee_name']; ?> &nbsp;&nbsp; <i class="fas fa-sort-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right elevation-3">
          <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Hi, <?php echo $_SESSION['employee_name']; ?>
          </a> -->
          <!-- <a href="profile.php" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Your Profile
          </a> -->
          
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#profile_view_modal<?php echo $_SESSION["employee_id"] ?>">
            <i class="fas fa-user-circle mr-2"></i> Your Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#change_password_modal<?php echo $_SESSION["employee_id"] ?>">
            <i class="fas fa-key mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="data/config/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> LogOut </a>
        </div>
      </li>
      </li>
    </ul>
  </nav>

<!-- profile view modal Modal -->

<div class="modal fade" id="profile_view_modal<?php echo $_SESSION["employee_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> <h3>Your profile details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="images/user.png" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $_SESSION['employee_name']; ?></h3>

                <p class="text-muted text-center"><?php echo $_SESSION['designation_name']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Division  : </b> <a class="float-right"><?php echo $_SESSION['division_name']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Department : </b> <a class="float-right"><?php echo $_SESSION['department_name']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Employee ID : </b> <a class="float-right"><?php echo $_SESSION['employee_id']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email / Phone : </b> <a class="float-right"><?php echo $_SESSION['email']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Designation : </b> <a class="float-right"><?php echo $_SESSION['designation_name']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Access Permission : </b> <a class="float-right"><?php echo $_SESSION['access_permission']; ?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-danger btn-block" data-dismiss="modal"><b> Close </b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          </div>
      </div>
    </div>
  </div>
</div>

  <!-- password view modal Modal -->
<div class="modal fade" id="change_password_modal<?php echo $_SESSION["employee_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Change your password </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="data/config/change_password.php?changePassword" method="post">
          <div class="form-group">
            <label for="item_name"> Old Password </label>
            <input type="hidden" class="form-control" name="check_old_password" value="<?php echo $_SESSION["password"]; ?>">
            <input type="password" class="form-control" name="old_password"  placeholder="Enter old password" required>
          </div>
          <div class="form-group">
            <label for="item_name"> New Password </label>
            <input type="password" class="form-control" name="new_password"  placeholder="Enter new password" required>
          </div>
          <div class="form-group">
            <label for="item_name"> Confirm New Password </label>
            <input type="password" class="form-control" name="confirm_new_password"  placeholder="Enter Confirm Password" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type=submit class="btn btn-primary">Change Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        update();
        function update() {
          $("#weather").html(''); 
          $.ajax({
              type: 'GET',
              // url: 'https://api.openweathermap.org/data/2.5/weather?lat=23&lon=90&appid=c29d5d6b295e425bf990e9557df95a19',
              url: 'https://api.openweathermap.org/data/2.5/weather?zip=1230,bd&appid=c29d5d6b295e425bf990e9557df95a19',
              timeout: 2000,
              success: function(data) {
                
                $('#weather').text(data.main['temp'] - 273.15);
                $('#humidity').text(data.main['humidity']);
                $('#pressure').text(data.main['pressure']);
                /*console.log(data.main['temp'] - 273.15);
                console.log(data.main);*/

                window.setTimeout(update, 3000);
              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {
                $("#weather").html('Timeout contacting server..');
                window.setTimeout(update, 3000);
              }
          });
        }
    });
  </script>
 