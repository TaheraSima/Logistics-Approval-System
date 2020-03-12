<?php

  require 'config/conn.php';

  // User Dashboard data

  $user_id = $_SESSION["employee_id"];
  $sql = "SELECT * FROM requisition WHERE user_id='$user_id'";
  $result = mysqli_query($conn, $sql);
  $user_total_req = mysqli_num_rows($result);

  $user_id = $_SESSION["employee_id"];
  $sql = "SELECT * FROM requisition WHERE user_id='$user_id' AND status=1";
  $result = mysqli_query($conn, $sql);
  $user_approved = mysqli_num_rows($result);

  $user_id = $_SESSION["employee_id"];
  $sql = "SELECT * FROM requisition WHERE user_id='$user_id' AND status IN(0,11)";
  $result = mysqli_query($conn, $sql);
  $user_pending = mysqli_num_rows($result);

  $user_id = $_SESSION["employee_id"];
  $sql = "SELECT * FROM requisition WHERE user_id='$user_id' AND status=2";
  $result = mysqli_query($conn, $sql);
  $user_rejected = mysqli_num_rows($result);

  $division_id = $_SESSION["division_id"];
  $sql = "SELECT * FROM requisition WHERE division_id='$division_id' AND status IN(11,1)";
  $result = mysqli_query($conn, $sql);
  $div_total_req = mysqli_num_rows($result);

  $division_id = $_SESSION["division_id"];
  $sql = "SELECT * FROM requisition WHERE division_id='$division_id' AND status=8";
  $result = mysqli_query($conn, $sql);
  $div_approved = mysqli_num_rows($result);

  $department_id = $_SESSION["department_id"];
  $sql = "SELECT * FROM requisition WHERE department_id='$department_id' AND status=1";
  $result = mysqli_query($conn, $sql);
  $dip_approved = mysqli_num_rows($result);

  $sql2 = "SELECT * FROM requisition WHERE department_id='$department_id' AND status IN(1,11)";
  $result2 = mysqli_query($conn, $sql2);
  $chk_approved = mysqli_num_rows($result2);

  $division_id = $_SESSION["division_id"];
  $sql = "SELECT * FROM requisition WHERE division_id='$division_id' AND status=11";
  $result = mysqli_query($conn, $sql);
  $div_pending = mysqli_num_rows($result);

  $department_id = $_SESSION["department_id"];
  $sql = "SELECT * FROM requisition WHERE department_id='$department_id' AND status=11";
  $result = mysqli_query($conn, $sql);
  $dip_pending = mysqli_num_rows($result);

  $sql3 = "SELECT * FROM requisition WHERE department_id='$department_id' AND status=0";
  $result3 = mysqli_query($conn, $sql3);
  $chk_pending = mysqli_num_rows($result3);

  $division_id = $_SESSION["division_id"];
  $sql = "SELECT * FROM requisition WHERE division_id='$division_id' AND status=2";
  $result = mysqli_query($conn, $sql);
  $div_rejected = mysqli_num_rows($result);

  $department_id = $_SESSION["department_id"];
  $sql = "SELECT * FROM requisition WHERE department_id='$department_id' AND status=2";
  $result = mysqli_query($conn, $sql);
  $dip_rejected = mysqli_num_rows($result);

  $sql = "SELECT * FROM requisition WHERE status IN(1, 3, 5, 7,8,9)";
  $result = mysqli_query($conn, $sql);
  $store_total_req = mysqli_num_rows($result);

  $sql = "SELECT * FROM requisition WHERE status=3";
  $result = mysqli_query($conn, $sql);
  $store_delivered = mysqli_num_rows($result);

  $sql = "SELECT * FROM requisition WHERE status=8";
  $result = mysqli_query($conn, $sql);
  $store_pending = mysqli_num_rows($result);

  $sql = "SELECT * FROM requisition WHERE status=5";
  $result = mysqli_query($conn, $sql);
  $par_delivered = mysqli_num_rows($result);

  $sql = "SELECT * FROM request_items";
  $result = mysqli_query($conn, $sql);
  $t_req_item = mysqli_num_rows($result);

  $employee_id = $_SESSION['employee_id'];
  $sql = "SELECT * FROM request_items WHERE employee_id='$employee_id'";
  $result = mysqli_query($conn, $sql);
  $users_req_item = mysqli_num_rows($result);

  $division_id = $_SESSION['division_id'];
  $sql = "SELECT * FROM user_accounts WHERE division_id='$division_id'";
  $result = mysqli_query($conn, $sql);
  $total_div_users = mysqli_num_rows($result);

  $department_id = $_SESSION['department_id'];
  if ( $department_id == 28) {
       $sql = "SELECT * FROM requisition WHERE department_id='$department_id' AND status IN(1,11) ORDER BY id DESC";
  }
  else{
       $sql = "SELECT * FROM requisition WHERE department_id='$department_id' ORDER BY id DESC";
  }
  $result = mysqli_query($conn, $sql);
  $dip_total_req = mysqli_num_rows($result);

  $sql1 = "SELECT * FROM requisition WHERE department_id='$department_id'";  
  $result1 = mysqli_query($conn, $sql1); 
  $chk_total_req = mysqli_num_rows($result1);

  // $sql = "SELECT * FROM user_accounts";
  // $result = mysqli_query($conn, $sql);
  // $total_users = mysqli_num_rows($result);

  $sql = "SELECT * FROM request_items";
  $result = mysqli_query($conn, $sql);
  $st_req_item = mysqli_num_rows($result);

  $array = array(
    'user_total_req' => $user_total_req,
    'user_approved' => $user_approved,
    'user_pending' => $user_pending,
    'user_rejected' => $user_rejected,
    'div_total_req' => $div_total_req,
    'div_approved' => $div_approved,
    'dip_approved' => $dip_approved,
    'chk_approved' => $chk_approved,
    'div_pending' => $div_pending,
    'dip_pending' => $dip_pending,
    'chk_pending' => $chk_pending,
    'div_rejected' => $div_rejected,
    'dip_rejected' => $dip_rejected,
    'total_div_users' => $total_div_users,
    'store_total_req' => $store_total_req,
    'store_delivered' => $store_delivered,
    'store_pending' => $store_pending,
    'par_delivered' => $par_delivered,
    'st_req_item' => $st_req_item,
    't_req_item' => $t_req_item,
    'users_req_item' => $users_req_item,
    'dip_total_req' => $dip_total_req,
    'chk_total_req' => $chk_total_req,
    // '$total_users' => $$total_users,
  );
  echo json_encode($array);
?>
