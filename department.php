<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  <!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">Department Info</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		              <li class="breadcrumb-item active">Department Info</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> New Department Info Added Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Department Info Updated Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Department Info Deleted Successfully.
					</div>
		     <?php } ?>
  			<section class="content-header">
      			<div class="container-fluid">
      				<div class="row">
      					<div class="col-md-12">
				            <div class="card">
				              <div class="card-header">
				                <h3 class="card-title">
				                	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollable">
									 <i class="fas fa-plus"></i>  Create New
									</button>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <tr>
                <th> SN# </th>
                <th> Department Name </th>
                            
                <th> Status </th>
                <th>Action</th>
              </tr>
              	<?php
              		$i = 1;
              		$sql = "SELECT department.* FROM department ORDER BY department_id DESC";
					if ($result=mysqli_query($conn,$sql))
					  {
					  // Fetch one and one row
					  while ($row=mysqli_fetch_assoc($result))
					    {
					      if ($row["department_status"] == 1) {
                            $department_status = "<label class='badge badge-success'>Active</label>";
                          }else{
                            $department_status = "<label class='badge badge-warning'>Inactive</label>";
                          }
					    ?>
					      <tr>
                        	<td><?php echo $i++ ?></td>                         
                        	<td><?php echo $row["department_name"] ?></td>
                        	
                        	
                        	<td><?php echo $department_status; ?></td>
						    <td>
						    	<a href="#"  data-toggle="modal" data-target="#Department_edit_modal_<?php echo $row["department_id"] ?>"><i class="fas fa-edit"></i></a>
						    	<a href="#"  class="text-info" data-toggle="modal" data-target="#Department_view_modal_<?php echo $row["department_id"] ?>"><i class="fas fa-eye"></i></a>
						    	<?php 
								if ($_SESSION['access_permission'] == 'Super Admin') {?>
									<a href="#" class="text-danger" data-toggle="modal" data-target="#Department_delete_modal_<?php echo $row["department_id"] ?>"><i class="fas fa-trash"></i></a>
								<?php
								 }
								 else
								 {
								 	printf("");
								 }

								?>
						    	
						    </td>
					    </tr>
    <!-- company Type edit moldal -->
    <div class="modal fade" id="Department_edit_modal_<?php echo $row["department_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"> Edit Department Info</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	        <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="data/department.php?update" method="post">
                <div class="card-body">
                  <div class="form-group">

                  	<input type="hidden" name="department_id" value="<?php echo $row["department_id"] ?>">

                    <label for="department_name">Department Name</label>
   					<input type="text" class="form-control" name="department_name" value="<?php echo $row["department_name"] ?>" required>
                  </div>

<?php
              		
           $sql_edit = "SELECT * FROM division ORDER BY division_id DESC";
           $resultoption_edit = mysqli_query($conn,$sql_edit);

		  
?>
        <div class="form-group">
        <label for="division_id">Division Name</label>
		<select class="form-control" name="division_id">
			<option value="<?php echo $row['division_id']; ?>"><?php echo $row['division_name']; ?></option>
<?php
	while ($row_edit = mysqli_fetch_array($resultoption_edit)){

		echo '<option value="'.$row_edit["division_id"].'">'.$row_edit["division_name"].'</option>';
	}
?>
        	</select>
        </div>


           <div class="form-group">
                    <label for="department_status"> Status </label>
                    <select class="form-control" name="department_status">
                        <option value="1"> Active </option>
                        <option value="0"> Inactive </option>
                    </select>
           </div>

        </div>
        <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
	        <button type="submit" class="btn btn-primary"> Save </button>
	    </div>
										                <!-- /.card-body -->
              </form>
            </div>
	      </div>
	    </div>
	  </div>
	</div>
    <!-- company Type view moldal -->
    <div class="modal fade" id="Department_view_modal_<?php echo $row["department_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"> View Department Info</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="data/department.php" method="post">
                <div class="card-body">

                  <div class="form-group">
                    <label for="department_name">Department Name : </label>
                    <h4><?php echo $row["department_name"] ?></h4>
                  </div>
            

        

         <div class="form-group">
               <?php
               		if ($row["department_status"] == 1) {?>
               			<button class="btn btn-success"> Active </button>
               		<?php }else{?>
               			<button class="btn btn-danger"> Inactive </button>
               <?php } ?>
         </div>

        </div>
        <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal"> close </button>
	    </div>
        <!-- /.card-body -->
      </form>
    </div>
  </div>
</div>
</div>
</div>
<!-- company Type edit moldal -->
<div class="modal fade" id="Department_delete_modal_<?php echo $row["department_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
<div class="modal-content">
  <div class="modal-body">
      <!-- form start -->
      <form role="form" action="data/department.php?delete" method="post" style="display: none;">
       	<input type="hidden" name="department_id" value="<?php echo $row["department_id"] ?>">
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
<?php	}
	}?>

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
			<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Department Info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>




<div class="modal-body">
	<div class="card card-primary">
		              <!-- form start -->
<form role="form" action="data/department.php?store" method="post">
    <div class="card-body">
		<?php
              		
           $sql = "SELECT * FROM division ORDER BY division_id DESC";
           $resultoption = mysqli_query($conn,$sql);
		  
			?>
        
        <div class="form-group">
            <label for="division_id"> Division Name </label>
        	<select class="form-control" name="division_id">
				<?php
					while ($row = mysqli_fetch_array($resultoption)){

						echo '<option value="'.$row["division_id"].'">'.$row["division_name"].'</option>';
					}
				?>
        	</select>
        </div>
         <div class="form-group">
            <label for="department_name">Department Name</label>		                    
            <input type="text" class="form-control" name="department_name"  placeholder="Enter Item Name" required>
        </div>

        <div class="form-group">
            <label for="department_status"> Status </label>
        	<select class="form-control" name="department_status">
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

  		</div>
<?php echo include 'include/footer.php' ?>