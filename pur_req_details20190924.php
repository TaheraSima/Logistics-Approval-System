<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
<?php echo include 'include/sidebar.php' ?>
<div class="content-wrapper">
	<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Purchase Requisition Details </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active"> Purchase Requisition Details </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <?php if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
            <div class="alert alert-success">
                <strong>Success!</strong> Requisition Updated Successfully.
            </div>
            <?php } ?>
            <!-- /.row -->
            <hr>
			<div class="card">
				<div class="card-header">
					<center><h5> Purchase Requisition Info </h5></center>
				</div>
				<form action="data/pur_req_print.php?purchase_print" method="POST"  target="print_popup" class="purchaseForm" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
					<div class="card-body">
						<?php 
							$id = $_GET['id'];
							
							$sql = "SELECT requisition.*, division.division_name, department.department_name FROM requisition,division,department WHERE requisition.division_id=division.division_id AND  requisition.department_id=department.department_id AND requisition.id='$id'";
							$result = mysqli_query($conn, $sql);
							while ($reqInfo = mysqli_fetch_assoc($result)) {?>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label>Purchase Order No : </label>
									</div>
									<div class="col-md-3">
										<input type="text" name="po_no" readonly class="form-control" value="<?php 
                                        $req_no = $reqInfo['req_no'];
                                        $rand_number = rand(9999, 1111);
                                        $output =  'PO' . substr($req_no, -4) . $rand_number;
                                        echo $output;
                                       ?>">
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label>PR  No : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['req_no']; ?></p>
										<input type="hidden" name="req_id" class="req_id" value="<?php echo $_GET['id']; ?>">
										<input type="hidden" name="pr_no" value="<?php echo $reqInfo['req_no']; ?>">
										<input type="hidden" name="req_date" value="<?php echo $reqInfo['date']; ?>">
									</div>
									<div class="col-md-2">
										<label>Requisiton Type : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['req_type']; ?></p>										
										<input type="hidden" name="req_type" value="<?php echo $reqInfo['req_type']; ?>">
										
									</div>
									<div class="col-md-2"></div>
								</div>
								<?php 
										if ($reqInfo['req_type'] == "Project") {?>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2"></div>
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label>Project name : </label>
									</div>
									<div class="col-md-2">
										<?php 
											$sql_prj = "SELECT projects.name, requisition.project_name FROM projects, requisition WHERE projects.id = requisition.project_name ";
											$result = mysqli_query($conn, $sql_prj);
											while ($rowprj = mysqli_fetch_assoc($result)) {?>
											<p><?php print $rowprj['name']; ?></p>
									
											<?php }
										?>																					
									</div>
									
								</div>
								<?php }
										?>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label>Employee ID : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['user_id']; ?></p>
										<input type="hidden" name="emp_id" value="<?php echo $reqInfo['user_id']; ?>">
									</div>
									<div class="col-md-2">
										<label>Employee Name : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['employee_name']; ?></p>
										<input type="hidden" name="emp_name" value="<?php echo $reqInfo['employee_name']; ?>">
									</div>
									<div class="col-md-2"></div>
								</div>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label>Company Name  : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['division_name']; ?></p>
										<input type="hidden" name="division_id" value="<?php echo $reqInfo['division_id']; ?>">
										<input type="hidden" name="division_name" value="<?php echo $reqInfo['division_name']; ?>">
									</div>
									<div class="col-md-2">
										<label>Department : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['department_name']; ?></p>
										<input type="hidden" name="department_id" value="<?php echo $reqInfo['department_id']; ?>">
										<input type="hidden" name="department_name" value="<?php echo $reqInfo['department_name']; ?>">
									</div>
									<div class="col-md-2"></div>
								</div>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label> Approved By : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['signature']; ?></p>
										<input type="hidden" name="approved_by" value="<?php echo $reqInfo['signature']; ?>">
									</div>
									<div class="col-md-2">
										<label>Expected Date  : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['expect_date']; ?></p>
										<input type="hidden" name="remarks" value="<?php echo $reqInfo['expect_date']; ?>">
									</div>
									<div class="col-md-2"></div>
								</div>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-1"></div>
									<div class="col-md-2">
										<label>Supplier Name  : </label>
									</div>
									<div class="col-md-4">
										<?php
										$sql = "SELECT * FROM `purchase`WHERE `id` = '$id'";

	                                        if ($result=mysqli_query($conn,$sql))
	                                            {
	                                            while ($row=mysqli_fetch_assoc($result))
	                                            {	                                            	
	                                                if ($row['supplier_name'] != "" ) {?>
	                                                  <input type="text" class="form-control" name="supplier_name" value="<?php echo $row['supplier_name']?>" >
	                                              <?php  }
	                                                else{?>
	                                                	<input type="text" class="form-control" name="supplier_name" value="" placeholder="Enter Supplier Name" required>
	                                               <?php }
	                                            }
	                                    }
	                                    ?>
										
									</div>
									<div class="col-md-3"></div>
									
								</div>
						<hr>
						<center><h5> Purchase Items Info </h5></center>
						<div class="row row-no-gutters border">
	                        <div class="col-sm-1">#SL</div>
	                        <div class="col-sm-3 border-left">  Item Name </div>
	                        <div class="col-sm-1 border-left">  Request Qty </div>
	                        <div class="col-sm-1 border-left">Pre Purchase</div>
	                        <div class="col-sm-1 border-left">Available  Stock</div>
	                        <div class="col-sm-1 border-left">  Purchase Qty </div>
	                        <div class="col-sm-2 border-left">  Unit Price </div>
	                        <div class="col-sm-1 border-left">  Total Price </div>
	                    </div>
	                    <?php
	                    	$total_aprv_qty = 0;
	                    	$total_delvr_qty = 0;
	                    	$i = 1;
	                        $req_id = $_GET['id'];
	                        $sql = "SELECT requisition_details.*, item_info.item_id, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND requisition_details.req_id='$req_id'";
	                        $requisition = mysqli_query($conn, $sql);
	                        while ($item = mysqli_fetch_assoc($requisition)) {
	                        		$total_aprv_qty += $item['aprv_qty'];
	                        		$total_delvr_qty += $item['delvr_qty'];
	                        	?>
	                            <div class="row row-no-gutters border">
	                                <div class="col-sm-1"><?php echo $i++ ?></div>
	                                <div class="col-sm-3 border-left"><?php echo $item['item_name'] ?></div>
	                                <div class="col-sm-1 border-left">
	                                	<input type="hidden" name="rawrequisition_items[<?php echo $item['id']; ?>][item_id]" class="form-control" required value="<?php echo $item['item_id'] ?>"  readonly>
	                                	<input type="hidden" name="rawrequisition_items[<?php echo $item['id']; ?>][item_name]" class="form-control" required value="<?php echo $item['item_name'] ?>"  readonly>

	                                	<?php 
	                                		if ($item['aprv_qty'] == 0) {
	                                			$aprv = $item['quantity'];
	                                		}
	                                		else
	                                		{
	                                			$aprv = $item['aprv_qty'];
	                                		}
	                                	?>
	                                	<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][aprv_qty]" class="form-control aprv_qty" required value="<?php echo $aprv ; ?>"  readonly>
	                                </div>
	                                <div class="col-sm-1 border-left">
	                                	<?php
	                                		$item_id = $item['item_id'];
	                                		$purchase_id = $reqInfo['req_no'];
	                                		$sql = "SELECT sum(purchase_qty) FROM purchase_details WHERE item_id='$item_id' AND purchase_id='$purchase_id'";
	                                		$result = mysqli_query($conn, $sql);
	                                		$rowcount = mysqli_num_rows($result);
	                                		if ( $rowcount > 0) {
	                                		while ($row = mysqli_fetch_assoc($result)) {?>
	                                			<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][pre_pur]" class="form-control pre_pur" required 
	                                			value="<?php
	                                			if($row['sum(purchase_qty)'] == NULL)
	                                			{
	                                				echo 0;
	                                			}else{
	                                				echo $row['sum(purchase_qty)'];	
	                                			}

	                                			?>"  readonly>
	                                	<?php } }else{?>
	                                		<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][pre_pur]" class="form-control pre_pur" value="0" readonly>
	                                	<?php } ?>
	                                </div>
	                                <div class="col-sm-1 border-left">
	                                	<?php
	                                		$item_id = $item['item_id'];
	                                		$sql = "SELECT * FROM store_details WHERE item_id='$item_id' ORDER BY id desc LIMIT 0,1";
	                                		$result = mysqli_query($conn, $sql);
	                                		$rowcount = mysqli_num_rows($result);
	                                		if ( $rowcount > 0 ) {
	                                		while ($row = mysqli_fetch_assoc($result)) {?>
	                                			<input type="hidden" name="rawrequisition_items[<?php echo $item['id']; ?>][item_id]"  value="<?php echo $row['item_id']; ?>">
	                                			<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][previous_qty]" class="form-control previous_qty" required value="<?php echo $row['closing_qty']; ?>"  readonly>
	                                	<?php } }else{?>
	                                		<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][previous_qty]" class="form-control out_of_stock" value="0" readonly>
	                                	<?php } ?>
	                                </div>
	                                <div class="col-sm-1 border-left">
	                                	<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][purchase_qty]" class="form-control purchase_qty" value="0" required>
	                                </div>
	                                <div class="col-sm-2 border-left">
	                                	<input type="number" step="any" name="rawrequisition_items[<?php echo $item['id']; ?>][unit_price]" class="form-control unit_price" required>
	                                </div>
	                                <div class="col-sm-2 border-left">
	                                	<input type="number" step="any" name="rawrequisition_items[<?php echo $item['id']; ?>][total_price]" class="form-control total_price" required value="0" readonly>
	                                </div>
	                            </div>
	                     <?php } ?>
	                     	 <div class="row row-no-gutters border">
                            <div class="col-sm-8 border-left"></div>
                            <div class="col-sm-2 border-left"><p class="text-right"><b>Total Items Price = </b></p></div>
                            <div class="col-sm-2 border-left">
                            	<input type="number" step="any" readonly value="0" name="total_items_price" class="form-control total_items_pdfdrice">
                            </div>
                        </div>
	                     <div class="row row-no-gutters border">
	                     	<div class="col-sm-6 border-left"></div>
                            <div class="col-sm-2 border-left"><p class="text-right"><b><i class="fa fa-plus-circle text-success"></i>&nbsp;&nbsp;Add Amount</b></p></div>
                            <div class="col-sm-2 border-left">
                            	<input type="text" class="form-control credit" placeholder="remarks" name="credit_remarks">
                            </div>
                            <div class="col-sm-2 border-left">
                            	<input type="number" step="any" align="right" class="form-control pull-right add_amount" value="0" name="add_amount">
                            </div>
                        </div>
	                     <div class="row row-no-gutters border">
                            <div class="col-sm-6 border-left"></div>
                            <div class="col-sm-2 border-left"><p class="text-right"><b><i class="fa fa-minus-circle text-danger"></i>&nbsp;&nbsp;Less Amount</b></p></div>
                            <div class="col-sm-2 border-left">
                            	<input type="text" class="form-control debit" placeholder="remarks" name="debit_remarks">
                            </div>
                            <div class="col-sm-2 border-left">
                            	<input type="number" step="any" class="form-control less_amount" value="0" name="less_amount">
                            </div>
                        </div>
                        <div class="row row-no-gutters border">
                            <div class="col-sm-8 border-left"></div>
                            <div class="col-sm-2 border-left"><p class="text-right"><b>Grand Total = </b></p></div>
                            <div class="col-sm-2 border-left">
                            	<input type="number" step="any" name="grand_total" class="form-control grand_total" id="grand_total" value="0" readonly="">
                            </div>
                        </div>
	                     <br>
	                    <center>
	                    	<input type="checkbox"  class="final_checkbox"><label>&nbsp;&nbsp;Are you want to Final Post? Please click the checkbox.</label>
	                    </center>
	                    <center>
	                     	<a href="requisition.php" class="btn btn-danger"> Back </a>
	                     	<input type="submit" class="btn btn-success" id="post"  name="post" value="Post">
	                     	<input type="submit" class="btn btn-success final_post"  name="purchase_order" value="Final Post" disabled>
	                    </center>
					</div>
				</form>
			</div>
        </div>
        <?php } ?>
        <!-- /.container-fluid -->
    </div>
     <script type="text/javascript">
    	 $( document ).on( 'keyup', '.unit_price', function() {
        	var umitPriceElem = $( this );
        	var purQtyElem = umitPriceElem.parent().prev().find( '.purchase_qty' );
        	var totalPriceElem = umitPriceElem.parent().next().find( '.total_price' );

        	$('.unit_price').each(function(){
        		var aprv_qty = parseInt( purQtyElem.val() );
        		var umitPrice = parseInt( umitPriceElem.val() );
        		var totalPrice = aprv_qty * umitPrice;
        		totalPriceElem.val(totalPrice);
			});

			/*var totalItemPrice = 0;
        	$('.unit_price').each(function(){
        		var total_price = parseInt( totalPriceElem.val() );
        		// console.log(totalPriceElem.val());
        		if(total_price != 0){
				    totalItemPrice += total_price;
        			// console.log(totalItemPrice);
				}
			});
			$(".total_item_price").val(totalItemPrice);*/

			var sum = 0;
		    $('.total_price').each(function(i,e){
		    	// console.log($(e).val());
		        sum +=  parseInt($(e).val());
		        // console.log(e);
		    });
		    $('.total_items_pdfdrice').val(sum);
		    $('.grand_total').val(sum);
		});

    </script>
 <script type="text/javascript">
    	 $( document ).on( 'keyup', '.purchase_qty', function() {
        	var purchaseElem = $( this );
        	var aprvQtyElem = purchaseElem.parent().prev().prev().prev().find( '.aprv_qty' );
        	var unitPrcElem = purchaseElem.parent().next().find( '.unit_price' );
        	var purchase_qty = parseInt( purchaseElem.val() );
        	var aprv_qty = parseInt( aprvQtyElem.val() );
        	var unit_price = parseInt( unitPrcElem.val() );
        	var totalPriceElem = purchaseElem.parent().next().next().find( '.total_price' );
        	var preDlvrElem = purchaseElem.parent().prev().prev().find( '.pre_pur' );
        	var previous_dlvr = parseInt( preDlvrElem.val() );
        	var apr_dlvr = aprv_qty - previous_dlvr;

        	if (purchase_qty > 0) {
	        	if(purchase_qty > apr_dlvr){
		        	alert('NOT ALLOWED');
		        	$(this).val(apr_dlvr);
	        	}
	        }

        	$('.purchase_qty').each(function(){
        		var purchase_qty = parseInt( purchaseElem.val() );
        		var unitPrice = parseInt( unitPrcElem.val() );
        		var totalPrice = purchase_qty * unitPrice;
        		totalPriceElem.val(totalPrice);
			});       	

        	var sum = 0;
		    $('.total_price').each(function(i,e){
		    	// console.log($(e).val());
		        sum +=  parseInt($(e).val());
		        // console.log(e);
		    });
		    $('.total_items_pdfdrice').val(sum);1
		    $('.grand_total').val(sum);

		});
</script>
    <script type="text/javascript">
    	$(document).ready(function() {
			var outOfStock = $('.out_of_stock').val();
			var curQtyElems = $('.out_of_stock').parent().next().find( '.new_qty' ).attr('readonly', 'readonly');

		    $('.final_checkbox').click(function(){
	            if($(this).prop("checked") == true){
	                $('.purchaseForm').removeAttr('target', 'print_popup');
	                $('.purchaseForm').removeAttr('onsubmit', 'window.open("about:blank","print_popup","width=1000,height=800")');
	                $('.final_post').removeAttr('disabled', 'disabled');
	                $('.purchaseForm').removeAttr('action', 'data/pur_req_print.php?purchase_print');
	                $('.purchaseForm').attr('action', 'data/pur_req_details.php?purchase_order');
	                $('#post').attr('disabled', 'disabled');
	            }
	            else if($(this).prop("checked") == false){
	            	$('.purchaseForm').attr('target', 'print_popup');
	                $('.purchaseForm').attr('onsubmit', 'window.open("about:blank","print_popup","width=1000,height=800")');
	                $('.final_post').attr('disabled', 'disabled');
	                $('.purchaseForm').removeAttr('action', 'data/pur_req_details.php?purchase_order');
	                $('.purchaseForm').attr('action', 'data/pur_req_print.php?purchase_print');
	                $('#post').removeAttr('disabled', 'disabled');
	            }
	        });
		});
    </script>

    <script type="text/javascript">
    	$(document).ready(function() {
    		$.each($('.aprv_qty'), function(index, value) {
    			var  aprvQtyElem = $(this);
    			var prePurElem = aprvQtyElem.parent().next().find( '.pre_pur' );
    			var purQtyElem = aprvQtyElem.parent().next().next().next().find( '.purchase_qty' );
    			var aprvQty = parseInt(aprvQtyElem.val());
    			var prePur = parseInt(prePurElem.val());
    			var total = aprvQty - prePur;

    			if (isNaN(total)) 
    			{
    				purQtyElem.val(0);	
    			}else{
    				purQtyElem.val(total);
    			}
			});
    		$.each($('.purchase_qty'), function(index, value) {
    			var  purQtyElem = $(this);
    			var purQty = purQtyElem.val();
    			if (purQty == 0) 
    			{
    				purQtyElem.attr('readonly', 'readonly');
    				purQtyElem.parent().next().find( '.unit_price').attr('readonly', 'readonly');
    				purQtyElem.parent().next().find( '.unit_price').val(0);
    			}
			});
		});
    </script>
     <script type="text/javascript">
    	$(document).ready(function() {

    		$('.add_amount').keyup(function(){
    			$('.add_amount').each(function(){
	        		var addAmt = parseInt( $(this).val() );
	        		var lessAmt = parseInt( $('.less_amount').val() );
	        		var grandTotal = parseInt( $('.total_items_pdfdrice').val() );
	        		var fGrandTotal = (grandTotal + addAmt) - lessAmt;
	        		$('.grand_total').val(fGrandTotal);
				});
    		});
    		
    		$('.less_amount').keyup(function(){
    			$('.less_amount').each(function(){
	        		var lessAmt = parseInt( $(this).val() );
	        		var addAmt = parseInt( $('.add_amount').val() );
	        		var itemPriceTotal = parseInt( $('.total_items_pdfdrice').val() );
	        		var lessGrandTotal = (itemPriceTotal + addAmt) - lessAmt; 
	        		$('#grand_total').val(lessGrandTotal);
				});
    		});

    		 
    	});
    </script>
</div>
<?php echo include 'include/footer.php' ?>