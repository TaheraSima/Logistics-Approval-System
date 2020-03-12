<?php include 'config/conn.php' ?>
<!DOCTYPE html>
<html>
<head>




  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/dist/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="../asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../asset/plugins/select2/css/select2.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../asset/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="../asset/dist/font/font.css" rel="stylesheet">
  <!-- data table -->
  <link rel="stylesheet" href="../asset/plugins/datatables/dataTables.bootstrap4.css">
  <script src="../asset/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
	<br><br>
	<div class="container">
		<h4 class="text-center">Pending Requisition Item Report</h4>

		<hr>
    <?php 
        $id = $_GET['id'];
          $sql1="SELECT requisition.*, requisition_details.*, item_info.* FROM requisition,requisition_details,item_info WHERE requisition.id=requisition_details.req_id AND requisition_details.item_id=item_info.item_id AND requisition.req_no='$id' ";
        if ($result1=mysqli_query($conn,$sql1)) {         
        while ($row1=mysqli_fetch_assoc($result1)) { 
        ?>
        <div style="text-align: center;">
          <label> Date: </label>   <label> <?php echo $row1["date"] ?></label><br>
          <label> Requisition No: </label> <label> <?php echo $row1["req_no"] ?> </label><br>
          <label> For - </label> <label> <?php echo $row1["req_type"]?> </label> <label> Issue </label> <br>
         <?php  if ($row1["project_name"] != "") {?>
            <label> Project Name: </label><label> <?php echo $row1["project_name"] ?></label><br>

        <?php   } ?>
          
        </div>
      <?php 
      break;
    }

          }
          ?>
          <hr>  
            <table class="table table-bordered table-striped text-center">
			<thead>
				<tr style="background-color: #CDE7F9">
					<th> #SL </th>
															
					<th> Item Name </th>					
					<th> Requisition Quantity </th>
					<th> Delevery Remain Qty </th>									
				</tr>
			</thead>
				<tbody>
				<?php 
				$id = $_GET['id'];

	$sql1="SELECT requisition.*, requisition_details.*, item_info.* FROM requisition,requisition_details,item_info WHERE requisition.id=requisition_details.req_id AND requisition_details.item_id=item_info.item_id AND requisition.req_no='$id' ";
	if ($result1=mysqli_query($conn,$sql1)) {
		$i = 1;
		while ($row1=mysqli_fetch_assoc($result1)) { 
			?>
				<tr>
					<td> <?php echo $i++; ?> </td>														
					<td> <?php echo $row1["item_name"] ?> </td>
					<td> <?php echo $row1["quantity"] ?> </td>
					<td> <?php echo $row1["rem_qty"] ?> </td>							
				</tr>
				<br>
       
		<?php

		}
	}		
	?>				
			</tbody>
			<tfoot></tfoot>
		</table>	


 <?php 
        $id = $_GET['id'];
          $sql1="SELECT requisition.*, requisition_details.*, item_info.* FROM requisition,requisition_details,item_info WHERE requisition.id=requisition_details.req_id AND requisition_details.item_id=item_info.item_id AND requisition.req_no='$id' ";
        if ($result1=mysqli_query($conn,$sql1)) {         
        while ($row1=mysqli_fetch_assoc($result1)) { 
        ?>
        <div style="text-align: center;">
           <label><i>Approved By- <?php echo $row1["signature"] ?></i></label>
        </div>
      <?php 
      break;
    }

          }
          ?>


	</div>
</body>
</html>

