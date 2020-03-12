<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
<?php echo include 'include/sidebar.php' ?>
<div class="content-wrapper">
	<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Requisition Details </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active"> Requisition Details </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <hr>
			<div class="card">
				<div class="card-header">
					<center><h5> Requisition Initiator Info </h5></center>
				</div>
				<form action="data/create_requisition.php?deliver" method="POST">
					<div class="card-body">
						<?php 
							$id = $_GET['id'];
							$sql = "SELECT requisition.*, division.division_name, department.department_name FROM requisition,division,department WHERE requisition.division_id=division.division_id AND  requisition.department_id=department.department_id AND requisition.id='$id'";
							$result = mysqli_query($conn, $sql);
							while ($reqInfo = mysqli_fetch_assoc($result)) {?>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label>Requisiton No : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['req_no']; ?></p>
										<input type="hidden" name="req_id" value="<?php echo $_GET['id']; ?>">
										<input type="hidden" name="req_number" value="<?php echo $reqInfo['req_no']; ?>">
									</div>
									<div class="col-md-2">
										<label>Requisiton Type : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['req_type']; ?></p>
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
										<input type="hidden" name="user_id" value="<?php echo $reqInfo['user_id']; ?>">
									</div>
									<div class="col-md-2">
										<label>Employee Name : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['employee_name']; ?></p>
									</div>
									<div class="col-md-2"></div>
								</div>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label>Division : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['division_name']; ?></p>
										<input type="hidden" name="division_id" value="<?php echo $reqInfo['division_id']; ?>">
									</div>
									<div class="col-md-2">
										<label>Department : </label>
									</div>
									<div class="col-md-2">
										<p><?php echo $reqInfo['department_name']; ?></p>
										<input type="hidden" name="department_id" value="<?php echo $reqInfo['department_id']; ?>">
									</div>
									<div class="col-md-2"></div>
								</div>
									<!-- vendor info add -->
									<?php 
										if ($reqInfo['req_type'] == "Project") {?>
											<hr>											
												<h5><center><b>Vendor Information</b></center></h5>
												<hr>
												<div class="row">													
													<div class="col-md-2">
														<label>Purchesd By-</label>
													</div>
													<div class="col-md-2">
														<?php
															$sql = "SELECT * FROM purchase WHERE id = $id";
															$result = mysql_query($conn, $sql);
															while ($row_pur_id = mysqli_fetch_assoc($result)) {?>
																<label><?php echo $row_pur_id['purchaser_id']; ?></label>
															<?php }
														?>
														
													</div>
													<div class="col-md-2">
														<label>Purchaser ID-</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="">
													</div>
													<div class="col-md-2">
														<label>Purchaser Name-</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="">
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-2">
														<label>Vendor :</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="vendor">
													</div>
													<div class="col-md-2">
														<label>Gate Pass No : </label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="gate_pass_no">
													</div>
													<div class="col-md-2"></div>
												</div>

												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-2">
														<label>Site Name :</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="vendor">
													</div>
													<div class="col-md-2">
														<label>Bill No : </label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="gate_pass_no">
													</div>
													<div class="col-md-2"></div>
												</div>

												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-2">
														<label>Site-Rcvr-Name :</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="vendor">
													</div>
													<div class="col-md-2">
														<label>Chalan No : </label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="gate_pass_no">
													</div>
													<div class="col-md-2"></div>
												</div>

												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-2">
														<label>Site-Rcvr-Phn :</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="vendor">
													</div>
													<div class="col-md-2">
														<label>Other info : </label>
													</div>
													<div class="col-md-2">
														<textarea class="form-control" name="gate_pass_no"></textarea> 
													</div>
													<div class="col-md-2"></div>
												</div>

												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-2">
														<label>Site Address :</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="vendor">
													</div>
													<div class="col-md-2"></div>
													<div class="col-md-2"></div>
													<div class="col-md-2"></div>
												</div>

												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-2">
														<label>Vendor :</label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="vendor">
													</div>
													<div class="col-md-2">
														<label>Gate Pass No : </label>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="gate_pass_no">
													</div>
													<div class="col-md-2"></div>
												</div>
												
										<?php }
									?>								


						<?php } ?>
						<hr>
						<center><h5> Requisition Items Info </h5></center>
						<div class="row row-no-gutters border">
	                        <div class="col-sm-1">#SL</div>
	                        <div class="col-sm-2 border-left">  Item Name </div>
	                        <div class="col-sm-2 border-left">  Request Qty </div>
	                        <div class="col-sm-2 border-left">  Pre Delivery </div>
	                        <div class="col-sm-2 border-left">  Available  Stock </div>
	                        <div class="col-sm-2 border-left">  Deliver Qty </div>
	                        <div class="col-sm-1 border-left">  Current Balance </div>
	                    </div>
	                    <?php
	                    	$total_aprv_qty = 0;
	                    	$total_delvr_qty = 0;
	                    	$i = 1;
	                        $req_id = $_GET['id'];
	                        $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND requisition_details.req_id='$req_id'";
	                        $requisition = mysqli_query($conn, $sql);
	                        while ($item = mysqli_fetch_assoc($requisition)) {
	                        		$total_aprv_qty += $item['aprv_qty'];
	                        		$total_delvr_qty += $item['delvr_qty'];
	                        	?>

	                            <div class="row row-no-gutters border">
	                                <div class="col-sm-1"><?php echo $i++ ?></div>
	                                <div class="col-sm-2 border-left"><?php echo $item['item_name'] ?></div>
	                                <div class="col-sm-2 border-left">
	                                	<input type="hidden" name="rawrequisition_items[<?php echo $item['id']; ?>][reqd_id]" class="form-control" required value="<?php echo $item['id'] ?>"  readonly>
	                                	<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][aprv_qty]" class="form-control aprv_qty" required value="<?php echo $item['aprv_qty'] ?>"  readonly>
	                                </div>
	                                <div class="col-sm-2 border-left">
	                                	<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][pre_delvr]" class="form-control pre_delvr" required value="<?php echo $item['delvr_qty'] ?>"  readonly>
	                                </div>
	                                <div class="col-sm-2 border-left">
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
	                                		<input type="text" name="out_of_stock" class="form-control out_of_stock" value="Out of Stock" readonly>
	                                	<?php } ?>
	                                </div>
	                                <div class="col-sm-2 border-left">

	                                	<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][new_qty]" class="form-control new_qty"
	                                	<?php if ($item['aprv_qty'] == $item['delvr_qty']) {?>
	                                		readonly value="0"
	                                	<?php }?>
	                                	<?php if ($item['aprv_qty'] > $item['delvr_qty']) {?>
	                                		value="0"
	                                	<?php }?>
	                                	>
	                                	<?php if ($item['delvr_qty'] > 0 && ($item['aprv_qty'] - $item['delvr_qty']) != 0) {?>
	                                		<span class="text-danger">
	                                			<b>Due <?php echo $item['aprv_qty'] - $item['delvr_qty']; ?> <?php echo $item['item_name'] ?></b>
	                                		</span>
	                                	<?php }?>
	                                </div>
	                                <div class="col-sm-1 border-left">
	                                	<input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][current_quantity]" class="form-control current_quantity" readonly>
	                                </div>
	                            </div>
	                     <?php } ?>
	                     <div class="row">
	                     	<div class="col-md-1"></div>
	                     	<div class="col-md-2" class="text-right"><p class="text-right"><b class="text-right">Total Items = </b></p></div>
	                     	<div class="col-md-2">
	                     		<input type="text" name="total_aprv_qty" class="form-control total_aprv_qty" value="<?php echo $total_aprv_qty; ?>" readonly>
	                     	</div>
	                     	<div class="col-md-2">
	                     		<input type="text" name="total_delvr_qty" class="form-control total_delvr_qty" value="<?php echo $total_delvr_qty; ?>" readonly>
	                     	</div>
	                     	<div class="col-md-2"></div>
	                     	<div class="col-md-2">
	                     		<input type="text" name="total_newQty" class="form-control total_newQty" readonly >
	                     	</div>
	                     </div>
	                     <hr>
	                     <center>
	                     	<a href="requisition.php" class="btn btn-danger"> Back </a>
	                     	<input type="submit" class="btn btn-success partial_delivery" disabled name="partial_delivery" value="Partial Delivery">
	                     	<input type="submit" class="btn btn-success full_delivery" disabled name="full_delivery" value="Full Delivery">
	                     </center>
					</div>
				</form>
			</div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <script type="text/javascript">
    	 $( document ).on( 'keyup', '.new_qty', function() {
        	var newQtyElem = $( this );
        	var aprv_qty_e = newQtyElem.parent().prev().prev().prev().find( '.aprv_qty' );
        	var pre_delvrElem = newQtyElem.parent().prev().prev().find( '.pre_delvr' );
        	var prevQtyElem = newQtyElem.parent().prev().find( '.previous_qty' );
        	var curQtyElem = newQtyElem.parent().next().find( '.current_quantity' );
        	var current_quantity = 0;
        	var new_qty = parseInt( newQtyElem.val() );
        	var aprv_qty = parseInt( aprv_qty_e.val() );
        	var pre_delvr = parseInt( pre_delvrElem.val() );
        	var previous_qty = parseInt( prevQtyElem.val() );
        	var cur_aprv_qty = aprv_qty - pre_delvr;
        	// console.log(cur_aprv_qty);
        	if (new_qty > 0) {

	        	if(new_qty > cur_aprv_qty){
		        	alert('NOT ALLOWED');
		        	$(this).val(cur_aprv_qty);
		        	current_quantity = previous_qty - cur_aprv_qty;
	        	}else{
	        		current_quantity = previous_qty - new_qty;
	        	}

	        	if(new_qty > previous_qty){
		        	alert('Unavailable Stock Quantity.');
		        	$(this).val(previous_qty);
		        	current_quantity = previous_qty - previous_qty;

		        	if(new_qty > cur_aprv_qty){
			        	alert('NOT ALLOWED');
			        	$(this).val(cur_aprv_qty);
			        	current_quantity = previous_qty - cur_aprv_qty;
		        	}else{
		        		current_quantity = previous_qty - new_qty;
		        	}
	        	}
	        }
        	curQtyElem.val( current_quantity );
        	var current_quantity_total = 0;
        	$('.new_qty').each(function(){
        		new_qty = parseInt( this.value );
        		if(new_qty != 0){
				    current_quantity_total += new_qty;
				}

			});

        	$(".total_newQty").val(current_quantity_total);
        	var total_aprv_qty = $('input:text[name=total_aprv_qty]').val();
		    var total_delvr_qty = $('input:text[name=total_delvr_qty]').val();
		    var t_pre_delvr = parseInt(total_aprv_qty) - parseInt(total_delvr_qty);

        	if (t_pre_delvr == current_quantity_total){

        		 $(".full_delivery").removeAttr("disabled");
        		 $('.partial_delivery').attr("disabled", "disabled");
        	}
        	if (t_pre_delvr > current_quantity_total){

        		$('.full_delivery').attr("disabled", "disabled");
        		$(".partial_delivery").removeAttr("disabled");
        	}
		});

    </script>
    <script type="text/javascript">
    	$(document).ready(function() {

		   var outOfStock = $('.out_of_stock').val();
		   var curQtyElems = $('.out_of_stock').parent().next().find( '.new_qty' ).attr('readonly', 'readonly');

		   // $('.pre_delvr').each(function(){
  			// 	var pre_delvr = $('.pre_delvr').val();
		   // 		var aprv_qty = $('.aprv_qty').val();
		   // 		// if (pre_delvr == aprv_qty) {
		   // 		// 	var curQtyElems = $('.out_of_stock').parent().next().find( '.new_qty' ).attr('readonly', 'readonly');
		   // 		// 	console.log(curQtyElems);
		   // 		// }
		   // 		console.log(pre_delvr);
  			// });

		   	
		});
    </script>
</div>
<?php echo include 'include/footer.php' ?>