<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  <!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">User Accounts</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		              <li class="breadcrumb-item active">User Accounts</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> New User Accounts Added Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> User Accounts Updated Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> User Accounts Deleted Successfully.
					</div>
		     <?php } ?>
  			<section class="content-header">
      			<div class="container-fluid">
      				<div class="row">
      					<div class="col-md-12">
				            <div class="card">
					            <div class="card-header">
					                <h3 class="card-title">
					                	<button type="button" class="btn btn-success elevation-3" data-toggle="modal" data-target="#addmodal">
										 <i class="fas fa-plus"></i>  Create New User
										</button>
						            </h3>
						        </div>
						        <br>
						          <!-- /.card-header -->
						        <div class="card-body p-2">
						            <table class="table table-bordered mydatatable table-striped table-hover">
							            <thead>	
								            <tr>
								                <th> #SL</th>
								                <th> Employee ID </th>
								                <th> Employee Name </th>
								                <th> Division </th>
								                <th> Department </th>
								                <th> Desination </th>
								                <th> Access Group </th>								               
								                <th>Action</th>
								            </tr>
								        </thead>
								        <tbody>
						              	<?php
						              		$i = 1;
						              		
						              		$sql = "SELECT user_accounts.id, user_accounts.employee_id, user_accounts.status, user_accounts.employee_name, division.division_id, division.division_name, department.department_name, unit.unit_name, designation.designation_id,  designation.designation_name, access_level.access_id, access_level.access_name FROM user_accounts, division, department, unit, designation, access_level WHERE user_accounts.division_id=division.division_id AND user_accounts.department_id=department.department_id AND user_accounts.unit_id=unit.unit_id AND user_accounts.designation_id=designation.designation_id AND user_accounts.access_level_id=access_level.access_id ORDER BY user_accounts.id DESC ";

											if ($result=mysqli_query($conn,$sql))
											  {
											  // Fetch one and one row
											  while ($row=mysqli_fetch_assoc($result))
											    {?>
											    <tr>
						                          	<td><?php echo $i++ ?></td>                         
						                          	<td><?php echo $row['employee_id']; ?></td>                         
						                          	<td><?php echo $row['employee_name']; ?></td>              
						                          	<td><?php echo $row['division_name']; ?></td>                        
						                          	<td><?php echo $row['department_name']; ?></td>
						                          	<td><?php echo $row['designation_name']; ?></td> 
						                          	<td><?php echo $row['access_name']; ?></td> 
						                         	
												    <td>
												    	<a href="#"  data-toggle="modal" id="user_edit_modal_<?php echo $row['id']; ?>" data-target="#edit_modal_<?php echo $row["id"]; ?>"><i class="fas fa-edit"></i></a>
												    	<?php 
												          if ($_SESSION['access_permission'] == 'Super Admin') {?>
												            <a href="#" class="text-danger" data-toggle="modal" data-target="#user_accounts_delete_modal_<?php echo $row['id']; ?>" ><i class="fas fa-trash"></i></a>
												          <?php
												           }
												           else
												           {
												            printf("");
												           }

												          ?> 
												    </td>

														<!-- =========== User edit modal ================ -->
												        <div class="modal fade bd-example-modal-lg" id="edit_modal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-body">
																	<!-- form start -->
																	<form role="form" action="data/user_accounts.php?update" method="post" style="display: none;">
																		<div class="card-body">
																			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label for="employee_id"> Employee ID </label>
																				<input type="text" class="form-control" name="employee_id" value="<?php echo $row["employee_id"]; ?>"  required>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label for="employee_name"> Employee Name </label>
																				<input type="text" class="form-control" name="employee_name"  value="<?php echo $row["employee_name"]; ?>" required>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6">
																			<?php
															                    $sql_edit = "SELECT * FROM division ORDER BY division_id DESC";
															                    $resultoption_edit = mysqli_query($conn,$sql_edit);
															                ?>
															                <div class="form-group">
																		        <label for="division_id">Division Name</label>
																				<select class="form-control" name="division_id" id="division_id">
																					<option value="<?php echo $row['division_id']; ?>"><?php echo $row['division_name']; ?></option>
																				<?php
																					while ($row_edit = mysqli_fetch_array($resultoption_edit)){

																						echo '<option value="'.$row_edit["division_id"].'">'.$row_edit["division_name"].'</option>';
																					}
																				?>
																		        	</select>
																		      </div>

																		</div>
																		<div class="col-md-6">
																			<?php
															                    $sql_edit = "SELECT * FROM department ORDER BY department_id DESC";
															                    $resultoption_edit = mysqli_query($conn,$sql_edit);
															                ?>
															                <div class="form-group">
																		        <label for="dept">Department Name</label>
																				<select class="form-control" name="dept" id="dept">
																					<option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
																				<?php
																					while ($row_edit = mysqli_fetch_array($resultoption_edit)){

																						echo '<option value="'.$row_edit["department_id"].'">'.$row_edit["department_name"].'</option>';
																					}
																				?>
																		        	</select>
																		      </div>

																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6">
																			<?php
															                    $sql_edit = "SELECT * FROM unit ORDER BY unit_id DESC";
															                    $resultoption_edit = mysqli_query($conn,$sql_edit);
															                ?>
															                <div class="form-group">
																		        <label for="unit">Unit Name</label>
																				<select class="form-control" name="unit" id="unit">
																					<option value="<?php echo $row['unit_id']; ?>"><?php echo $row['unit_name']; ?></option>
																				<?php
																					while ($row_edit = mysqli_fetch_array($resultoption_edit)){

																						echo '<option value="'.$row_edit["unit_id"].'">'.$row_edit["unit_name"].'</option>';
																					}
																				?>
																		        	</select>
																		      </div>

																		</div>
																		<div class="col-md-6">
																			<?php
															                    $sql_edit = "SELECT * FROM designation ORDER BY designation_id DESC";
															                    $resultoption_edit = mysqli_query($conn,$sql_edit);
															                ?>
															                <div class="form-group">
																		        <label for="designation_id">Designation</label>
																				<select class="form-control" name="designation_id" id="designation_id">
																					<option value="<?php echo $row['designation_id']; ?>"><?php echo $row['designation_name']; ?></option>
																				<?php
																					while ($row_edit = mysqli_fetch_array($resultoption_edit)){

																						echo '<option value="'.$row_edit["designation_id"].'">'.$row_edit["designation_name"].'</option>';
																					}
																				?>
																		        	</select>
																		      </div>

																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6">
																			<?php
															                    $sql_edit = "SELECT * FROM access_level ORDER BY access_id DESC";
															                    $resultoption_edit = mysqli_query($conn,$sql_edit);
															                ?>
															                <div class="form-group">
																		        <label for="access_level_id">Access Level</label>
																				<select class="form-control" name="access_level_id" id="access_level_id">
																					<option value="<?php echo $row['access_id']; ?>"><?php echo $row['access_name']; ?></option>
																				<?php
																					while ($row_edit = mysqli_fetch_array($resultoption_edit)){

																						echo '<option value="'.$row_edit["access_id"].'">'.$row_edit["access_name"].'</option>';
																					}
																				?>
																		        	</select>
																		      </div>

																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label for="status"> Select Status </label>
																				<select class="form-control" name="status">																					
																					<option value="1"> Active </option>
																					<option value="0"> Inactive </option>
																				</select>
																			</div>
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
																	</form>
																</div>
															</div>
														</div>
													</div>


																	<!-- =========== User edit modal ================ -->




												    <!-- =========== User delete modal ================ -->
												    <div class="modal fade" id="user_accounts_delete_modal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
														<div class="modal-dialog modal-dialog-scrollable" role="document">
															<div class="modal-content">
																<div class="modal-body">
																	<!-- form start -->
																	<form role="form" action="data/user_accounts.php?delete" method="post" style="display: none;">
																		<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
																		<h3 class="text-danger"><b>Are you sure want to delete this??</b></h3>
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
											    <?php	} }?>
											</tbody>
										<!-- company Type edit moldal -->
										</div>
							</div>
						</div>
					</div>
						<!-- company Type edit moldal -->
						
				
			</table>
		</div><!-- /.card-body -->
	</div>
	<!-- /.card -->
	</div>
	</div>
</div>
</section>
      		<!-- compnay create modal -->
      		<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle"> Add New User Accounts </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card card-primary">
					<!-- form start -->
				<form role="form" action="data/user_accounts.php?store" method="post">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="employee_id"> Employee ID </label>
										<input type="text" class="form-control" name="employee_id"  placeholder="Enter id" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="employee_name"> Employee Name </label>
										<input type="text" class="form-control" name="employee_name"  placeholder="Enter name" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="email"> Email </label>
										<input type="text" class="form-control" name="email"  placeholder="Enter email" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="password"> Password </label>
										<input type="text" class="form-control" name="password"  placeholder="Enter Password" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<?php
					                    $sql_edit = "SELECT * FROM division ORDER BY division_id DESC";
					                    $resultoption_edit = mysqli_query($conn,$sql_edit);
					                ?>
					                <div class="form-group">
					                <label for="division_id">Division Name</label>
					                	<select class="form-control" name="division_id" id="division_id">
					                		<option value="" selected=""> Select Division </option>
					                        <?php
				                        	while ($row_edit = mysqli_fetch_array($resultoption_edit)){
				                        		echo '<option value="'.$row_edit["division_id"].'">'.$row_edit["division_name"].'</option>';
				                        	}
					                        ?>
					                    </select>
					                  </div>
								</div>
								<div class="col-md-6">
									<?php
					                    $sql_dept = "SELECT * FROM department ORDER BY department_id DESC";
					                    $resultoption_edit_dept = mysqli_query($conn,$sql_dept);
					                ?>
									<div class="form-group">
										<label for="department"> Department </label>
										<select class="form-control department_id" name="department_id" id="department_id">
											<option value="" selected=""> Select Department </option>
					                        <?php
				                        	while ($row_edit = mysqli_fetch_array($resultoption_edit_dept)){
				                        		echo '<option value="'.$row_edit["department_id"].'">'.$row_edit["department_name"].'</option>';
				                        	}
					                        ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<!-- <?php
					                    $sql_unit = "SELECT * FROM unit ORDER BY unit_id DESC";
					                    $resultoption_edit_unit = mysqli_query($conn,$sql_unit);
					                ?>
									<div class="form-group">
										<label for="unit"> Unit </label>
										<select class="form-control unit_id" name="unit_id">
											<option value="" selected=""> Select unit </option>
					                        <?php
				                        	while ($row_edit = mysqli_fetch_array($resultoption_edit_unit)){
				                        		echo '<option value="'.$row_edit["unit_id"].'">'.$row_edit["unit_name"].'</option>';
				                        	}
					                        ?>
										</select>
									</div> -->

									<div class="form-group">
										<label for="desination"> Designation </label>
										<select class="form-control" name="designation_id">
											<option value="" selected> Select Desination </option>
											<?php 
						                  		$i = 1;
						                  		$sql = "SELECT * FROM designation ORDER BY designation_id DESC";
												if ($result=mysqli_query($conn,$sql))
												  {
												  // Fetch one and one row
												while ($row=mysqli_fetch_assoc($result)){
											?>
											<option value="<?php echo $row['designation_id'] ?>"> <?php echo $row['designation_name'] ?></option>
											<?php } } ?>
										</select>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="desination"> Access Permission </label>
										<select class="form-control" name="access_level_id" >
											<option value="" selected> Select Access Permission </option>
											<?php 
						                  		$i = 1;
						                  		$sql = "SELECT * FROM access_level ORDER BY access_id DESC";
												if ($result=mysqli_query($conn,$sql))
												  {
												  // Fetch one and one row
												while ($row=mysqli_fetch_assoc($result)){
											?>
											<option value="<?php echo $row['access_id'] ?>"> <?php echo $row['access_name'] ?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="status"> Select Status </label>
										<select class="form-control" name="status">
											<option value="" selected> Select Status </option>
											<option value="1"> Active </option>
											<option value="0"> Inactive </option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									
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
	<script type="text/javascript">
		$(document).ready(function(){

		    $("#division_id").change(function(event){
		      event.preventDefault();
		      var division_id = $(this).val();
		      var data = "division_id="+division_id;
			    $.ajax({
			        url: 'data/unit.php',
			        method: "POST",
			        data: data,
			        success: function(data){
			          // console.log(data);
			          $(".department_id").empty();
			          $(".department_id").append(data);
			        }
			    });
		    });

		    $("#department_id").change(function(event){
		      event.preventDefault();
		      var department_id = $(this).val();
		      var data = "department_id="+department_id;
		       $.ajax({
		        url: 'data/unit.php',
		        method: "POST",
		        data: data,
		        success: function(data){
		          // console.log(data);
		          $(".unit_id").empty();
		          $(".unit_id").append(data);
		        }
		       });
		    });
		});
	</script>
</div>
</div>
<?php echo include 'include/footer.php' ?>