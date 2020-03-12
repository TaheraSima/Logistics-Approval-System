<!-- <?php if (isset($_POST['username']) && isset($_POST['password'])) {?> -->
<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  <!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">Approval Hierarchy</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		              <li class="breadcrumb-item active">Approval Hierarchy</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> New Approval Hierarchy Added Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Approval Hierarchy Updated Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Approval Hierarchy Deleted Successfully.
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
                <th> SL#</th>
                <th> Approval Hierarchy Name </th>
                <th> Status </th>
                <th>Action</th>
              </tr>
              	<?php
              		$i = 1;
              		$sql = "SELECT * FROM approval_hierarchy ORDER BY approval_hierarchy_id DESC";
					if ($result=mysqli_query($conn,$sql))
					  {
					  // Fetch one and one row
					  while ($row=mysqli_fetch_assoc($result))
					    {?>
					      <tr>
                          <td><?php echo $i++ ?></td>                         
                          <td><?php echo $row["approval_hierarchy_name"] ?></td>
                         <td>
                            <?php 
                              if ($row["status"] == 1) {
                                echo "Active";
                              }else{
                                echo "Inactive";
                              }
                            ?>
                            
                           </td>
						    <td>
						    	<a href="#"  data-toggle="modal" data-target="#approval_hierarchy_edit_modal_<?php echo $row["approval_hierarchy_id"] ?>"><i class="fas fa-edit"></i></a>
						    	<a href="#" class="text-danger" data-toggle="modal" data-target="#approval_hierarchy_delete_modal_<?php echo $row["approval_hierarchy_id"] ?>"><i class="fas fa-trash"></i></a>
						    </td>
					    </tr>
    <!-- company Type edit moldal -->
    <div class="modal fade" id="approval_hierarchy_edit_modal_<?php echo $row["approval_hierarchy_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"> Edit Approval Hierarchy</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="data/approval_hierarchy.php?update" method="post">
	            <div class="card-body">
	                 <div class="form-group">
	                  	<input type="hidden" name="approval_hierarchy_id" value="<?php echo $row["approval_hierarchy_id"] ?>">
	                    <label for="category_name">Approval Hierarchy Name</label>
	                    <input type="text" class="form-control" name="approval_hierarchy_name" value="<?php echo $row["approval_hierarchy_name"] ?>" required>
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
  </div>
</div>
</div>
</div>
<!-- company Type edit moldal -->
<div class="modal fade" id="approval_hierarchy_delete_modal_<?php echo $row["approval_hierarchy_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
<div class="modal-content">
  <div class="modal-body">
      <!-- form start -->
      <form role="form" action="data/approval_hierarchy.php?delete" method="post" style="display: none;">
       	<input type="hidden" name="approval_hierarchy_id" value="<?php echo $row["approval_hierarchy_id"] ?>">
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
			        <h5 class="modal-title" id="exampleModalScrollableTitle"> Create New Approval Hierarchy </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="card card-primary">
		              <!-- form start -->
		              <form role="form" action="data/approval_hierarchy.php?store" method="post">
		                <div class="card-body">
		                  <div class="form-group">
		                    <label for="approval_hierarchy_name"> Approval Hierarchy Name </label>
		                    <input type="text" class="form-control" name="approval_hierarchy_name"  placeholder="Enter approval_hierarchy" required>
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
  		</div>
<?php echo include 'include/footer.php' ?>
<?php //} else
// {
//     echo 'Sorry please login first before visiting this page!';
//     header("Location:index.php?success=1");
//     exit();
// }
  ?>