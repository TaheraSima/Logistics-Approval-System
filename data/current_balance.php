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



<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>



</head>

<style type="text/css">
	@media print  { .noprint  { display: none; } }

  @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 1cm;  /* this affects the margin in the printer settings */
    }
</style>
<body>
	<br><br>
	<div class="container">
		<h1 class="text-center">Current Balance Report</h1>
		<hr>
				<?php
                    $results0=mysqli_query( $conn,"select * from item_info" );
                    $options = '';
                    while ( $row = mysqli_fetch_assoc( $results0 ) ) {
                        $options .= sprintf( "<option value='%s'>%s</option>", $row['item_id'], $row['item_name'] );
                    }
                ?>
                <form action="" method="post">
                	
                	<table>
                	<tr>
                	<td>Item Name</td> 
                	<td>&nbsp;&nbsp;</td>               	
                	<td>                		
	                    <select style="width:250px;" class="input-group form-control select2" name="item">
	                        <option value="" selected>-- Select One --</option>
	                        <option value="All"> All </option>
	                        <?php echo $options; ?>
	                    </select>
	                </td>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                	<td >&nbsp;&nbsp;</td>               	
                	<td>
                	<input type="submit" name="submit" class="form-control btn-sm btn btn-primary" style="width: 80px;"> 
	                </td>
	                <td>
	                	<!-- <button class="form-control btn-sm btn btn-primary" style="width: 100px;" onClick="myFunction()" >Print</button> -->
	                	<!-- <button id="print" onclick="printContent('#print_div');" >Print</button> -->
	                	<input name="b_print" type="button" class="ipt"   onClick="printdiv('div_print');" value=" Print ">
	                </td>
                </tr>
                </table>
                </form>    

            <br>
            <div id="div_print">
            <table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th> #SL </th>					
					<th> Item Name </th>					
					<th> Current Balance </th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (isset($_POST['submit'])) {
					$i = 1;
          			$j = 0;
          			$item = $_POST['item'];
          			if (isset($_POST['item'])) {
          				$item = $_POST['item'];
							$query="SELECT `i1`.*, `io1`.* FROM `item_info` AS `i1` INNER JOIN `store_details` AS `io1` ON `i1`.`item_id` = `io1`.`item_id` WHERE `i1`.`item_id`= '$item' AND `io1`.`id` IN (SELECT MAX(`io2`.`id`) FROM `item_info` AS `i2` INNER JOIN `store_details` AS `io2` ON `i2`.`item_id` = `io2`.`item_id` GROUP BY `i2`.`item_id`)";	
					}
          			
          			if ($item == "All")
          			{
          				$query="SELECT `i1`.*, `io1`.* FROM `item_info` AS `i1` INNER JOIN `store_details` AS `io1` ON `i1`.`item_id` = `io1`.`item_id` WHERE `i1`.`item_id`= `io1`.`item_id` AND `io1`.`id` IN (SELECT MAX(`io2`.`id`) FROM `item_info` AS `i2` INNER JOIN `store_details` AS `io2` ON `i2`.`item_id` = `io2`.`item_id` GROUP BY `i2`.`item_id`)";							

          			}///// all
							if ($result4=mysqli_query($conn,$query)){
          			

					  while ($row4=mysqli_fetch_assoc($result4))
						{ ?>
						<tr>
							<td> <?php echo $i++; ?> </td>							
							<td> <?php echo $row4["item_name"] ?> </td>							
							<td> <?php echo $row4["closing_qty"] ?> </td>					
						</tr>
					<?php }	
						}
											
				}////isset submit
				else{
						$i=1;
						$query="SELECT `i1`.*, `io1`.* FROM `item_info` AS `i1` INNER JOIN `store_details` AS `io1` ON `i1`.`item_id` = `io1`.`item_id` WHERE `io1`.`id` IN (SELECT MAX(`io2`.`id`) FROM `item_info` AS `i2` INNER JOIN `store_details` AS `io2` ON `i2`.`item_id` = `io2`.`item_id` GROUP BY `i2`.`item_id`)";
							
							if ($result1=mysqli_query($conn,$query)){

					  while ($row1=mysqli_fetch_assoc($result1))
						{ ?>
						<tr>
							<td> <?php echo $i++; ?> </td>
							
							<td> <?php echo $row1["item_name"] ?> </td>							
							<td> <?php echo $row1["closing_qty"] ?> </td>					
						</tr>
					<?php }	
						}
					}
				
				?>				
				
			</tbody>
			<tfoot></tfoot>
		</table>
	</div>
	</div>
<script type="text/javascript">
	$(function() {

		$(" #from ").datepicker({dateFormat: 'yy-mm-dd'});
	});	
	$(function() {

		$(" #to ").datepicker({dateFormat: 'yy-mm-dd'});
	});

	function printContent(el){
		var restorepage = $('body').html();
		var printcontent = $('#' + el).clone();
		$('body').empty().html(printcontent);
		window.print();
		$('body').html(restorepage);
		}

	function myFunction() {
    window.print();
	
	}
</script>
</body>
</html>

