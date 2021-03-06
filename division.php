<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  <!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">Division</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		              <li class="breadcrumb-item active">Division</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> New Division Added Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Division Updated Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Division Deleted Successfully.
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
                <th> Division ID </th>
                <th> Division Name </th>                
                <th> Status </th>
                <th>Action</th>
              </tr>
              	<?php
              		$i = 1;
              		$sql = "SELECT * FROM division ORDER BY division_id DESC";
					if ($result=mysqli_query($conn,$sql))
					  {
					  // Fetch one and one row
					  while ($row=mysqli_fetch_assoc($result))
					    {?>
					      <tr>
                          <td><?php echo $i++ ?></td>                         
                          <td><?php echo $row["division_name"] ?></td>                          
                          
                         <td>
                            <?php 
                              if ($row["division_status"] == 1) {
                                echo "Active";
                              }else{
                                echo "Inactive";
                              }
                            ?>
                            
                           </td>
	    <td>

	    	<a href="#"  data-toggle="modal" data-target="#division_edit_modal_<?php echo $row["division_id"] ?>"><i class="fas fa-edit"></i></a>
	    	<a href="#"  class="text-info" data-toggle="modal" data-target="#division_view_modal_<?php echo $row["division_id"] ?>"><i class="fas fa-eye"></i></a>
	    	<?php 
	    	if ($_SESSION['access_permission'] == 'Super Admin') {?>
	    		<a href="#" class="text-danger" data-toggle="modal" data-target="#division_delete_modal_<?php echo $row["division_id"] ?>"><i class="fas fa-trash"></i></a>
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
    <div class="modal fade" id="division_edit_modal_<?php echo $row["division_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"> Edit Division</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	        <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="data/division.php?update" method="post">
                <div class="card-body">
                  <div class="form-group">
                  	<input type="hidden" name="division_id" value="<?php echo $row["division_id"] ?>">
                    <label for="division_name">Division Name</label>
                    <input type="text" class="form-control" name="division_name" value="<?php echo $row["division_name"] ?>" required>
                  </div>
    

           <div class="form-group">
                    <label for="division_status"> Status </label>
                    <select class="form-control" name="division_status">
                        <option value="1"> Active </option>division_status
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
    <!-- company Type edit moldal -->
    <div class="modal fade" id="division_view_modal_<?php echo $row["division_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"> View Division</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="data/division.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="division_name">Division Name : </label>
                    <h4><?php echo $row["division_name"] ?></h4>
                  </div>
                
          <div class="form-group">
               <?php
               		if ($row["division_status"] == 1) {?>
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
<div class="modal fade" id="division_delete_modal_<?php echo $row["division_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
<div class="modal-content">
  <div class="modal-body">
      <!-- form start -->
      <form role="form" action="data/division.php?delete" method="post" style="display: none;">
       	<input type="hidden" name="division_id" value="<?php echo $row["division_id"] ?>">
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
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Division</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="card card-primary">
		              <!-- form start -->
		              <form role="form" action="data/division.php?store" method="post">
		                <div class="card-body">
		                  <div class="form-group">
		                    <label for="division_name">Division Name</label>
		                    <input type="text" class="form-control" name="division_name"  placeholder="Enter Division" required>
		                  </div>
		                
		                  <div class="form-group">
			                    <label for="division_status"> Status </label>
		                    	<select class="form-control" name="division_status">
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