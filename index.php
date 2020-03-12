<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMEC Store | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/fevicon.png" type="image/png" sizes="16x16">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div style="background-color: white;">
    <a href="#"><img src="images/SIMEC-Group.png" width="360" style="padding: 15px;"></a>
  </div>
  <!-- <a href="#"><img src="images/1.gif" width="360"></a> -->
  
  <!-- <a href="#"><img src="images/simec-group.gif" width="360"></a> -->
  <!-- <a href="#"><img src="images/3.gif" width="360"></a> -->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <center>
        <h4><b style="color:#91cc18;"> Logistics & Supply </b></h4> 
      </center>
      <form action="data/config/login.php" method="POST">
        <div class="input-group mb-3">
        <input type="text" name="username" class="form-control" required placeholder="Employee ID" value="<?php
                    if (isset($_GET['username'])){
                        $username = $_GET['username'];
                        echo $username;
                    }
                ?>">
          <div class="input-group-append input-group-text">
              <span class="fas fa-envelope"></span>
          </div>
          <?php
            if (isset($_GET['username_err'])){
                $message = $_GET['username_err'];
                echo '<b style="color:red;">'.$message.'</b>';
            }
          ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
            <?php
                if (isset($_GET['password_err'])){
                    $message = $_GET['password_err'];
                    echo '<b style="color:red;">'.$message.'</b>';
                }
            ?>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat"> Sign In </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
