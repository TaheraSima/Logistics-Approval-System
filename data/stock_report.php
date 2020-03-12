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
		<h1 class="text-center">Item Stock Report</h1>
		<h6 class="text-center">
			 <?php 
										$fromdate = $_POST['from_date'];
										echo $fromdate;
									?> 
			
		</h6>
		<hr>
		
				<?php
                    $results0=mysqli_query( $conn,"select * from item_info" );
                    $options = '';
                    while ( $row = mysqli_fetch_assoc( $results0 ) ) {
                        $options .= sprintf( "<option value='%s'>%s</option>", $row['item_id'], $row['item_name'] );
                    }
                ?>                
                <!-- <form action="" method="post">                	
                	<table>
                	<tr>
                	<td>Item Name</td> 
                	<td>&nbsp;&nbsp;</td>               	
                	<td>  
                	<select style="width:250px;" class="input-group form-control select2" name="item">
                    <option value="" selected>-- Select One --</option>
                    <?php echo $options; ?>
                    </select>              		
                	
                	</td>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

	                <td>From</td>	
                	<td>&nbsp;&nbsp;</td>               	
                	<td>     	            		
	                    <input type="text" name="from_date" value="<?php echo $fromdate; ?>" id="from" class="form-control" autocomplete="off">
	                </td>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	                <td>To</td> 
                	<td>&nbsp;&nbsp;</td>               	
                	<td>               	            		
	                    <input type="text" name="to_date" value="<?php echo $todate; ?>" id="to" class="form-control" autocomplete="off">
	                </td>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                	<td>&nbsp;&nbsp;</td>               	
                	<td>
                	<input type="submit" name="submit" class="form-control btn-sm btn btn-primary" style="width: 80px;"> 
	                </td>
	                <td>	                	
	                	<input name="b_print" type="button" class="ipt"   onClick="printdiv('div_print');" value=" Print ">
	                </td>
                </tr>
                </table>
                </form> -->  
			<br>
            <div id="div_print">
            <table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th> #SL </th>
					
					<th> Item Name </th>
					<th> Previous Quantity </th>
					<th> Quantity (In) </th>
					<th> Quantity (Out) </th>
					<th> Quantity (Current) </th>
				</tr>
			</thead>
			<tbody>

			<?php
			function opening_stock($item_id, $from_date, $conn){
				$op_q = "SELECT * FROM store_details WHERE item_id='$item_id' AND `date`<'$from_date' ORDER BY `id` DESC LIMIT 0,1";
				$data = mysqli_fetch_assoc(mysqli_query($conn,$op_q));
				return $data['closing_qty'];
			}
			function in_stock($item_id, $from_date, $conn){
				$in_q = "SELECT SUM(`qty`) AS `ttl_in_qty` FROM store_details WHERE item_id='$item_id' AND `date`='$from_date' AND `record_type`='In'";
				$data_in = mysqli_fetch_assoc(mysqli_query($conn,$in_q));
				return $data_in['ttl_in_qty'];
			}
			function out_stock($item_id, $from_date, $conn){
				$out_q = "SELECT SUM(`qty`) AS `ttl_out_qty` FROM store_details WHERE item_id='$item_id' AND `date`='$from_date' AND `record_type`='Out'";
				$data_out = mysqli_fetch_assoc(mysqli_query($conn,$out_q));
				return $data_out['ttl_out_qty'];
			}
			function closing_stock($item_id, $from_date, $conn){
				$closing_q = "SELECT * FROM store_details WHERE item_id='$item_id' AND `date`<='$from_date' ORDER BY `id` DESC LIMIT 0,1";
				$data_closing = mysqli_fetch_assoc(mysqli_query($conn,$closing_q));
				return $data_closing['closing_qty'];
			}
				
				$from_date = $_POST['from_date'];
				
				$i = 0;				

				$query="SELECT * FROM item_info ";						
				$result=mysqli_query($conn,$query);

				if (mysqli_num_rows($result) > 0)
				{
					while ($row=mysqli_fetch_assoc($result)){
						$item_id = $row["item_id"];
						$opening = opening_stock($item_id, $from_date, $conn);
						$in_qty = in_stock($item_id, $from_date, $conn);
						$out_qty = out_stock($item_id, $from_date,  $conn);
						$closing_stock = closing_stock($item_id, $from_date, $conn);
						//$query_stock = "SELECT * FROM item_info ";
			?>													
						
				  		<tr>
							<td> <?php echo ++$i; ?> </td>
							
							<td> <?php echo $row["item_name"]; ?> </td>
							<td> <?php echo $opening?$opening:0; ?> </td>
							<td> <?php echo $in_qty?$in_qty:0; ?> </td>
							<td> <?php echo $out_qty?$out_qty:0; ?> </td>
							<td> <?php echo $closing_stock?$closing_stock:0; ?> </td>							
						</tr>
			<?php						
					 
					}
				}
				
			?>	
			</tbody>
		</table>
	</div>
	</div>
</body>
</html>