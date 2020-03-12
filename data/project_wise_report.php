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
		<h1 class="text-center">Project Wise Report</h1>
		<hr>
		
				<?php
                    $results0=mysqli_query( $conn,"select * from division" );
                    $options = '';
                    while ( $row = mysqli_fetch_assoc( $results0 ) ) {
                        $options .= sprintf( "<option value='%s'>%s</option>", $row['division_id'], $row['division_name'] );
                    }
                ?>
                

            <br>
            <div id="div_print">
            <table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th> #SL </th>
					<th> Date</th>
					<th> Project Name </th>
					<th> Item Name </th>					
					<th> Quantity </th>					
				</tr>
			</thead>
			<tbody>			

	<?php
	$i = 1;
	$prj= $_POST['project'];
	$sql1= "SELECT store.id, store.req_number, store.record_type,store.date, store_details.*, requisition_details.*, requisition.*, item_info.* FROM store, store_details, requisition_details, requisition, item_info WHERE store.id=store_details.store_id AND store_details.item_id=item_info.item_id AND requisition_details.item_id= item_info.item_id AND requisition_details.req_id=requisition.id AND requisition.project_name='$prj' AND store_details.record_type='Out' GROUP BY store_details.item_id";
	if ($result1=mysqli_query($conn,$sql1)) {
		while ($row1=mysqli_fetch_assoc($result1)) { 

			?>
				<tr>
					<td> <?php echo $i++; ?> </td>	
					<td> <?php echo $row1["date"] ?> </td>						
					<td> <?php echo $row1["project_name"] ?> </td>					
					<td> <?php echo $row1["item_name"] ?> </td>							
					<td> <?php echo $row1["delvr_qty"] ?> </td>
									
				</tr>
		<?php 	

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

