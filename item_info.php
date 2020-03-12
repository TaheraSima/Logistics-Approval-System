<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
	<?php echo include 'include/sidebar.php' ?>
	  <!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">Item Info</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		              <li class="breadcrumb-item active">Item Info</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> New Item Info Added Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Item Info Updated Successfully.
					</div>
		     <?php } ?>
		    <?php 
		    	if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
				    <div class="alert alert-success">
					  <strong>Success!</strong> Item Info Deleted Successfully.
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
          <div class="card-body p-3">
            <table class="table table-striped table-bordered mydatatable">
              <thead>
                 <tr>
                    <th> SN# </th>
                    <th> Item Name </th>
                    <th> Item Type </th>
                    <th> Item Category </th>
                    <th> Item Details </th>
                    <th> Status </th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $i = 1;
                  $sql = "SELECT item_info.item_id, item_info.item_name, item_info.category_id, item_info.type_id, item_info.status, item_info.item_details, item_category.category_name, item_type.type_name FROM item_info,item_category,item_type WHERE item_info.category_id=item_category.category_id AND item_info.type_id=item_type.type_id ORDER BY item_info.item_id DESC";
                if ($result=mysqli_query($conn,$sql))
                  {
                  // Fetch one and one row
                  while ($row=mysqli_fetch_assoc($result))
                    {
                      if ($row["status"] == 1) {
                                  $status = "<label class='badge badge-success'>Active</label>";
                                }else{
                                  $status = "<label class='badge badge-warning'>Inactive</label>";
                                }
                    ?>
                      <tr>
                                <td><?php echo $i++ ?></td>                         
                                <td><?php echo $row["item_name"] ?></td>
                                <td><?php echo $row["type_name"] ?></td>
                                <td><?php echo $row["category_name"] ?></td>                                
                                <td><?php echo $row["item_details"] ?></td>
                                <td><?php echo $status; ?></td>
                      <td>
                        <a href="#"  data-toggle="modal" data-target="#Item_info_edit_modal_<?php echo $row["item_id"] ?>"><i class="fas fa-edit"></i></a>
                        <a href="#"  class="text-info" data-toggle="modal" data-target="#Item_info_view_modal_<?php echo $row["item_id"] ?>"><i class="fas fa-eye"></i></a>
                        <?php 
                          if ($_SESSION['access_permission'] == 'Super Admin') {?>
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#Item_info_delete_modal_<?php echo $row["item_id"] ?>"><i class="fas fa-trash"></i></a>
                          <?php
                           }
                           else
                           {
                            printf("");
                           }

                          ?>                        
                      </td>
                    </tr>
              </tbody>
    <!-- company Type edit moldal -->
    <div class="modal fade" id="Item_info_edit_modal_<?php echo $row["item_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"> Edit Item Info</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	        <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="data/item_info.php?update" method="post">
                <div class="card-body">
                  <div class="form-group">

                  	<input type="hidden" name="item_id" value="<?php echo $row["item_id"] ?>">

                    <label for="item_name">Item Name</label>
   					<input type="text" class="form-control" name="item_name" value="<?php echo $row["item_name"] ?>" required>
                  </div>

<?php
              		
           $sql_edit = "SELECT * FROM item_category ORDER BY category_id DESC";
           $resultoption_edit = mysqli_query($conn,$sql_edit);

		   $sql1_edit = "SELECT * FROM item_type ORDER BY type_id DESC";
           $resultoption1_edit = mysqli_query($conn,$sql1_edit);
?>
        <div class="form-group">
        <label for="category_id">Item Category</label>
		<select class="form-control" name="category_id">
			<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
<?php
	while ($row_edit = mysqli_fetch_array($resultoption_edit)){

		echo '<option value="'.$row_edit["category_id"].'">'.$row_edit["category_name"].'</option>';
	}
?>
        	</select>
        </div>

        <div class="form-group">
            <label for="type_id"> Item Type </label>
        	<select class="form-control" name="type_id">
        		<option value="<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></option>
<?php
	while ($row1_edit = mysqli_fetch_array($resultoption1_edit)){

		echo '<option value="'.$row1_edit["type_id"].'">'.$row1_edit["type_name"].'</option>';
	}
?>
        	</select>    
    		
        </div>

          <div class="form-group">
            <label for="item_details">Item Details</label>
            <textarea class="form-control" name="item_details" required><?php echo $row["item_details"] ?></textarea>
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
    <!-- company Type view moldal -->
    <div class="modal fade" id="Item_info_view_modal_<?php echo $row["item_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"> View Item Info</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="data/item_info.php" method="post">
                <div class="card-body">

                  <div class="form-group">
                    <label for="item_name">Item Info Name : </label>
                    <h4><?php echo $row["item_name"] ?></h4>
                  </div>

                  <div class="form-group">
                    <label for="category_id">Item Category : </label>
                    <h4><?php echo $row["category_name"] ?></h4>
                  </div>

                  <div class="form-group">
                    <label for="type_id">Item Type : </label>
                    <h4><?php echo $row["type_name"] ?></h4>
                  </div>

         <div class="form-group">
            <label for="item_details">Item Details : </label>
           <p><?php echo $row["item_details"] ?></p>
         </div>

         <div class="form-group">
               <?php
               		if ($row["status"] == 1) {?>
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
<div class="modal fade" id="Item_info_delete_modal_<?php echo $row["item_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
<div class="modal-content">
  <div class="modal-body">
      <!-- form start -->
      <form role="form" action="data/item_info.php?delete" method="post" style="display: none;">
       	<input type="hidden" name="item_id" value="<?php echo $row["item_id"] ?>">
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
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Item Info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>




<div class="modal-body">
	<div class="card card-primary">
		              <!-- form start -->
<form role="form" action="data/item_info.php?store" method="post">
    <div class="card-body">

        <div class="form-group">
            <label for="item_name">Item Name</label>		                    
            <input type="text" class="form-control" name="item_name"  placeholder="Enter Item Name" required>
        </div>

        <!-- <div class="form-group">
            <label for="category_id">Item Category</label>		                    
            <input type="text" class="form-control" name="category_id"  placeholder="Enter Item Category" required>
        </div> -->

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

        <!-- <div class="form-group">
            <label for="type_id">Item Type</label>		                    
            <input type="text" class="form-control" name="type_id"  placeholder="Enter Item type" required>
        </div> -->

        <div class="form-group">
            <label for="item_details">Item Details</label>
        <textarea class="form-control" name="item_details" placeholder="Enter Item type Details" required></textarea>
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