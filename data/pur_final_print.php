<?php

require 'config/conn.php';
    $id = $_GET['id'];							
	$sql = "SELECT requisition.*, division.division_name, department.department_name FROM requisition,division,department WHERE requisition.division_id=division.division_id AND  requisition.department_id=department.department_id AND requisition.id='$id'";
	$result = mysqli_query($conn, $sql);
	while ($reqInfo = mysqli_fetch_assoc($result)) {
		$approved_by = $reqInfo['signature'];
		$req_type = $reqInfo['req_type'];
		$pr_no = $reqInfo['req_no'];
		$project_name = $reqInfo['project_name'];
		$emp_id = $reqInfo['user_id'];
		$emp_name = $reqInfo['employee_name'];

    $checker_id = $reqInfo['checker_id'];
        $cName = "SELECT * FROM user_accounts WHERE employee_id = $checker_id ";
        $resultc = mysqli_query($conn, $cName);
        while ($checkerName = mysqli_fetch_assoc($resultc)) {
        $cname = $checkerName['employee_name']; 
      }
      

		$division_name = $reqInfo['division_name'];
		$department_name = $reqInfo['department_name'];
		$req_date = $reqInfo['date'];
		$remarks = $reqInfo['expect_date'];
		$sp = "select `supplier_name` from `purchase` where `pr_no`= '$pr_no'";
		$resultsp = mysqli_query($conn, $sp);
		$countsp = mysqli_num_rows($resultsp);
		if ($countsp > 0) {
			while ($roww = mysqli_fetch_assoc($resultsp)) {
				$supplier_name = $roww['supplier_name'];
			}
		}
		else{
			$supplier_name = "";
		}

		

	}
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Hello</title>
  <style type="text/css">
    .style5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
    .style8 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
    .style23 {font-family: Arial, Helvetica, sans-serif; font-size: 12pt; }
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
      <h3 align="center">Purchase Requisition Slip</h3>
    </center>
    <script>
        function myFunction() {
          window.print();
        }
    </script>
<div align="center">
  <table width="80%" border="1" align="center" cellpadding="4" cellspacing="0" style="border-collapse:collapse;">
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

          <?php echo $project_name; ?>            
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
    <td align="right" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Supplier Name : </strong></div></td>
    <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong><?php echo $supplier_name; ?></strong></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong>Checked By  : </strong></div></td>
    <td align="center" valign="middle" nowrap="nowrap" class="style23"><div align="left"><strong><?php echo $cname; ?></strong></div></td>
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
  $req_id = $_GET['id'];
	$sql = "SELECT requisition_details.*, item_info.item_id, item_info.item_name FROM requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND requisition_details.req_id='$req_id'";
	$requisition = mysqli_query($conn, $sql);
		while ($item = mysqli_fetch_assoc($requisition)) 
		{
			$i = 1;
			$item_id = $item['item_id'];
			$item_no = $item["item_name"];
			$purchase_id = $pr_no;
			$sql1 = "SELECT item_id, purchase_id, apprv_qty, sum(purchase_qty) FROM purchase_details WHERE item_id='$item_id' AND purchase_id='$purchase_id'";
			$result1 = mysqli_query($conn, $sql1);
			$count = mysqli_num_rows($result1);
			if($count > 0){
			while ($row = mysqli_fetch_assoc($result1)) {
			// $item_no = $item["item_name"];
			$req_quant = $row["apprv_qty"];			
						if($row['sum(purchase_qty)'] == NULL)
							{
								$prev_quant = 0;
							}
						else{
							$prev_quant = $row['sum(purchase_qty)'];
						}
						$tr = $row['item_id'];

						$sqlpur = "select `purchase_qty`, `unit_price`, `total_price` from `purchase_details` where `item_id`=$tr order by `item_id` desc limit 1";
						$purresult = mysqli_query($conn, $sqlpur);
						$purcount = mysqli_num_rows($purresult);
						if ($purcount > 0) {
							while ($purrow = mysqli_fetch_assoc($purresult)) {
								 $tpur = $purrow['purchase_qty'];
								 $unitprc = $purrow['unit_price'];	
								 $ttlprc = $purrow['total_price'];		
                 $sqlpur1 = "select sum(total_price) from purchase_details where `purchase_id`='$pr_no' ";
                  $purresult1 = mysqli_query($conn, $sqlpur1);
                  $purcount1 = mysqli_num_rows($purresult1);
                  while ($purrow = mysqli_fetch_assoc($purresult1)) {
                    $sumttlprc = $purrow['sum(total_price)'];        
                  }						 
							}
							//echo $total = $ttlprc;
						}
						else{
							$pur_qty = 0;
						} 
						$totalGrandPrice = 0;
					//     foreach ( $purrow['total_price'] as $item ) { 
					//    echo $totalGrandPrice += $ttlprc;
					// }

						$pid = $row['purchase_id'];

						// $sqlpurmain = "select * from purchase where pr_no= '$pid' order by pr_no desc limit 1";
            $sqlpurmain = "select * from purchase where pr_no= '$pid' order by pr_no desc limit 1";

						 $presult = mysqli_query($conn, $sqlpurmain); 
							$pcount = mysqli_num_rows($presult);
							if ($pcount > 0) {
							while ($prow = mysqli_fetch_assoc($presult)) {
								 $grndprc = $prow['grand_total'];
								 $addrmks = $prow['rmks_add'];
								 $addamount = $prow['add_amount'];
								 $lessrmks = $prow['rmks_less'];
								 $lessamount = $prow['less_amount'];
							}
						}else{

						}
					 }		
		  
	?>
	
	<tr>
    <td align="center" valign="middle" class="style8"><?php echo $i++; ?></td>
    <td align="center" valign="middle" nowrap="nowrap" class="style8"><div align="left"><input type="hidden" name="" value=<?php echo $item_id;?>><?php echo $item_no; ?></div></td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $req_quant;?></div></td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php 
	$p_qt = $prev_quant-$tpur;
	echo $p_qt;?></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8">
    	<?php
    		$item_id = $item['item_id'];
    		$sql = "SELECT * FROM store_details WHERE item_id='$item_id' ORDER BY id desc LIMIT 0,1";
    		$result = mysqli_query($conn, $sql);
    		$rowcount = mysqli_num_rows($result);
    		if ( $rowcount > 0 ) {
    		while ($row = mysqli_fetch_assoc($result)) {
    			$aval_qty = $row['closing_qty'];
    	 	} 
    	 }else{
    		$aval_qty = 0; 
    	} ?>
    	<div align="center"><?php echo $aval_qty; ?></div>
    </td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $tpur;?></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $unitprc;?></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $ttlprc;?></div></td>
  </tr>
	
	<?php }

	else
	{
	$item_no = "";
	$req_quant = "";
	$prev_quant = "";
	$avl_quant = "";
	?>
	<tr>
    <td align="center" valign="middle" class="style8"><?php echo $i++; ?></td>
    <td align="center" valign="middle" nowrap="nowrap" class="style8"><div align="left"><?php echo $item_no; ?></div></td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $req_quant;?></div></td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $prev_quant;?></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><div align="center"><?php echo $avl_quant;?></div></td>
    <td align="left" valign="middle" nowrap="nowrap" class="style8"><div align="center"></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8">&nbsp;</td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8">&nbsp;</td>
  </tr>
	<?php }
}
	?>
  
  <tr>
    <td colspan="5" rowspan="4" align="center" valign="middle" class="style8"><div align="left"></div>
    <div align="center"></div>      <div align="center"></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><div align="center"></div></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><b>Total Items Price = </b></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $sumttlprc?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><strong> + Add Amt </strong></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $addrmks; ?></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $addamount; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><strong> - Less Amt </strong></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $lessrmks; ?></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $lessamount; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" nowrap="nowrap" class="style8">&nbsp;</td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><strong>Total Amount = </strong></td>
    <td align="right" valign="middle" nowrap="nowrap" class="style8"><?php echo $grndprc; ?></td>
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

