<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  <!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">All Requested Items</h1>
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
		                <th> Item Name </th>
		                <th> Remarks </th>
		                <th> Attached File</th>
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$employee_id = $_SESSION['employee_id'];
	              		$sql = "SELECT * FROM request_items WHERE employee_id='$employee_id' ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["item_name"] ?></td>
	                          	<td><?php echo $row["rmks"] ?></td>	                          	
	                          	<td><img src="images/<?php echo $row["file_name"] ?>" alt="File" width="70"></td>
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
						        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Item Name</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
					              <!-- form start -->
					              <form role="form" action="data/request_items.php?update" method="post" enctype="multipart/form-data">
					                <div class="card-body">
					                  <div class="form-group">
					                    <label for="item_name"> Item Name </label>
					                    <input type="hidden" class="form-control" name="id"  value="<?php echo $row["id"] ?>">
					                    <input type="text" class="form-control" name="item_name"  value="<?php echo $row["item_name"] ?>" required>
					                  </div>
					                  <div class="form-group">
					                    <label for="item_name"> Remarks </label>
					                    <input type="text" class="form-control" name="rmks"  value="<?php echo $row["rmks"] ?>" required>
					                  </div>
					                  <div class="form-group">
					                    <label for="file_name"> Change file </label>
					                    <input type="file" class="btn btn-primary" name="file_name">
					                    <input type="hidden" class="btn btn-primary" name="file_name_pre"  value="<?php echo $row["file_name"] ?>">
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
		                <th> Item Name </th>
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$division_id = $_SESSION['division_id'];
	              		$sql = "SELECT * FROM request_items WHERE division_id='$division_id' ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["item_name"] ?></td>
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
	                          			<button class="btn btn-success btn-sm"> Stored </button>
	                          		<?php }?>
							    </td>
						    </tr>
						    <!-- Item delete data  -->
						<div class="modal fade" id="itemEditModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-scrollable" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Item Name</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
					              <!-- form start -->
					              <form role="form" action="data/request_items.php?update" method="post">
					                <div class="card-body">
					                  <div class="form-group">
					                    <label for="item_name"> Item Name </label>
					                    <input type="hidden" class="form-control" name="id"  value="<?php echo $row["id"] ?>">
					                    <input type="text" class="form-control" name="item_name"  value="<?php echo $row["item_name"] ?>" required>
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

          	<?php if($_SESSION['access_permission'] == "Store Admin" ){?>
            <table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Item Name </th>
		                <th> Initiator Name </th>
		                <th> Division </th>
		                <th> Department </th>
		                <th> Employee ID </th>	
		                <th> Attached File </th>	              
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$sql = "SELECT * FROM request_items ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["item_name"] ?></td>
	                          	<td><?php echo $row["employee_name"] ?></td>
	                          	<td><?php echo $row["division_name"] ?></td>
	                          	<td><?php echo $row["department_name"] ?></td>
	                          	<td><?php echo $row["employee_id"] ?></td>
	                          	
	                          		<?php 
	                          			if ($row["file_name"] != '') {?>
	                          				<td>
	                          			<a href="images/<?php echo $row["file_name"] ?>" download> <img src="images/<?php echo $row["file_name"] ?>" alt="File" width="70"></a>
	                          		</td>
	                          			<?php }
	                          			else
	                          			{?>
	                          				<td></td>
	                          			<?php }
	                          		?>
	                          		
	                          	
	                          	<td>
	                          		<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-warning btn-sm">Not Stored Yet</button>
		                          	<?php }?>
							    	<?php
		                          		if ($row["status"] == 1) {?>
		                          			<button class="btn btn-success btn-sm">Stored</button>
		                          	<?php }?>
	                          	</td>
							    <td>
							    	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#itemDeldfdeteModal<?php echo $row["id"] ?>">Delete</a>
							    	<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemStoredModal<?php echo $row["id"] ?>">Add Store</button>
		                          	<?php }?>
							    	
							    </td>

							    <div class="modal fade" id="itemDeldfdeteModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-scrollable" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalScrollableTitle"> <b class="text-danger">Are you sure want to delete this item???</b></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
						              <!-- form start -->
						              <form role="form" action="data/request_items.php?delete" method="post">
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
						    <!-- Item delete data  -->
								<div class="modal fade" id="itemStoredModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">	
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Item Info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				              <!-- form start -->
			<form role="form" action="data/request_items.php?store_final" method="post">
			<div class="card-body">

        <div class="form-group">
        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
            <label for="item_name">Item Name</label>		                    
            <input type="text" class="form-control" name="item_name" value="<?php echo $row["item_name"] ?>" required>
        </div>

<?php
              		
           $sql = "SELECT * FROM item_category ORDER BY category_id DESC";
           $resultoption = mysqli_query($conn,$sql);

		   $sql1 = "SELECT * FROM item_type ORDER BY type_id DESC";
           $resultoption1 = mysqli_query($conn,$sql1);
?>

        
        <div class="form-group">
            <label for="category_id"> Item Category </label>
        	<select class="form-control" name="category_id">
<?php
	while ($row = mysqli_fetch_array($resultoption)){

		echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
	}
?>
        	</select>
        </div>

        <div class="form-group">
            <label for="type_id"> Item Type </label>
        	<select class="form-control" name="type_id">
<?php
	while ($row1 = mysqli_fetch_array($resultoption1)){

		echo '<option value="'.$row1["type_id"].'">'.$row1["type_name"].'</option>';
	}
?>
        	</select>
        </div>       

        <div class="form-group">
            <label for="item_details">Item Details</label>
        <textarea class="form-control" name="item_details" placeholder="Enter Item type Details"></textarea>
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
		                <!-- /.card-body -->
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>
						    <!-- Item delete data  -->
							
					<?php	}
						}?>
				</tbody>
			</table>
			<?php } ?>


						<!-- ..............................log admin....................................... -->

          	<?php if($_SESSION['access_permission'] == "log admin" ){?>
            <table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Item Name </th>
		                <th> Initiator Name </th>
		                <th> Division </th>
		                <th> Department </th>
		                <th> Employee ID </th>	
		                <th> Attached File </th>	              
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$sql = "SELECT * FROM request_items ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["item_name"] ?></td>
	                          	<td><?php echo $row["employee_name"] ?></td>
	                          	<td><?php echo $row["division_name"] ?></td>
	                          	<td><?php echo $row["department_name"] ?></td>
	                          	<td><?php echo $row["employee_id"] ?></td>
	                          	
	                          		<?php 
	                          			if ($row["file_name"] != '') {?>
	                          				<td>
	                          			<a href="images/<?php echo $row["file_name"] ?>" download>  <img src="images/<?php echo $row["file_name"] ?>" alt="File" width="70"></a>
	                          		</td>
	                          			<?php }
	                          			else
	                          			{?>
	                          				<td></td>
	                          			<?php }
	                          		?>
	                          		
	                          	
	                          	<td>
	                          		<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-warning btn-sm">Not Stored Yet</button>
		                          	<?php }?>
							    	<?php
		                          		if ($row["status"] == 1) {?>
		                          			<button class="btn btn-success btn-sm">Stored</button>
		                          	<?php }?>
	                          	</td>
							    <td>
							    	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#itemDeldfdeteModal<?php echo $row["id"] ?>">Delete</a>
							    	<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemStoredModal<?php echo $row["id"] ?>">Add Store</button>
		                          	<?php }?>
							    	
							    </td>

							    <div class="modal fade" id="itemDeldfdeteModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-scrollable" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalScrollableTitle"> <b class="text-danger">Are you sure want to delete this item???</b></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
						              <!-- form start -->
						              <form role="form" action="data/request_items.php?delete" method="post">
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
						    <!-- Item delete data  -->
								<div class="modal fade" id="itemStoredModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Item Info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				              <!-- form start -->
			<form role="form" action="data/request_item.php?store_final" method="post">
			<div class="card-body">

        <div class="form-group">
        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
            <label for="item_name">Item Name</label>		                    
            <input type="text" class="form-control" name="item_name" value="<?php echo $row["item_name"] ?>" required>
        </div>

<?php
              		
           $sql = "SELECT * FROM item_category ORDER BY category_id DESC";
           $resultoption = mysqli_query($conn,$sql);

		   $sql1 = "SELECT * FROM item_type ORDER BY type_id DESC";
           $resultoption1 = mysqli_query($conn,$sql1);
?>

        
        <div class="form-group">
            <label for="category_id"> Item Category </label>
        	<select class="form-control" name="category_id">
<?php
	while ($row = mysqli_fetch_array($resultoption)){

		echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
	}
?>
        	</select>
        </div>

        <div class="form-group">
            <label for="type_id"> Item Type </label>
        	<select class="form-control" name="type_id">
<?php
	while ($row1 = mysqli_fetch_array($resultoption1)){

		echo '<option value="'.$row1["type_id"].'">'.$row1["type_name"].'</option>';
	}
?>
        	</select>
        </div>       

        <div class="form-group">
            <label for="item_details">Item Details</label>
        <textarea class="form-control" name="item_details" placeholder="Enter Item type Details"></textarea>
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
		                <!-- /.card-body -->
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>
						    <!-- Item delete data  -->
							
					<?php	}
						}?>
				</tbody>
			</table>
			<?php } ?>

						<!-- ..............................log-1....................................... -->

          	<?php if($_SESSION['access_permission'] == "log-1" ){?>
            <table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Item Name </th>
		                <th> Initiator Name </th>
		                <th> Division </th>
		                <th> Department </th>
		                <th> Employee ID </th>	
		                <th> Attached File </th>	              
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$sql = "SELECT * FROM request_items ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["item_name"] ?></td>
	                          	<td><?php echo $row["employee_name"] ?></td>
	                          	<td><?php echo $row["division_name"] ?></td>
	                          	<td><?php echo $row["department_name"] ?></td>
	                          	<td><?php echo $row["employee_id"] ?></td>
	                          	
	                          		<?php 
	                          			if ($row["file_name"] != '') {?>
	                          				<td>
	                          			<a href="images/<?php echo $row["file_name"] ?>" download>  <img src="images/<?php echo $row["file_name"] ?>" alt="File" width="70"></a>
	                          		</td>
	                          			<?php }
	                          			else
	                          			{?>
	                          				<td></td>
	                          			<?php }
	                          		?>
	                          		
	                          	
	                          	<td>
	                          		<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-warning btn-sm">Not Stored Yet</button>
		                          	<?php }?>
							    	<?php
		                          		if ($row["status"] == 1) {?>
		                          			<button class="btn btn-success btn-sm">Stored</button>
		                          	<?php }?>
	                          	</td>
							    <td>
							    	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#itemDeldfdeteModal<?php echo $row["id"] ?>">Delete</a>
							    	<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemStoredModal<?php echo $row["id"] ?>">Add Store</button>
		                          	<?php }?>
							    	
							    </td>

							    <div class="modal fade" id="itemDeldfdeteModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-scrollable" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalScrollableTitle"> <b class="text-danger">Are you sure want to delete this item???</b></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
						              <!-- form start -->
						              <form role="form" action="data/request_items.php?delete" method="post">
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
						    <!-- Item delete data  -->
								<div class="modal fade" id="itemStoredModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Item Info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				              <!-- form start -->
			<form role="form" action="data/request_item.php?store_final" method="post">
			<div class="card-body">

        <div class="form-group">
        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
            <label for="item_name">Item Name</label>		                    
            <input type="text" class="form-control" name="item_name" value="<?php echo $row["item_name"] ?>" required>
        </div>

<?php
              		
           $sql = "SELECT * FROM item_category ORDER BY category_id DESC";
           $resultoption = mysqli_query($conn,$sql);

		   $sql1 = "SELECT * FROM item_type ORDER BY type_id DESC";
           $resultoption1 = mysqli_query($conn,$sql1);
?>

        
        <div class="form-group">
            <label for="category_id"> Item Category </label>
        	<select class="form-control" name="category_id">
<?php
	while ($row = mysqli_fetch_array($resultoption)){

		echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
	}
?>
        	</select>
        </div>

        <div class="form-group">
            <label for="type_id"> Item Type </label>
        	<select class="form-control" name="type_id">
<?php
	while ($row1 = mysqli_fetch_array($resultoption1)){

		echo '<option value="'.$row1["type_id"].'">'.$row1["type_name"].'</option>';
	}
?>
        	</select>
        </div>       

        <div class="form-group">
            <label for="item_details">Item Details</label>
        <textarea class="form-control" name="item_details" placeholder="Enter Item type Details"></textarea>
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
		                <!-- /.card-body -->
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>
						    <!-- Item delete data  -->
							
					<?php	}
						}?>
				</tbody>
			</table>
			<?php } ?>

						<!-- ..............................log-2....................................... -->

          	<?php if($_SESSION['access_permission'] == "log-2" ){?>
            <table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Item Name </th>
		                <th> Initiator Name </th>
		                <th> Division </th>
		                <th> Department </th>
		                <th> Employee ID </th>	
		                <th> Attached File </th>	              
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$sql = "SELECT * FROM request_items ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["item_name"] ?></td>
	                          	<td><?php echo $row["employee_name"] ?></td>
	                          	<td><?php echo $row["division_name"] ?></td>
	                          	<td><?php echo $row["department_name"] ?></td>
	                          	<td><?php echo $row["employee_id"] ?></td>
	                          	
	                          		<?php 
	                          			if ($row["file_name"] != '') {?>
	                          				<td>
	                          			<a href="images/<?php echo $row["file_name"] ?>" download>  <img src="images/<?php echo $row["file_name"] ?>" alt="File" width="70"></a>
	                          		</td>
	                          			<?php }
	                          			else
	                          			{?>
	                          				<td></td>
	                          			<?php }
	                          		?>
	                          		
	                          	
	                          	<td>
	                          		<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-warning btn-sm">Not Stored Yet</button>
		                          	<?php }?>
							    	<?php
		                          		if ($row["status"] == 1) {?>
		                          			<button class="btn btn-success btn-sm">Stored</button>
		                          	<?php }?>
	                          	</td>
							    <td>
							    	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#itemDeldfdeteModal<?php echo $row["id"] ?>">Delete</a>
							    	<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemStoredModal<?php echo $row["id"] ?>">Add Store</button>
		                          	<?php }?>
							    	
							    </td>

							    <div class="modal fade" id="itemDeldfdeteModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-scrollable" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalScrollableTitle"> <b class="text-danger">Are you sure want to delete this item???</b></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
						              <!-- form start -->
						              <form role="form" action="data/request_items.php?delete" method="post">
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
						    <!-- Item delete data  -->
								<div class="modal fade" id="itemStoredModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Item Info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				              <!-- form start -->
			<form role="form" action="data/request_item.php?store_final" method="post">
			<div class="card-body">

        <div class="form-group">
        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
            <label for="item_name">Item Name</label>		                    
            <input type="text" class="form-control" name="item_name" value="<?php echo $row["item_name"] ?>" required>
        </div>

<?php
              		
           $sql = "SELECT * FROM item_category ORDER BY category_id DESC";
           $resultoption = mysqli_query($conn,$sql);

		   $sql1 = "SELECT * FROM item_type ORDER BY type_id DESC";
           $resultoption1 = mysqli_query($conn,$sql1);
?>

        
        <div class="form-group">
            <label for="category_id"> Item Category </label>
        	<select class="form-control" name="category_id">
<?php
	while ($row = mysqli_fetch_array($resultoption)){

		echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
	}
?>
        	</select>
        </div>

        <div class="form-group">
            <label for="type_id"> Item Type </label>
        	<select class="form-control" name="type_id">
<?php
	while ($row1 = mysqli_fetch_array($resultoption1)){

		echo '<option value="'.$row1["type_id"].'">'.$row1["type_name"].'</option>';
	}
?>
        	</select>
        </div>       

        <div class="form-group">
            <label for="item_details">Item Details</label>
        <textarea class="form-control" name="item_details" placeholder="Enter Item type Details"></textarea>
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
		                <!-- /.card-body -->
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>
						    <!-- Item delete data  -->
							
					<?php	}
						}?>
				</tbody>
			</table>
			<?php } ?>

						<!-- ..............................log-3....................................... -->

          	<?php if($_SESSION['access_permission'] == "log-3" ){?>
            <table class="table table-striped mydatatable table-bordered">
	            <thead>
	            	<tr>
		                <th> #SL </th>
		                <th> Item Name </th>
		                <th> Initiator Name </th>
		                <th> Division </th>
		                <th> Department </th>
		                <th> Employee ID </th>	
		                <th> Attached File </th>	              
		                <th> Status </th>
		                <th> Action</th>
		            </tr>
	            </thead>
            	<tbody>
	              	<?php
	              		$i = 1;
	              		$sql = "SELECT * FROM request_items ORDER BY id DESC";
						if ($result=mysqli_query($conn,$sql))
						  {
						  // Fetch one and one row
						  while ($row=mysqli_fetch_assoc($result))
						    {?>
						    <tr>
	                          	<td><?php echo $i++ ?></td>
	                          	<td><?php echo $row["item_name"] ?></td>
	                          	<td><?php echo $row["employee_name"] ?></td>
	                          	<td><?php echo $row["division_name"] ?></td>
	                          	<td><?php echo $row["department_name"] ?></td>
	                          	<td><?php echo $row["employee_id"] ?></td>
	                          	
	                          		<?php 	
	                          			if ($row["file_name"] != '') {?>
	                          				<td>
	                          			<a href="images/<?php echo $row["file_name"] ?>" download>  <img src="images/<?php echo $row["file_name"] ?>" alt="File" width="70"></a>
	                          		</td>
	                          			<?php }
	                          			else
	                          			{?>
	                          				<td></td>
	                          			<?php }
	                          		?>
	                          		
	                          	
	                          	<td>
	                          		<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-warning btn-sm">Not Stored Yet</button>
		                          	<?php }?>
							    	<?php
		                          		if ($row["status"] == 1) {?>
		                          			<button class="btn btn-success btn-sm">Stored</button>
		                          	<?php }?>
	                          	</td>
							    <td>
							    	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#itemDeldfdeteModal<?php echo $row["id"] ?>">Delete</a>
							    	<?php
		                          		if ($row["status"] == 0) {?>
		                          			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#itemStoredModal<?php echo $row["id"] ?>">Add Store</button>
		                          	<?php }?>
							    	
							    </td>

							    <div class="modal fade" id="itemDeldfdeteModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-scrollable" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalScrollableTitle"> <b class="text-danger">Are you sure want to delete this item???</b></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
						              <!-- form start -->
						              <form role="form" action="data/request_items.php?delete" method="post">
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
						    <!-- Item delete data  -->
								<div class="modal fade" id="itemStoredModal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Item Info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			<div class="modal-body">
			<div class="card card-primary">
				              <!-- form start -->
			<form role="form" action="data/request_item.php?store_final" method="post">
			<div class="card-body">

        <div class="form-group">
        	<input type="hidden" class="form-control" name="id" value="<?php echo $row["id"] ?>">
            <label for="item_name">Item Name</label>		                    
            <input type="text" class="form-control" name="item_name" value="<?php echo $row["item_name"] ?>" required>
        </div>

<?php
              		
           $sql = "SELECT * FROM item_category ORDER BY category_id DESC";
           $resultoption = mysqli_query($conn,$sql);

		   $sql1 = "SELECT * FROM item_type ORDER BY type_id DESC";
           $resultoption1 = mysqli_query($conn,$sql1);
?>

        
        <div class="form-group">
            <label for="category_id"> Item Category </label>
        	<select class="form-control" name="category_id">
<?php
	while ($row = mysqli_fetch_array($resultoption)){

		echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
	}
?>
        	</select>
        </div>

        <div class="form-group">
            <label for="type_id"> Item Type </label>
        	<select class="form-control" name="type_id">
<?php
	while ($row1 = mysqli_fetch_array($resultoption1)){

		echo '<option value="'.$row1["type_id"].'">'.$row1["type_name"].'</option>';
	}
?>
        	</select>
        </div>       

        <div class="form-group">
            <label for="item_details">Item Details</label>
        <textarea class="form-control" name="item_details" placeholder="Enter Item type Details"></textarea>
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
		                <!-- /.card-body -->
		              </form>
		            </div>
			      </div>

			    </div>
			  </div>
			</div>
						    <!-- Item delete data  -->
							
					<?php	}
						}?>
				</tbody>
			</table>
			<?php } ?>
						
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>
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
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
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
		              <form role="form" action="data/request_items.php?store=success" method="post" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                    <label for="item_name"> Item Name </label>
		                    <input type="hidden" class="form-control" name="division_id"  value="<?php echo $_SESSION['division_id']; ?>" required>
		                    <input type="hidden" class="form-control" name="division_name"  value="<?php echo $_SESSION['division_name']; ?>" required>
		                    <input type="hidden" class="form-control" name="department_name"  value="<?php echo $_SESSION['department_name']; ?>" required>
		                    <input type="hidden" class="form-control" name="employee_name"  value="<?php echo $_SESSION['employee_name']; ?>" required>
		                    <input type="hidden" class="form-control" name="employee_id"  value="<?php echo $_SESSION['employee_id']; ?>" required>
		                    <div class="frmSearch">
								<input type="text" class="form-control" id="auto_select280" autocomplete="off" name="item_name"  placeholder="Enter Name" />

								<div id="suggesstion-box" style="background-color: #f4f6f9;padding: 15px;"></div>
							</div>
							<label for="rmks"> Remarks </label>
							<textarea rows="4" class="form-control " autocomplete="off" name="rmks"  placeholder="Additional Remarks" required></textarea>
		                    <!-- <input type="text" class="form-control " autocomplete="off" name="rmks"  placeholder="Additional Remarks" required> -->

		                     <label for="file_name"> Attach file </label>
		                    <input type="file" class="form-control" name="file_name">
		                  

		                    <!-- <input type="text" name="item_name" id="auto_select280"/>
		                    <div id="suggesstion-box"></div> -->
		                    <!-- <input type="text" class="form-control" name="item_name"  placeholder="Enter name" required> -->
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
				url: "data/load_item_name.php",
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
		// To select country name
		// function selectCountry(val) {
		// $("#auto_select280").val(val);
		// $("#suggesstion-box").hide();
		// }
    </script>
<?php echo include 'include/footer.php' ?>