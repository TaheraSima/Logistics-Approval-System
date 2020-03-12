<?php include 'data/config/conn.php' ?>
<?php include 'include/header.php' ?>
<?php include 'include/sidebar.php' ?>

  		<div class="content-wrapper">
			   <section class="content">
            <div><span class="btn btn-success"><a style="color: white;" href="create_access.php" data-toggle="modal" data-target="#myModal">Create</a></span></div>
            </br>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Access Level</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed lamia-table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Access Permission</th>
                    <th>Access Detail</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>

                    <?php
                    $i = 1;
                    $resultset = $conn->query("SELECT * FROM access_level ORDER BY access_id Desc");

                    while ($DBdata=$resultset->fetch_array())
                        {
                    ?>
                  <tr>
                    <td><?php print $i++; ?></td>
                    <td><?php print $DBdata['access_name']; ?></td>
                    <td><?php print $DBdata['access_details']; ?></td>
                    <td><?php if($DBdata['status']==1){print "<label class='badge badge-success'>Active</label>";} else {print "<label class='badge badge-warning'>Inactive</label>";} ?></td>
                    <td>
                      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal_<?php print $DBdata['access_id'] ?>"><i class="fas fa-edit"></i></a>
                      <form action="data/create_access.php?id=<?php print $DBdata['access_id']; ?>" method="post" style="display:inline-block;">
                       <button type="submit" class="btn btn-danger" onclick="if(confirm('Are you sure?')==0){return false;}"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </td>
                      <!-- Modal -->
                      <div class="modal fade" id="editModal_<?php print $DBdata['access_id'] ?>" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 style="float: left;" class="modal-title">Access Level</h3>
                              <button style="color: red;" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="card-body">
                                    <form role="form" action="data/create_access.php" method="post">
                                      <div class="form-group">
                                        <label>Access Level name</label>
                                        <input type="text" name="access_name" id="access_name" class="form-control" value="<?php print $DBdata['access_name']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Access Details</label>
                                        <input type="hidden" name="access_id" value="<?php echo $DBdata['access_id']; ?>">
                                        <input type="text" name="access_details" id="access_details" class="form-control" value="<?php print $DBdata['access_details']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                          <option value="<?php print $DBdata['status']; ?>"><?php if($DBdata['status']==1){print "Active";} else {print "Inactive";} ?></option>
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                        </select>
                                      </div>
                                         <input type="submit" name="edit" id="edit" class="btn btn-info" value="Save">
                                    </form>
                                  </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                        </div>
                      </div>
                  </tr>
                <?php } ?>
                </table>
              </div>
            </div>
        </section>
  		</div>
      <div class="container">





  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 style="float: left;" class="modal-title">Access Level</h3>
          <button style="color: red;" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <div class="card-body">
                <form role="form" action="data/create_access.php" method="post">
                  <div class="form-group">
                    <label>Access Level name</label>
                    <input type="text" name="access_name" id="access_name" class="form-control" placeholder="Enter...">
                  </div>
                  <div class="form-group">
                    <label>Access Details</label>
                    <input type="text" name="access_details" id="access_details" class="form-control" placeholder="Enter...">
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                     <input type="submit" name="save" id="save" class="btn btn-info" value="Save">
                </form>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<script>
  $(function () {
    $(".lamia-table").DataTable();
  });
</script>
<?php echo include 'include/footer.php' ?>