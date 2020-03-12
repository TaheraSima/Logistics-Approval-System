<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  	<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark"> Material Receive </h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		              <li class="breadcrumb-item active">Material Receive</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> New Material Receive Added Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Material Receive Updated Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Material Receive Deleted Successfully.
					</div>
		     <?php } ?>
  			<section class="content-header">
      			<div class="container-fluid">
      				<div class="row">
      					<div class="col-md-12">
				            <div class="card">
					            <div class="card-header">
					                <h3 class="card-title">
					                	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmodal">
										 <i class="fas fa-plus"></i>  Create New
										</button>
						            </h3>
						        </div>
						          <!-- /.card-header -->
						        <div class="card-body p-0">
						            <table class="table table-striped table-bordered">
							            <tr>
							                <th> SL#</th>
							                <th> MR NO </th>
							                <th> Supplier Name </th>
							                <th> Date </th>
							                <th> Action </th>
							            </tr>
							            <?php
						              		$i = 1;
						              		$sql = "SELECT * FROM store WHERE record_type='In' ORDER BY id DESC";
											if ($result=mysqli_query($conn,$sql))
											  {
											  // Fetch one and one row
											  while ($row=mysqli_fetch_assoc($result))
											    {?>
							            		<tr>
									            	<td><?php echo $i++; ?></td>
									            	<td><?php echo $row['mr_no']; ?></td>
									            	<td><?php echo $row['supplier_name']; ?></td>
									            	<td><?php echo date('m-d-Y', strtotime($row['date'])); ?></td>
								            		<td class="text-center">
												    	<a href="#"  data-toggle="modal" data-target="#view_modal<?php echo $row['id']; ?>"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button></a>
												    	<a href="#" class="text-danger" data-toggle="modal" data-target="#delete_modal<?php echo $row['id']; ?>" ><button class="btn-danger btn btn-sm"><i class="fas fa-trash"></i></button></a>
												    </td>
												    <!-- ====================== View Modal ============= -->
										            <div class="modal fade bd-example-modal-lg" id="view_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title text-center" id="exampleModalScrollableTitle">Item Details</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																		<div class="row border">
																			<div class="col-md-6 border text-center"><b> Item Name </b></div>
																			<div class="col-md-6 border text-center"><b> Quantity </b></div>
																		</div>
																		<?php
																			$store_id = $row['id'];
														              		$sql2 = "SELECT store_details.qty,item_info.item_name FROM store_details,item_info WHERE store_details.item_id=item_info.item_id AND store_id='$store_id'";

																			if ($result2=mysqli_query($conn,$sql2))
																			{
																			  	while ($row2=mysqli_fetch_assoc($result2)){ ?>
																			  	<div class="row border">
																					<div class="col-md-6 border text-center"><?php echo $row2['item_name'];?></div>
																					<div class="col-md-6 border text-center"><?php echo $row2['qty'];?></div>
																				</div>
																		<?php } }?>
																</div>
															</div>
														</div>
													</div>
												    <!-- ====================== Delete Modal ============= -->
													<div class="modal fade" id="delete_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
														<div class="modal-dialog modal-dialog-scrollable" role="document">
															<div class="modal-content">
																<div class="modal-body">
																	<!-- form start -->
																	<form role="form" action="data/material_receive.php?delete" method="post" style="display: none;">
																		<input type="hidden" name="mateid" value="<?php echo $row["id"] ?>">
																		<h3 class="text-danger">
																			<b>Are you sure want to delete this??</b>
																		</h3>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-success" data-dismiss="modal"> No! </button>
																			<button type="submit" class="btn btn-danger"> Yes Delete!! </button>
																		</div>
																		<!-- /.card-body -->
																	</form>
																</div>
															</div>
														</div>
													</div>
									            </tr>
							            <?php } } ?> 
							        </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ====================== Add Modal ============= -->
			<div class="modal fade bd-example-modal-lg" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalScrollableTitle"> Add New Item </h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="card card-primary">
								<!-- form start -->
								<form role="form" action="data/material_receive.php?store" method="post">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">										
							                      <?php              		
												           $sql = "SELECT * FROM purchase ORDER BY po_no DESC";
												           $resultoption = mysqli_query($conn,$sql);
												?>											

												<div class="form-group">
												        <label for="po_no"> PO NO </label>
												    	<select style="width:250px; height: 50px" class="input-group form-control select2" name="mr_no" required>
												<?php
												while ($row = mysqli_fetch_array($resultoption)){

													echo '<option value="'.$row["po_no"].'">'.$row["po_no"].'</option>';
												}
												?>
												    	</select>
												    </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="supplier_name"> Remarks </label>
													<input type="text" class="form-control" name="supplier_name"  placeholder="Additional Remarks" >
												</div>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<button type="button" class="btn btn-success item-add"> + Add </button>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<table class="table table-sm">
										    	<thead>
										    		<tr>
										    			<td>#</td>
										    			<td>Item Name </td>
										    			<td style=" margin-right:200px;"> Previous Qty </td>
										    			<td style=" margin-right:200px;"> Entry Qty </td>
										    			<td style=" margin-right:200px;"> Total Qty </td>
										    		</tr>
										    	</thead>
										    	<tbody class="items">
										    		
										    	</tbody>
										    </table>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-5"></div>
											<div class="col-md-4">
												<button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
												<button type="submit" class="btn btn-success"> Save </button>
											</div>
											<div class="col-md-3"></div>
										</div>
									</div>
									<!-- /.card-body -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<?php
            $results=mysqli_query( $conn,"select * from item_info" );
            $options = '';
            while ( $row = mysqli_fetch_assoc( $results ) ) {
                $options .= sprintf( "<option value='%s'>%s</option>", $row['item_id'], $row['item_name'] );
            }
        ?>
       
<script>
    $(document).ready(function() {
    	row_item();
        var i = 0;
        function row_item(){
        	 var _html = `
                <tr class="item">
                    <td>
                        <button type="button" class="btn btn-sm btn-danger item-remove">-</button>
                    </td>
                    <td>
                    <select style="width:250px;" class="input-group form-control select_item_id select2" name="rawrequisition_items[${i}][item_id]" required>
                        <option value="" selected>Select One</option>
                        <?php echo $options; ?>
                      </select>
                    </td>
                    <td>
                        <input type="number" step="any" name="rawrequisition_items[${i}][previous_qty]" readonly class="form-control previous_qty" required/>
                    </td>
                    <td>
                        <input type="number" step="any" name="rawrequisition_items[${i}][new_qty]" class="form-control new_qty" required/>
                    </td>
                    <td>
                        <input type="number" step="any" name="rawrequisition_items[${i}][current_quantity]" readonly class="form-control current_quantity" required/>
                    </td>
                </tr>
                <script>
                    $( '.select2' ).select2();
                <\/script>
            `;
            $('.items').append(_html);
            i++;
        }

        // var i = 0;
        // $('.item-add').click(function() {
        //     var _html = `
        //         <tr class="item">
        //             <td>
        //                 <button type="button" class="btn btn-sm btn-danger item-remove">-</button>
        //             </td>
        //             <td>
        //             <select style="width:250px;" class="input-group form-control select_item_id select2" name="rawrequisition_items[${i}][item_id]" required>
        //                 <option value="" selected>Select One</option>
        //                 <?php echo $options; ?>
        //               </select>
        //             </td>
        //             <td>
        //                 <input type="number" step="any" name="rawrequisition_items[${i}][previous_qty]" readonly class="form-control previous_qty" required/>
        //             </td>
        //             <td>
        //                 <input type="number" step="any" name="rawrequisition_items[${i}][new_qty]" class="form-control new_qty" required/>
        //             </td>
        //             <td>
        //                 <input type="number" step="any" name="rawrequisition_items[${i}][current_quantity]" readonly class="form-control current_quantity" required/>
        //             </td>
        //         </tr>
        //         <script>
        //             $( '.select2' ).select2();
        //         <\/script>
        //     `;
        //     $('.items').append(_html);
        //     i++;
        // });

        $('.item-add').click(function() {
            row_item();
        });
        $('.item-add').click(function() {
            console.log(_options);
        });

        $(document).on('click', '.item-remove', function() {
            $(this).parent().parent().remove();
        });


        $(document).on('change', '.select_item_id', function() {
        	var itemElem = $(this);
        	var prevQtyElem = itemElem.parent().next().find( '.previous_qty' );
        	var item_id = itemElem.val();
		    var data = "item_id="+item_id;
		    $.ajax({
		        url: 'data/material_receive.php',
		        method: "POST",
		        data: data,
		        success: function(data){
		        // console.log(data);
		        // console.log(data);
		        // prevQtyElem.empty();
		          prevQtyElem.val(data);
		        }
		    });
		});
        
        $( document ).on( 'keyup', '.new_qty', function() {
        	var newQtyElem = $( this );
        	var prevQtyElem = newQtyElem.parent().prev().find( '.previous_qty' );
        	var curQtyElem = newQtyElem.parent().next().find( '.current_quantity' );
        	var new_qty = parseInt( newQtyElem.val() );
        	var previous_qty = parseInt( prevQtyElem.val() );
        	var current_quantity = previous_qty + new_qty; 
        	curQtyElem.val( current_quantity );
		} );

    });

</script>
<?php echo include 'include/footer.php' ?>