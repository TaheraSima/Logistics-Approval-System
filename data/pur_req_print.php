<?php

require 'config/conn.php';

if(isset($_GET['purchase_print'])){
  $po_no =  $_POST['po_no'];
  $pr_no =  $_POST['pr_no'];
  $req_type =  $_POST['req_type'];
  if (isset($_POST['project_name'])) {
    $prj_name = $_POST['name'];
  }  
  else
  {
    $prj_name = "";
  }

  $emp_id =  $_POST['emp_id'];
  $emp_name =  $_POST['emp_name'];
  $division_id =  $_POST['division_id'];
  $division_name =  $_POST['division_name'];
  $department_id =  $_POST['department_id'];
  $department_name =  $_POST['department_name'];
  $approved_by =  $_POST['approved_by'];
  $remarks =  $_POST['remarks'];
  $req_date =  $_POST['req_date'];
  $add_amount =  $_POST['add_amount'];
  $add_amt_rmk =  $_POST['credit_remarks'];
  $less_amount =  $_POST['less_amount'];
  $less_amt_rmk =  $_POST['debit_remarks'];
  $grand_total =  $_POST['grand_total'];
  $date = date('Y-m-d');
  $supplier_name = $_POST['supplier_name'];
  
  
    // $sql = "INSERT INTO `purchase` (`po_no`, `pr_no`,  `req_type`,  `emp_id`,  `emp_name`,  `division_id`,  `department_id`,  `approved_by`,  `remarks`, `date`) VALUES ('$po_no','$pr_no','$req_type','$emp_id','$emp_name','$division_id','$department_id','$approved_by','$remarks', '$date')";
    // if ($result = mysqli_query( $conn, $sql )) {
    //   $purchase_id = mysqli_insert_id( $conn );
    //     foreach ( $_POST['rawrequisition_items'] as $item ) {
    //       $sql = sprintf( "INSERT INTO `purchase_details` ( `purchase_id`, `item_id`, `apprv_qty`, `purchase_qty`, `unit_price`, `total_price` ) VALUES ( %s, %s, %s, '%s', '%s', '%s' )", $purchase_id, $item['item_id'], $item['aprv_qty'], $item['purchase_qty'], $item['unit_price'], $item['total_price'] );
    //     $result = mysqli_query( $conn, $sql );
    //     Header( 'Location:../requisition.php?success=1' );
    //     }
    // }else{
    //   echo "error";
    // }
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Hello</title>
  <style type="text/css">
    .style5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
    .style8 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
    .style23 {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; }
    -->
    </style>
    <style type="text/css">
      @media print {
          #printbtn {
              display :  none;
          }
      }
    </style>
    <style media="print">
 @page {
  size: auto;
  margin: 0;
       }
    </style></head>
<body>
 <!--  <form name="getcvs" action="report_pdfA.php" method="POST"> -->
    <center>
      <h3 align="center">
        <img src="../images/SIMEC-Group.png" alt="Logo" width="100" height="78" />
      </h3>
      <h2 align="center" style="background-color: #CCF4D5; padding: 3px;">DRAFT PR</h2>
      <h4 align="center">Purchase Requisition Slip</h4>
    </center>
    <script>
        function myFunction() {
          window.print();
        }
    </script>
<div align="center">
  <table width="80%" align="center" cellpadding="4" cellspacing="0" border="0">
    <tr bgcolor="">
      <td width="21%" align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Approved By : </strong></div></td>
      <td width="32%" align="left" valign="middle" nowrap="nowrap" class="style23"><?php echo $approved_by;?></td>
      <td width="15%" align="left" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Requisiton Type : </strong></div></td>
      <td width="32%" align="right" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $req_type;?></div></td>
    </tr>
    <tr>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Purchase Req No : </strong></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $pr_no;?></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Project Details: </strong></div></td>
      <td align="right" valign="middle" nowrap="nowrap" class="style23">
        <div align="left">

          <?php 
          if (isset($_POST['name'])) {
           echo $prj_name;
      }

          ?>            
        </div>
        </td>
    </tr>
    <tr>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Employee ID : </strong></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $emp_id;?></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Employee Name:</strong></div></td>
      <td align="right" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $emp_name;?></div></td>
    </tr>
    <tr>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Company Name  : </strong></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $division_name;?></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Department : </strong></div></td>
      <td align="right" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $department_name;?></div></td>
    </tr>
    <tr>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Requistion Date :</strong></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo date('d-m-Y', strtotime($req_date));?></div></td>
      <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Expected Date : </strong></div></td>
      <td align="right" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $remarks;?></div></td>
    </tr>
  <tr>
  	<td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Supplier Name :</strong></div></td>
	<td align="right" valign="middle" nowrap="nowrap" class="style23"><div align="left"><?php echo $supplier_name;?></div></td>
    <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"></div></td>
    <td></td> 
  </tr>
  </table>
</div>
<br>
<table width="80%" border="1" align="center" cellpadding="4" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="4%" align="center" valign="middle" nowrap="nowrap"><strong>#SL</strong></td>
    <td width="29%" align="center" valign="middle" class="style5">Item Name </td>
    <td width="12%" align="center" valign="middle" class="style5">Request Qty </td>
    <td width="12%" align="center" valign="middle" class="style5">Previous Purchase </td>
    <td width="16%" align="center" valign="middle" class="style5">Available Stock</td>
    <td width="14%" align="center" valign="middle" class="style5">Purchase Qty</td>
    <td width="15%" align="center" valign="middle" class="style5">Unit Price</td>
    <td width="10%" align="center" valign="middle" class="style5">Total Price</td>
  </tr>
  <?php 
    $i = 1;
    $totalGrandPrice = 0;
    $totalAprvQty = 0;
    foreach ( $_POST['rawrequisition_items'] as $item ) { 
    $totalGrandPrice += $item['purchase_qty'] * $item['unit_price'];
    $totalAprvQty += $item['purchase_qty'];

    ?>

      <?php
    if($item['aprv_qty'] > $item['purchase_qty'] ){
        $bgClr = "#996600";
        $clr = "#FFFFFF";
     }
     else{
        $bgClr = "white";
        $clr = "black";
     }?>

  <tr  style="background-color: <?php echo $bgClr; ?> ; color: <?php echo $clr; ?>">
    <td align="center" valign="middle" class="style8"><?php echo $i++; ?></td>
    <td align="center" valign="middle" nowrap="nowrap" class="style8"><div align="left"><?php echo $item['item_name']; ?></div></td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $item['aprv_qty']; ?></div></td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $item['pre_pur']; ?></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8">
      <div align="center">
        <?php if (isset($item['out_of_stock'])) {
                echo $item['out_of_stock'];
              }
              if (isset($item['previous_qty'])) {
                echo $item['previous_qty'];
              } 
      ?>    
      </div></td>

    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $item['purchase_qty']; ?> </div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $item['unit_price']; ?></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $item['purchase_qty'] * $item['unit_price']; ?></td>
  </tr>
<?php } ?>
  <tr>
    <td colspan="5" rowspan="4" align="center" valign="middle" class="style8"><div align="left"></div>
    <div align="center"></div>      <div align="center"></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><div align="center"></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><b>Total Items Price = </b></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $totalGrandPrice; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><strong> + Add Amt </strong></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $add_amt_rmk; ?></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $add_amount; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><strong> - Less Amt </strong></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $less_amt_rmk; ?></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $less_amount; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" nowrap="nowrap" class="style8">&nbsp;</td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><strong>Total Amount = </strong></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8">&nbsp;<?php echo $grand_total; ?></td>
  </tr>
</table>
<br><br><br>
<center>
    <div class="row">
      <div class="col-md-2">
    <label> ...............................</label>
         <span style="margin-left:187px;">...................................</span>
        <span style="margin-left:187px;">...................................</span>
        <span style="margin-left:175px;">......................................</span>
      </div>
      <div class="col-md-2">
        <label>Purchase by- </label>
    <span style="margin-left:187px;">Checked by- </span>
        <span style="margin-left:187px;">Manager, Logistics </span>
        <span style="margin-left:175px;">Admin</span>
      </div>
    </div>
</center>

 <!--  </form> -->
  <center><input type="button" id="printbtn" value="Print Page" onClick="myFunction()"></center>`
</body>
    </html>

