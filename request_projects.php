<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  <!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">All Requested Projects</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		              <li class="breadcrumb-item active">Requested Items</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> New Request Item Added Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Request Items Updated Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Request Items Deleted Successfully.
					</div>
		     <?php } ?>
		     <?php 
		    	if ( isset($_GET['action']) && isset($_GET['message']) ){?>
				    <div class="alert alert-<?php echo $_GET['action']; ?>">
					  <strong style="text-transform: capitalize;"><?php echo $_GET['action']; ?>!</strong> <?php echo $_GET['message']; ?>.
					</div>
		     <?php } ?>
  			<section class="content-header">
      			<div class="container-fluid">
      				<div class="row">
      					<div class="col-md-12">
				            <div class="card">
				              	<div class="card-header">
				                	<h3 class="card-title">
				                	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewItems">
									 <i class="fas fa-plus"></i>  Add New
									</button>
						            </h3>
						     	</div>
						     	<br>
          <!-- /.card-header -->
          <div class="card-body p-2">
          	<?php if($_SESSION['access_permission'] == "Users" || $_SESSION['access_permission'] == "Department Head" || $_SESSION['access_permission'] == "Division Head" || $_SESSION['access_permission'] == "Checker"){?>
            <table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Project Name </th>
		                <th> Project Details </th>
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$employee_id = $_SESSION['employee_id'];
	              		$sql = "SELECT * FROM projects WHERE employee_id='$employee_id' ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["name"] ?></td>
	                          	<td><?php echo $row["details"] ?></td>	
	                          	<td>
	                          	<?php
	                          		if ($row["status"] == 0) {?>
	                          			<button class="btn btn-warning btn-sm"> Not Stored Yet </button>
	                          	<?php }?>
	                          	<?php
	                          		if ($row["status"] == 1) {?>
	                          			<button class="btn btn-success btn-sm">This item has been added & ready to submit requistion. </button>
	                          	<?php }?>
	                          	</td>
							    <td>
							    	<?php
	                          		if ($row["status"] == 0) {?>
							    	<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemEditModal<?php echo $row["id"] ?>"> Edit </a>
							    	<?php }?>
							    	<?php
	                          		if ($row["status"] == 1) {?>
	                          			<button class="btn btn-success btn-sm"> Store Completed </button>
	                          		<?php }?>
							    </td>
						    </tr>
						    <!-- Item delete data  -->
						<div class="modal fade" id="itemEditModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-scrollable" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Project Name</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
					              <!-- form start -->
					              <form role="form" action="data/projects.php?update" method="post" enctype="multipart/form-data">
					                <div class="card-body">
					                  <div class="form-group">
					                    <label for="name"> Project Name </label>
					                    <input type="hidden" class="form-control" name="id"  value="<?php echo $row["id"] ?>">
					                    <input type="text" class="form-control" name="name"  value="<?php echo $row["name"] ?>" required>
					                  </div>
					                  <div class="form-group">
					                    <label for="name"> Project Details </label>
					                    <input type="text" class="form-control" name="rmks"  value="<?php echo $row["details"] ?>" required>
					                  </div>
					                </div>
					                <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
								        <button type="submit" class="btn btn-success"> Update </button>
								    </div>
					                <!-- /.card-body -->
					              </form>
						      </div>
						    </div>
						  </div>
						</div>
					<?php	}
						}?>
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>
			<?php } ?>


          	<?php if($_SESSION['access_permission'] == "Division Head"){?>
          	<table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Project Name </th>
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$division_id = $_SESSION['division_id'];
	              		$sql = "SELECT * FROM projects WHERE division_id='$division_id' ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["name"] ?></td>
	                          	<td>
	                          	<?php
	                          		if ($row["status"] == 0) {?>
	                          			<button class="btn btn-warning btn-sm"> Not Stored Yet </button>
	                          	<?php }?>
	                          	<?php
	                          		if ($row["status"] == 1) {?>
	                          			<button class="btn btn-success btn-sm">This item has been added & ready to submit requistion. </button>
	                          	<?php }?>
	                          	</td>
							    <td>
							    	<?php
	                          		if ($row["status"] == 0) {?>
							    	<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemEditModal<?php echo $row["id"] ?>"> Edit </a>
							    	<?php }?>
							    	<?php
	                          		if ($row["status"] == 1) {?>
	                          			<!-- <button class="btn btn-success btn-sm"> Stored </button> -->
	                          			<button class="btn btn-success btn-sm"> Add New </button>
	                          		<?php }?>
							    </td>
						    </tr>
						    <!-- Item delete data  -->
						<div class="modal fade" id="itemEditModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-scrollable" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Project Name</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
					              <!-- form start -->
					              <form role="form" action="data/projects.php?update" method="post">
					                <div class="card-body">
					                  <div class="form-group">
					                    <label for="name"> Project Name </label>
					                    <input type="hidden" class="form-control" name="id"  value="<?php echo $row["id"] ?>">
					                    <input type="text" class="form-control" name="name"  value="<?php echo $row["name"] ?>" required>
					                  </div>
					                </div>
					                <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
								        <button type="submit" class="btn btn-success"> Update </button>
								    </div>
					                <!-- /.card-body -->
					              </form>
						      </div>
						    </div>
						  </div>
						</div>
					<?php	}
						}?>
				</tbody>
			</table>
			<?php } ?>

			<!-- ..............................store admin....................................... -->

          	<?php if($_SESSION['access_permission'] === "Store Admin" || $_SESSION['access_permission'] === "log admin"){?>
            <table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Project Name </th>
		                <th> Initiator Name </th>
		                <th> Division </th>
		                <th> Department </th>
		                <th> Employee ID </th>		              
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$sql = "SELECT * FROM projects ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["name"] ?></td>
	                          	<td><?php echo $row["employee_name"] ?></td>
	                          	<td><?php echo $row["division_name"] ?></td>
	                          	<td><?php echo $row["department_name"] ?></td>
	                          	<td><?php echo $row["employee_id"] ?></td><td>
	                          		<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-warning btn-sm">Not Stored Yet</button>
		                          	<?php }?>
							    	<?php
		                          		if ($row["status"] == 1) {?>
		                          			<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editProjectModal<?php echo $row["id"] ?>"> Edit </button>
	                          				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addmoreProjectModal<?php echo $row["id"] ?>"> Add New </button>
		                          	<?php }?>
	                          	</td>
							    <td>
							    	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#itemDeldfdeteModal<?php echo $row["id"] ?>">Delete</a>
							    	<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewProjectModal<?php echo $row["id"] ?>">View</a>
							    	<!-- <?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemStoredModal<?php echo $row["id"] ?>">Add Store</button>
		                          	<?php }?> -->
							    	
							    </td>

							    <div class="modal fade" id="itemDeldfdeteModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-scrollable" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalScrollableTitle"> <b class="text-danger">Are you sure want to delete this project???</b></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
						              <!-- form start -->
						              <form role="form" action="data/projects.php?delete" method="post">
						                <div class="card-body">
						                	<input type="hidden" class="form-control" name="id"  value="<?php echo $row["id"] ?>">
						                <button type="button" class="btn btn-success" data-dismiss="modal"> No </button>
									    <button type="submit" class="btn btn-danger"> Yes!! Delete </button>
						                </div>
						                <!-- /.card-body -->
						              </form>
							      </div>
							    </div>
							  </div>
							</div>

						    </tr>
						    <!-- project view data  -->

		<div class="modal fade" id="viewProjectModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">	
			        <h5 class="modal-title" id="exampleModalScrollableTitle">View Project Details</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				
			<form role="form" action="data/projects.php?update" method="post">
			<div class="card-body">
		        <div class="form-group">
		        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
		            <label for="name">Project Name:  <?php echo $row["name"] ?></label>
		        </div>      

		        <div class="form-group">
		            <label for="item_details">Project Details: <?php echo $row["details"] ?></label>
		        </div>

		        <div class="form-group">
		        	<?php 
		        		$sl = 0;
			        	$p_id = $row["id"];
			        	$sql1 = "SELECT * FROM projects_details WHERE project_id = $p_id ";
			        	$result1 = mysqli_query($conn, $sql1); ?>			        		
			        	<div class="row row-no-gutters border pt-2 pb-2 bg-info text-white mb-2">	
			        		<div class="col-sm-2">#</div>        					
	    					<div class="col-sm-5 border-left">Work Order No</div>
	    					<div class="col-sm-5 border-left">Work Order Details</div>
			        	</div>
			      
			        			
        				<?php while ($prjdetl=mysqli_fetch_assoc($result1)){?>
        				<div class="row row-no-gutters border">
        					<div class="col-sm-2"><?php echo ++$sl; ?></div>
        					<div class="col-sm-5"><?php echo $prjdetl['work_order_no']; ?></div>
        					<div class="col-sm-5"><?php echo $prjdetl['work_order_details']; ?></div>
        				</div>
        				<?php } ?>
			        			
			        		
		        </div>
    		</div>
		                <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
					        <button type="submit" class="btn btn-success"> Save </button>
					    </div>
		               
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>
						    <!-- project add more data modal -->

		<div class="modal fade" id="addmoreProjectModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">	
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Project Details</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				
			<form role="form" action="data/projects.php?addRow=success" method="post">
			<div class="card-body">
		        <div class="form-group">
		        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
		            <h5>Project Name: <?php echo $row["name"] ?></h5>
		        </div>      

		        <div class="form-group">
		            <h5>Project Details: <?php echo $row["details"] ?></h5>
		        </div>

		        <div class="form-group">
		        	<?php 
		        		$sl = 0;
			        	$p_id = $row["id"];
			        	$sql1 = "SELECT * FROM projects_details WHERE project_id = $p_id ";
			        	$result1 = mysqli_query($conn, $sql1); ?>			        		
			        	<div class="row row-no-gutters border pt-2 pb-2 bg-info text-white mb-2">	
			        		<div class="col-sm-2">#</div>        					
	    					<div class="col-sm-5 border-left">Work Order No</div>
	    					<div class="col-sm-5 border-left">Work Order Details</div>
			        	</div>
			      
			        			
        				<?php while ($prjdetl=mysqli_fetch_assoc($result1)){?>
        				<div class="row row-no-gutters border">
        					<div class="col-sm-2"><?php echo ++$sl; ?></div>
        					<div class="col-sm-5"><?php echo $prjdetl['work_order_no']; ?></div>
        					<div class="col-sm-5"><?php echo $prjdetl['work_order_details']; ?></div>
        				</div>
        				<?php } ?>
			        	<br>
			        	<div class="form-group">
		                  	<button type="button" class="form-control btn btn-success wo-add">Add New Workorder</button>
		                </div>
		                <div class="row row-no-gutters border pt-2 pb-2 bg-info text-white mb-2">	
			        		<div class="col-sm-2">#</div>        					
	    					<div class="col-sm-5 border-left">Work Order No</div>
	    					<div class="col-sm-5 border-left">Work Order Details</div>
			        	</div>
		                <!-- <div class="workorder"></div> -->
		                 <div class="row row-no-gutters border">
				            <!-- <div class="col-sm-2">
				                <button type="button" class="btn btn-sm btn-danger order-remove">-</button>
				            </div> -->
				            <div class="col-sm-5">
				                <input type="text" id="work_order_no" name="work_order" placeholder="Work Ordervgv" class="form-control" required/>
				            </div>
				            <div class="col-sm-5">
				            	<textarea rows="2" class="form-control " autocomplete="off" name="work_order_details" placeholder="Workorder Detailsfgf" required></textarea>
				            </div>
				        </div>
		        </div>
    		</div>
		                <div class="modal-footer">
		                	<div style="margin-right: 190px;">
						        <button style="width: 150px; height: 50px;" type="submit" class="btn btn-success"> Update </button>
						        <button style="width: 150px; height: 50px;" type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
					    	</div>
					    </div>
		               
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>
						    <!-- project edit data modal -->

		<div class="modal fade" id="editProjectModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">	
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Project Details</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				
			<form role="form" action="data/projects.php?update=success" method="post">
			<div class="card-body">
		        <div class="form-group">
		        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
		            <h5>Project Name: <input type="text" class="form-control" name="name" value="<?php echo $row["name"] ?>"></h5>
		        </div>      

		        <div class="form-group">
		            <h5>Project Details: <textarea type="text" class="form-control" name="p_details"><?php echo $row["details"] ?></textarea></h5>
		        </div>

		        <div class="form-group">
		        	<?php 
		        		$sl = 0;
			        	$p_id = $row["id"];
			        	$sql1 = "SELECT * FROM projects_details WHERE project_id = $p_id ";
			        	$result1 = mysqli_query($conn, $sql1); ?>			        		
			        	<div class="row row-no-gutters border pt-2 pb-2 bg-info text-white mb-2">	
			        		<div class="col-sm-2">#</div>        					
	    					<div class="col-sm-5 border-left">Work Order No</div>
	    					<div class="col-sm-5 border-left">Work Order Details</div>
			        	</div>
			      
			        			
        				<?php 
        					$j=0;
	        				while ($prjdetl=mysqli_fetch_assoc($result1)){?>
	        				<div class="row row-no-gutters border">
	        					<div class="col-sm-2"><?php echo ++$sl; ?></div>
	        					<input type="hidden" class="form-control" name="pID[]" value="<?php echo $row['id']; ?>">
	        					<input type="hidden" class="form-control" name="p_detl_ID[]" value="<?php echo $prjdetl['projects_details_id']; ?>">
	        					<div class="col-sm-5"><input type="text" class="form-control" name="work_order_no[]" value="<?php echo $prjdetl['work_order_no']; ?>"> </div>
	        					<div class="col-sm-5"><input type="text" class="form-control" name="work_order_details[]" value="<?php echo $prjdetl['work_order_details']; ?>"> </div>
	        				</div>
        				<?php $j++; } ?>
		        </div>
    		</div>
		                <div class="modal-footer">
		                	<div style="margin-right: 190px;">
						        <button style="width: 150px; height: 50px;" type="submit" class="btn btn-success"> Update </button>
						        <button style="width: 150px; height: 50px;" type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
					    	</div>
					    </div>
		               
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>

	<!-- <div class="modal fade" id="itemStoredModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">	
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Projects</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">

			<form role="form" action="data/projects.php?store_final" method="post">
			<div class="card-body">

        <div class="form-group">
        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
            <label for="name">Project Name</label>		                    
            <input type="text" class="form-control" name="name" value="<?php echo $row["name"] ?>" required>
        </div>      

        <div class="form-group">
            <label for="item_details">Project Details</label>
        <textarea class="form-control" name="item_details" placeholder="Enter Project type Details" required></textarea>
        </div>

        <div class="form-group">
            <label for="status"> Status </label>
        	<select class="form-control" name="status">
        		<option value="1"> Active </option>
        		<option value="0"> Inactive </option>
        	</select>
        </div>
    </div>
		                <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
					        <button type="submit" class="btn btn-success"> Save </button>
					    </div>
		               
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div> -->
						   
							
					<?php	}
						}?>
				</tbody>
			</table>
			<?php } ?>


						<!-- ..............................log admin....................................... -->
			</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
</div>
</section>
      		<!-- compnay create modal -->
      		<!-- Modal -->
			<div class="modal fade" id="addNewItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle"> Add New Item</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="card card-primary">
		              <!-- form start -->
		              <!-- <form role="form" action="data/projects.php?store=success" method="post" enctype="multipart/form-data"> -->
		              <form role="form" action="data/projects.php?store_final=success" method="post" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                    <label for="name"> Project Name </label>
		                    <input type="hidden" class="form-control" name="division_id"  value="<?php echo $_SESSION['division_id']; ?>" required>
		                    <input type="hidden" class="form-control" name="division_name"  value="<?php echo $_SESSION['division_name']; ?>" required>
		                    <input type="hidden" class="form-control" name="department_name"  value="<?php echo $_SESSION['department_name']; ?>" required>
		                    <input type="hidden" class="form-control" name="employee_name"  value="<?php echo $_SESSION['employee_name']; ?>" required>
		                    <input type="hidden" class="form-control" name="employee_id"  value="<?php echo $_SESSION['employee_id']; ?>" required>
							<input type="text" class="form-control" id="auto_select280" autocomplete="off" name="name"  placeholder="Enter Name" />

		                  </div>
		                  <div class="form-group">
		                  	<button type="button" class="btn btn-success item-add">+ Add Item</button>
		                  </div>
		                  <div class="form-group">    
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Work Order</td>
                                        <td style=" margin-right:200px;">Details</td>
                                    </tr>
                                </thead>
                                <tbody class="items"></tbody>
                            </table>
		                  </div>
		                  <div class="form-group">		                  	
							<label for="rmks"> Project Details </label>
		                    <textarea rows="4" class="form-control " autocomplete="off" name="rmks" placeholder="Additional Remarks" required></textarea>
		                  </div>
		                </div>
		                <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
					        <input type="submit" class="btn btn-success" name="store" value="Save">
					    </div>
		                <!-- /.card-body -->
		              </form>
		            </div>
			      </div>
			    </div>
			  </div>
			</div>
  		</div>
  	<script type="text/javascript">
        $(document).ready(function(){
			$("#auto_select280").keyup(function(){
				$.ajax({
				type: "POST",
				url: "data/load_project_name.php",
				data:'keyword='+$(this).val(),
				beforeSend: function(){
					$("#auto_select280").css("background","#FFF url(images/loading.gif) no-repeat 165px");
				},
				success: function(data){
					$("#suggesstion-box").show();
					$("#suggesstion-box").html(data);
					$("#auto_select280").css("background","#FFF");
				}
				});
			});
		});
    </script>
<?php echo include 'include/footer.php' ?>



 <script>
	$(document).ready(function() {
	    row_item();
	    row_wo();
	    var i = 0;
	    var j = 0;
	    function row_item(){
	        var _html = `
	        <tr class="">
	            <td>
	                <button type="button" class="btn btn-sm btn-danger item-remove">-</button>
	            </td>
	            <td>
	                <input type="text" id="work_order_no" name="work_order_no[]" placeholder="Work Order" class="form-control" required/>
	            </td>
	            <td>
	            	<textarea rows="2" class="form-control " autocomplete="off" name="work_order_details[]" placeholder="Workorder Details" required></textarea>
	            </td>
	        </tr>
	        <script>
	            $( '.select2' ).select2();
	        <\/script>
	        `;
	        $('.items').append(_html);
	        i++;
	    }

	    $('.item-add').click(function() {
	        row_item();
	    });

	    $(document).on('click', '.item-remove', function() {
	        $(this).parent().parent().remove();
	    });

	    function row_wo(){
	        var _htmlwo = `
	        <div class="row row-no-gutters border">
	            <div class="col-sm-2">
	                <button type="button" class="btn btn-sm btn-danger order-remove">-</button>
	            </div>
	            <div class="col-sm-5">
	                <input type="text" id="work_order_no" name="work_order[]" placeholder="Work Ordervgv" class="form-control" required/>
	            </div>
	            <div class="col-sm-5">
	            	<textarea rows="2" class="form-control " autocomplete="off" name="work_order_details[]" placeholder="Workorder Detailsfgf" required></textarea>
	            </div>
	        </div>
	        <script>
	            $( '.select2' ).select2();
	        <\/script>
	        `;
	        $('.workorder').append(_htmlwo);
	        j++;
	    }

	    

	    //more work order

	    $('.wo-add').click(function() {
	        row_wo();
	    });

	    $(document).on('click', '.order-remove', function() {
	        $(this).parent().parent().remove();
	    });

	});
	</script>