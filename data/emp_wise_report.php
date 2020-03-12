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
		<h4 class="text-center">Employee Wise Assets Report</h4>
		<hr>
		<?php
                    $results0=mysqli_query( $conn,"select * from user_accounts" );
                    $options = '';
                    while ( $row = mysqli_fetch_assoc( $results0 ) ) {
                        $options .= sprintf( "<option value='%s'>%s</option>", $row['employee_id'], $row['employee_name'] );
                    }
                ?>
                <form action="" method="post">
                	
                	<table>
                	<tr>
                	<td>Employee Name</td> 
                	<td>&nbsp;&nbsp;</td>               	
                	<td>                		
	                    <select style="width:250px;" class="input-group form-control select2" name="employee">
	                        <option value="" selected>-- Select One --</option>
	                        <?php echo $options; ?>
	                    </select>
	                </td>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 

	                <!-- <td>From</td> 
                	<td>&nbsp;&nbsp;</td>               	
                	<td>                		
	                    <input type="text" name="from_date" id="from" class="form-control" autocomplete="off">
	                </td>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	                <td>To</td> 
                	<td>&nbsp;&nbsp;</td>               	
                	<td>                		
	                    <input type="text" name="to_date" id="to" class="form-control" autocomplete="off">
	                </td> -->
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                	<td>&nbsp;&nbsp;</td>               	
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
            	<!-- <h6 style="text-align: center;"><b>Division Wise Assets Report<b></h6>            		
            	<h6 style="text-align: right;" class="text-center"><b> Date : </b> 
			<strong> From </strong> <?php 
										$fromdate = $_POST['from_date'];
										echo $fromdate;
										?> 
			<strong> To </strong> <?php 
										$todate = $_POST['to_date'];
										echo $todate;
									?>
		</h6>	 -->
            <table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th> #SL </th>
					<th> Employee Name </th>					
					<th> Division Name </th>
					<th> Department Name </th>
					<th> Item Name </th>					
					<th> Quantity </th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
				if (isset($_POST['submit'])) {
					$i = 1;
          			$j = 0;          			
					$employee = $_POST['employee'];
						
					$query="SELECT user_accounts.employee_name, department.department_name, division.division_name, item_info.item_name, SUM(store_details.qty) AS 'total_qty', item_info.item_name FROM user_accounts, department, store, division, store_details, item_info WHERE store.division_id = division.division_id AND store.department=department.department_id AND store.employee_id=user_accounts.employee_id AND store.employee_id='$employee' AND store_details.store_id = store.id AND store_details.item_id = item_info.item_id AND store_details.record_type = 'Out' GROUP BY user_accounts.employee_name, item_info.item_name ORDER BY store.id DESC";
						
						if ($result4=mysqli_query($conn,$query)){

				  while ($row4=mysqli_fetch_assoc($result4))
					{ ?>
					<tr>
						<td> <?php echo $i++; ?> </td>
						<td> <?php echo $row4["employee_name"] ?> </td>					
						<td> <?php echo $row4["division_name"] ?> </td>								
						<td> <?php echo $row4["department_name"] ?> </td>					
						<td> <?php echo $row4["item_name"] ?> </td>							
						<td> <?php echo $row4["total_qty"] ?> </td>					
							</tr>
						<?php }	
							}					
				}

				else{


$sql1="SELECT user_accounts.employee_name, department.department_name, division.division_name, item_info.item_name, SUM(store_details.qty) AS 'total_qty', item_info.item_name FROM user_accounts, department, store, division, store_details, item_info WHERE store.division_id = division.division_id AND store.department=department.department_id AND store.employee_id=user_accounts.employee_id AND store_details.store_id = store.id AND store_details.item_id = item_info.item_id AND store_details.record_type = 'Out' GROUP BY user_accounts.employee_name, item_info.item_name ORDER BY store.id DESC";


	if ($result1=mysqli_query($conn,$sql1)) {
		$i = 1;

		while ($row1=mysqli_fetch_assoc($result1)) { 
			?>
				<tr>
					<td> <?php echo $i++; ?> </td>
					<td> <?php echo $row1["employee_name"] ?> </td>					
					<td> <?php echo $row1["division_name"] ?> </td>								
					<td> <?php echo $row1["department_name"] ?> </td>					
					<td> <?php echo $row1["item_name"] ?> </td>							
					<td> <?php echo $row1["total_qty"] ?> </td>
									
				</tr>
		<?php 	

		}
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

