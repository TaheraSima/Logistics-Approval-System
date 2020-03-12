<?php include 'data/config/conn.php' ?>
    <?php echo include 'include/header.php' ?>
        <?php echo include 'include/sidebar.php' ?>
            <?php
        // $sql=mysqli_query($conn,"select item_name, item_id from item_info");

         ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">All Requisitions</h1>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                        <li class="breadcrumb-item active">Requisition</li>
                                    </ol>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <?php
                if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> New Requisition Added Successfully.
                        </div>
                        <?php } ?>
                            <?php
                if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
                                <div class="alert alert-success">
                                    <strong>Success!</strong> Requisition Updated Successfully.
                                </div>
                                <?php } ?>
                                    <?php
                if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
                                        <div class="alert alert-success">
                                            <strong>Success!</strong> Requisition Deleted Successfully.
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
                                         <i class="fas fa-plus"></i>  Create New Requisition
                                        </button>
                                    </h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body p-0">
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <th> SL#</th>
                                                                            <th> Requisition Number </th>
                                                                            <th> Division </th>
                                                                            <th> Department </th>
                                                                            <th> Date </th>
                                                                            <th> View Detials </th>
                                                                            <th> Status </th>
                                                                            <th> Action </th>
                                                                        </tr>
                                                                        <?php
                                                                            $i = 1;

                                                                            if ($_SESSION['access_permission'] == 'Admin') {
                                                                                $sql = "SELECT requisition.*, user_accounts.*, requisition.status as requisition_status FROM requisition,user_accounts WHERE requisition.user_id =user_accounts.employee_id  ORDER BY requisition.id  DESC";
                                                                            }else{
                                                                                $user_id = $_SESSION['employee_id'];
                                                                                $sql = "SELECT requisition.*, requisition.status as requisition_status FROM requisition WHERE  user_id='$user_id'";

                                                                            }

                                                                            if ($result=mysqli_query($conn,$sql))
                                                                            {
                                                                                while ($row=mysqli_fetch_assoc($result))
                                                                            {?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $row['req_no']; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td>
                                                                                    <button class="btn btn-info btn-sm"> View Detials </button>
                                                                                </td>
                                                                                <td>
                                                                                <?php if ($row["requisition_status"] == 0) {?>
                                                                                    <button class="btn btn-warning btn-sm"> Pending </button>
                                                                                <?php }else if ($row["requisition_status"] == 1) {?>
                                                                                    <button class="btn btn-success btn-sm"> Approved </button>
                                                                                <?php }else{?>
                                                                                    <button class="btn btn-danger btn-sm"> Rejected </button>
                                                                                <?php }?>
                                                                                </td>
                                                                                <?php if ($row["requisition_status"] == 0) {?>
                                                                                    <td>
                                                                                        <a href="#" data-toggle="modal" data-target="#<?php echo $row["  "] ?>"><i class="fas fa-edit"></i></a>
                                                                                        <a href="#" class="text-danger" data-toggle="modal" data-target="#<?php echo $row["  "] ?>"><i class="fas fa-trash"></i></a>
                                                                                    </td>
                                                                                <?php }?>
                                                                            </tr>
                                                                            <!-- company Type edit moldal                                                                             <div class="modal fade" id="<?php echo $row["  "] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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

                                                    <?php   }
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
                <div class="modal fade bd-example-modal-lg" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle"> Requisition Entry Form </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <!-- form start -->
                                    <form action="data/create_requisition.php" method="post">
                                        <fieldset>
                                            <div class="row">
                                                <label class="col-md-2">Initiator Name</label>
                                                <div class="col-md-4">
                                                    <input id="name" name="name" class="form-control" required="true" type="hidden" value="<?php echo $_SESSION['employee_name']; ?>" readonly/>
                                                </div>
                                                <label class="col-md-2">Initiator ID</label>
                                                <div class="col-md-4">
                                                    <input id="user_id" name="user_id" class="form-control" required="true" type="hidden" value="<?php echo $_SESSION['employee_id']; ?>" readonly/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="col-md-2">Division</label>
                                                <div class="col-md-4">
                                                    <input id="division" name="division" class="form-control" required="true" type="hidden" value="<?php echo $_SESSION['division_name']; ?>" readonly/>
                                                </div>
                                                <label class="col-md-2">Department</label>
                                                <div class="col-md-4">
                                                    <input id="department" name="department" class="form-control" required="true" type="hidden" value="<?php echo $_SESSION['department_name']; ?>" readonly/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="col-md-2">Designation</label>
                                                <div class="col-md-4">
                                                    <input id="designation" name="designation" class="form-control" required="true" type="hidden" value="<?php echo $_SESSION['designation_name']; ?>" readonly/>
                                                </div>
                                                <label class="col-md-2">Unit</label>
                                                <div class="col-md-4">
                                                    <input id="unit" name="unit" class="form-control" required="true" type="hidden" value="<?php echo $_SESSION['unit_name']; ?>" readonly/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                 <div class="col-md-2">
                                                    <label>Requisition No</label>
                                                </div>
                                                <div class="col-md-4">
                                                        <input id="req_no" name="req_no" class="form-control" required="true" readonly type="text" value="<?php 
                                                        $employee_id = $_SESSION['employee_id'];
                                                        $rand_number = rand(9999, 1111);
                                                        $output = $employee_id.$rand_number;
                                                        echo $output;

                                                       ?>"/>
                                                </div>
                                                 <div class="col-md-2">
                                                    <label>Requisition Type</label>
                                                </div>
                                                <div class="col-md-4">
                                                        <select name="requisition_type"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-primary item-add">+</button>
                                            </div>
                                            <hr>
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Item Name</td>
                                                        <td style=" margin-right:200px;">Quantity</td>
                                                        <td style=" margin-right:200px;">Purpose</td>
                                                    </tr>
                                                </thead>
                                                <tbody class="items"></tbody>
                                            </table>

                                            <div class="form-group">
                                                <center>
                                                    <input type="submit" name="save" id="save" class="btn btn-info" value="Save">
                                                </center>
                                            </div>

                                        </fieldset>
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
                            var i = 0;
                            $('.item-add').click(function() {
                                var _html = `
                                    <tr class="item">
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger item-remove">-</button>
                                        </td>
                                        <td>
                                        <select style="width:250px;" class="input-group form-control" name="rawrequisition_items[${i}][item_id]" required>
                                            <option value="" selected>Select One</option>
                                            <?php echo $options; ?>
                                          </select>
                                        </td>
                                        <td>
                                            <input type="text" id="quantity" name="rawrequisition_items[${i}][quantity]" placeholder="Quantity" class="form-control" required/>
                                        </td>
                                        <td>
                                            <input type="text" id="purpose" name="rawrequisition_items[${i}][purpose]" placeholder="Purpose" class="form-control" required/>
                                        </td>
                                    </tr>
                                `;
                                $('.items').append(_html);
                                i++;
                            });

                            $('.item-add').click(function() {
                                console.log(_options);
                            });

                            $(document).on('click', '.item-remove', function() {
                                $(this).parent().parent().remove();
                            });

                        });
                    </script>
                    <?php echo include 'include/footer.php' ?>