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
                                    <h1 class="m-0 text-dark">Pertial Delivered</h1>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                        <li class="breadcrumb-item active"> Requisition </li>
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
                                    <?php
                if ( isset($_GET['success']) && $_GET['success'] == 4 ){?>
                                        <div class="alert alert-success">
                                            <strong>Forwarded!</strong> Requisition Successfully Forwarded.
                                        </div>
                                        <?php } ?>  
                                    <?php
                if ( isset($_GET['success']) && $_GET['success'] == 5 ){?>
                                        <div class="alert alert-success">
                                            <strong>Delivered!</strong> Requisition Items Successfully Delivered.
                                        </div>
                                        <?php } ?>                                      
                                            <section class="content-header">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card">
                                                                    
                                                                <!-- /.card-header -->
                                                                <div class="card-body p-0">
                                                                    <!-- for admin start..v...for admin start...for admin start..for admin start...for admin start...for admin start-->
                                                                    <?php            
                                                                    if ($_SESSION['access_permission'] == 'Admin') {
                                                                    ?>
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <th> SL#</th>
                                                                            <th> Requisition Number </th>
                                                                            <th> Division </th>
                                                                            <th> Department </th>
                                                                            <th> Date </th>
                                                                            <th> Status </th>
                                                                            <th> Action </th>
                                                                        </tr>                                                                        
                                                                        <?php
                                                                        $i = 1;                                                                        
                                                                                $user_id = $_SESSION['employee_id'];
                                                                                $sql = "SELECT requisition.*, division.*, user_accounts.*, requisition.status as requisition_status FROM requisition,user_accounts,division WHERE requisition.user_id =user_accounts.employee_id AND requisition.division_id=division.division_id  ORDER BY requisition.id  DESC";

                                                                            if ($result=mysqli_query($conn,$sql))
                                                                            {
                                                                            while ($row=mysqli_fetch_assoc($result))
                                                                            { ?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $row['req_no']; ?></td>
                                                                                <td><?php echo $row['division_name']; ?></td>
                                                                                <td><?php echo $row['department_id']; ?></td>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php   }
                                                                    }?>
                                                        </table>                                                                     
                                                                        
                                                        <?php }?>
                                <!-- ============= Division Head =======-->

                                                                    <?php 
                                                                    if ($_SESSION['access_permission'] == 'Division Head') {
                                                                    ?>                                                                     
                                                                    <table class="table table-striped table-bordered">
                                                                        <tr>
                                                                            <th> SL#</th>
                                                                            <th> Request Number </th>
                                                                            <th> Initiator </th>
                                                                            <th> Date </th>
                                                                            <th> Last action date </th>
                                                                            <th> Status </th>   
                                                                            <th>Action</th>
                                                                        </tr>                                                                        
                                                                        <?php
                                                                        $i = 1;
                                                                        $division_id = $_SESSION['division_id'];

                                                                        $sql = "SELECT * FROM requisition WHERE division_id='$division_id' AND status=2";
                                                                        if ($result=mysqli_query($conn,$sql))
                                                                        {
                                                                          while ($row=mysqli_fetch_assoc($result))
                                                                          {?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $row['req_no']; ?></td>
                                                                                <td><?php echo $row['employee_name']; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td>
                                                                                    <?php if ($row['status'] == 0) {?>
                                                                                           <button class="btn-sm btn btn-warning"> Pending </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                           <button class="btn-sm btn btn-success"> Forwarded </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 2) {?>
                                                                                           <button class="btn-sm btn btn-danger"> Rejected </button>
                                                                                    <?php }?>
                                                                                </td>         
                                                                                <td>
                                                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#req_view_modaldfd<?php echo $row["id"] ?>">View </a>
                                                                                    <?php if ($row['status'] == 0) {?>
                                                                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#forward_modal<?php echo $row["id"] ?>"> Forward </a>
                                                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reject_modal<?php echo $row["id"] ?>"> Reject </a>
                                                                                    <?php }?>
                                                                                    <!-- Forward moldal -->
                                                                                </td>
                                                                            </tr>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="req_view_modaldfd<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4>Requisition Item Details</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <div class="row row-no-gutters border">
                                                                                                    <div class="col-sm-1">#SL</div>
                                                                                                    <div class="col-sm-5 border-left">Item Name</div>
                                                                                                    <div class="col-sm-3 border-left">Request Qty </div>
                                                                                                    <div class="col-sm-3 border-left">Approved Qty</div>
                                                                                                </div>
                                                                                                <?php
                                                                                                    $i = 1;
                                                                                                    $req_id = $row['id'];
                                                                                                    $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                    $requisition = mysqli_query($conn, $sql);
                                                                                                    while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                    <div class="row row-no-gutters border">
                                                                                                        <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                        <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><?php echo $item['quantity'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><span class="btn btn-success btn-sm"><?php echo $item['aprv_qty'] ?></span></div>
                                                                                                    </div>
                                                                                                 <?php } ?>
                                                                                                
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                            <div class="modal fade" id="forward_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?forward" method="post" style="display: none;">

                                                                                                <input type="hidden" name="req_no" value="<?php echo $row["req_no"] ?>">
                                                                                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                                                                                    <h3 class="text-success"><b>Are you want to forward these items??</b></h3>
                                                                                                    <hr>
                                                                                                    <div class="row row-no-gutters border">
                                                                                                        <div class="col-sm-1">#SL</div>
                                                                                                        <div class="col-sm-5 border-left"> Item Name </div>
                                                                                                        <div class="col-sm-3 border-left"> Request Qty </div>
                                                                                                        <div class="col-sm-3 border-left">  Approved Qty</div>
                                                                                                    </div>
                                                                                                    <?php
                                                                                                        $i = 1;
                                                                                                        $req_id = $row['id'];
                                                                                                        $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                        $requisition = mysqli_query($conn, $sql);
                                                                                                        while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                            <input type="hidden" name="rawrequisition_items[<?php echo $item['id']; ?>][reqd_id]" value="<?php echo $item['id']; ?>">
                                                                                                            <div class="row row-no-gutters border">
                                                                                                                <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                                <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                                <div class="col-sm-3 border-left"><span class="btn btn-warning btn-sm"><?php echo $item['quantity'] ?></span></div>
                                                                                                                <div class="col-sm-3 border-left"><input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][aprv_qty]" class="form-control" required placeholder="00"></div>
                                                                                                            </div>
                                                                                                     <?php } ?>
                                                                                                    <hr>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-4">
                                                                                                            <label> Signature : </label>
                                                                                                        </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <input name="signature" class="form-control" required="true" type="text"/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-4">
                                                                                                            <label> Remarks :  </label>
                                                                                                        </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <textarea class="form-control" name="remarks"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                        <button type="submit" class="btn btn-success"> Yes! Forward </button>
                                                                                                    </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="reject_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <input type="text" name="req_no" value="<?php echo $row["req_no"] ?>">
                                                                                                <h3 class="text-danger"><b>Are you sure want to reject this??</b></h3>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                    <button type="submit" class="btn btn-success"> Yes! Reject </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php   }
                                                                    }?>
                                                        </table>                                                                   
                                                                        
                                                              <?php }?> 
                                        <!-- ============= Store Admin =======-->
                                                                    <?php 
                                                                    if ($_SESSION['access_permission'] == 'Store Admin') {
                                                                    ?>                                                                     
                                                                    <table class="table table-striped table-bordered">
                                                                        <tr>
                                                                            <th> SL#</th>
                                                                            <th> Division </th>
                                                                            <th> Department </th>
                                                                            <th> Req No </th>
                                                                            <th> Emp Name </th>
                                                                            <th> Req Type </th>
                                                                            <th> Project Name </th>
                                                                            <th> Date </th>
                                                                            <th> Status </th>   
                                                                            <th>Action</th>
                                                                        </tr>                                                                        
                                                                        <?php
                                                                        $i = 1;
                                                                        $sql = "SELECT requisition.*, division.division_name, department.department_name FROM requisition,division,department WHERE requisition.division_id=division.division_id AND requisition.department_id=department.department_id AND requisition.status IN(5)";
                                                                        if ($result=mysqli_query($conn,$sql))
                                                                        {
                                                                          while ($row=mysqli_fetch_assoc($result))
                                                                          {
                                                                            $pro_id = $row['project_name'];
                                                                            $sql_prj_name = "SELECT * FROM `projects` WHERE `id`='$pro_id'";
                                                                            $project_name = '';
                                                                            $resultproj_name = mysqli_query($conn, $sql_prj_name);
                                                                            while ($rowprj_name = mysqli_fetch_assoc($resultproj_name)) {
                                                                                $project_name = $rowprj_name['name'];
                                                                            }
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $row['division_name']; ?></td>
                                                                                <td><?php echo $row['department_name']; ?></td>
                                                                                <td><?php echo $row['req_no']; ?></td>
                                                                                <td><?php echo $row['employee_name']; ?></td>
                                                                                <td><?php echo $row['req_type']; ?></td>
                                                                                <td><?php echo $project_name; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td>
                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                        <button class="btn-sm btn btn-warning"> Pending </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 3) {?>
                                                                                        <button class="btn-sm btn btn-warning"> Delivered </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 4) {?>
                                                                                        <button class="btn-sm btn btn-success"> Received </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 5) {?>
                                                                                        <button class="btn-sm btn btn-success"> Partial Delivery </button>
                                                                                    <?php }?>
                                                                                </td>         
                                                                                <td width="15%">
                                                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#req_view_modaldfd<?php echo $row["id"] ?>">View </a>
                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#req_deliver_modal<?php echo $row["id"] ?>">Deliver </a>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 4) {?>
                                                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#req_receipts_modal<?php echo $row["id"] ?>"> Receipts </a>
                                                                                    <?php }?>

                                                                                    <!-- Forward moldal -->
                                                                                </td>
                                                                            </tr>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="req_view_modaldfd<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4>Requisition Item Details</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <div class="row row-no-gutters border">
                                                                                                    <div class="col-sm-1">#SL</div>
                                                                                                    <div class="col-sm-5 border-left">Item Name</div>
                                                                                                    <div class="col-sm-3 border-left">Request Qty </div>
                                                                                                    <div class="col-sm-3 border-left">Approved Qty</div>
                                                                                                </div>
                                                                                                <?php
                                                                                                    $i = 1;
                                                                                                    $req_id = $row['id'];
                                                                                                    $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                    $requisition = mysqli_query($conn, $sql);
                                                                                                    while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                    <div class="row row-no-gutters border">
                                                                                                        <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                        <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><?php echo $item['quantity'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><?php echo $item['aprv_qty'] ?></div>
                                                                                                    </div>
                                                                                                 <?php } ?>
                                                                                                
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                            <div class="modal fade" id="forward_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?forward" method="post" style="display: none;">
                                                                                                <input type="text" name="req_no" value="<?php echo $row["req_no"] ?>">
                                                                                                <h3 class="text-danger"><b>Are you sure want to forward this??</b></h3>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                    <button type="submit" class="btn btn-success"> Yes! Forward </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Deliver moldal -->
                                                                            <div class="modal fade" id="req_deliver_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?deliver" method="post" style="display: none;">
                                                                                                <input type="hidden" name="req_no" value="<?php echo $row['req_no']; ?>">
                                                                                                <h3 class="text-danger"><b>Are you sure want to deliver this??</b></h3>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                    <button type="submit" class="btn btn-success"> Yes! Deliver </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="reject_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <input type="text" name="req_no" value="<?php echo $row["req_no"] ?>">
                                                                                                <h3 class="text-danger"><b>Are you sure want to reject this??</b></h3>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                    <button type="submit" class="btn btn-success"> Yes! Reject </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="req_receipts_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <h3><b>Receipts Info</b></h3>
                                                                                                <hr>
                                                                                                <div class="row row-no-gutters border">
                                                                                                    <div class="col-sm-1">#SL</div>
                                                                                                    <div class="col-sm-5 border-left"> Item Name </div>
                                                                                                    <div class="col-sm-3 border-left"> Delivery Qty </div>
                                                                                                    <div class="col-sm-3 border-left">  Received Qty</div>
                                                                                                </div>
                                                                                                <?php
                                                                                                    $i = 1;
                                                                                                    $req_id = $row['id'];
                                                                                                    $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                    $requisition = mysqli_query($conn, $sql);
                                                                                                    while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                        <div class="row row-no-gutters border">
                                                                                                            <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                            <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                            <div class="col-sm-3 border-left"><span class="btn btn-warning btn-sm"><?php echo $item['quantity'] ?></span></div>
                                                                                                            <div class="col-sm-3 border-left"><span class="btn btn-success btn-sm"><?php echo $item['quantity'] ?></span></div>
                                                                                                        </div>
                                                                                                 <?php } ?>
                                                                                                <hr>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <label> Signature : </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-8">
                                                                                                           <h6><?php echo $row["signature"] ?></h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <label> Remarks :  </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-8">
                                                                                                            <h6><?php echo $row["remarks"] ?></h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <br>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php   }
                                                                    }?>
                                                        </table>                                                                   
                                                                        
                                                              <?php }?> 
                                                                <!-- ============= purchaser =======-->
                                                                    <?php 
                                                                    if ($_SESSION['access_permission'] == 'purchaser') {
                                                                    ?>                                                                     
                                                                    <table class="table table-striped table-bordered">
                                                                        <tr>
                                                                            <th> SL#</th>
                                                                            <th> Division </th>
                                                                            <th> Department </th>
                                                                            <th> Req No </th>
                                                                            <th> Emp Name </th>
                                                                            <th> Req Type </th>
                                                                            <th> Project Name </th>
                                                                            <th> Date </th>
                                                                            <th> Status </th>   
                                                                            <th>Action</th>
                                                                        </tr>                                                                        
                                                                        <?php
                                                                        $i = 1;
                                                                        $sql = "SELECT requisition.*, division.division_name, department.department_name FROM requisition,division,department WHERE requisition.division_id=division.division_id AND requisition.department_id=department.department_id AND requisition.status IN(5)";
                                                                        if ($result=mysqli_query($conn,$sql))
                                                                        {
                                                                          while ($row=mysqli_fetch_assoc($result))
                                                                          {
                                                                            $pro_id = $row['project_name'];
                                                                            $sql_prj_name = "SELECT * FROM `projects` WHERE `id`='$pro_id'";
                                                                            $project_name = '';
                                                                            $resultproj_name = mysqli_query($conn, $sql_prj_name);
                                                                            while ($rowprj_name = mysqli_fetch_assoc($resultproj_name)) {
                                                                                $project_name = $rowprj_name['name'];
                                                                            }
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $row['division_name']; ?></td>
                                                                                <td><?php echo $row['department_name']; ?></td>
                                                                                <td><?php echo $row['req_no']; ?></td>
                                                                                <td><?php echo $row['employee_name']; ?></td>
                                                                                <td><?php echo $row['req_type']; ?></td>
                                                                                <td><?php echo $project_name; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td>
                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                        <button class="btn-sm btn btn-warning"> Pending </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 3) {?>
                                                                                        <button class="btn-sm btn btn-warning"> Delivered </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 4) {?>
                                                                                        <button class="btn-sm btn btn-success"> Received </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 5) {?>
                                                                                        <button class="btn-sm btn btn-success"> Partial Delivery </button>
                                                                                    <?php }?>
                                                                                </td>         
                                                                                <td width="15%">
                                                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#req_view_modaldfd<?php echo $row["id"] ?>">View </a>
                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#req_deliver_modal<?php echo $row["id"] ?>">Deliver </a>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 4) {?>
                                                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#req_receipts_modal<?php echo $row["id"] ?>"> Receipts </a>
                                                                                    <?php }?>

                                                                                    <!-- Forward moldal -->
                                                                                </td>
                                                                            </tr>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="req_view_modaldfd<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4>Requisition Item Details</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <div class="row row-no-gutters border">
                                                                                                    <div class="col-sm-1">#SL</div>
                                                                                                    <div class="col-sm-5 border-left">Item Name</div>
                                                                                                    <div class="col-sm-3 border-left">Request Qty </div>
                                                                                                    <div class="col-sm-3 border-left">Approved Qty</div>
                                                                                                </div>
                                                                                                <?php
                                                                                                    $i = 1;
                                                                                                    $req_id = $row['id'];
                                                                                                    $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                    $requisition = mysqli_query($conn, $sql);
                                                                                                    while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                    <div class="row row-no-gutters border">
                                                                                                        <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                        <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><?php echo $item['quantity'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><?php echo $item['aprv_qty'] ?></div>
                                                                                                    </div>
                                                                                                 <?php } ?>
                                                                                                
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                            <div class="modal fade" id="forward_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?forward" method="post" style="display: none;">
                                                                                                <input type="text" name="req_no" value="<?php echo $row["req_no"] ?>">
                                                                                                <h3 class="text-danger"><b>Are you sure want to forward this??</b></h3>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                    <button type="submit" class="btn btn-success"> Yes! Forward </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Deliver moldal -->
                                                                            <div class="modal fade" id="req_deliver_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?deliver" method="post" style="display: none;">
                                                                                                <input type="hidden" name="req_no" value="<?php echo $row['req_no']; ?>">
                                                                                                <h3 class="text-danger"><b>Are you sure want to deliver this??</b></h3>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                    <button type="submit" class="btn btn-success"> Yes! Deliver </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="reject_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <input type="text" name="req_no" value="<?php echo $row["req_no"] ?>">
                                                                                                <h3 class="text-danger"><b>Are you sure want to reject this??</b></h3>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                    <button type="submit" class="btn btn-success"> Yes! Reject </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="req_receipts_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <h3><b>Receipts Info</b></h3>
                                                                                                <hr>
                                                                                                <div class="row row-no-gutters border">
                                                                                                    <div class="col-sm-1">#SL</div>
                                                                                                    <div class="col-sm-5 border-left"> Item Name </div>
                                                                                                    <div class="col-sm-3 border-left"> Delivery Qty </div>
                                                                                                    <div class="col-sm-3 border-left">  Received Qty</div>
                                                                                                </div>
                                                                                                <?php
                                                                                                    $i = 1;
                                                                                                    $req_id = $row['id'];
                                                                                                    $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                    $requisition = mysqli_query($conn, $sql);
                                                                                                    while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                        <div class="row row-no-gutters border">
                                                                                                            <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                            <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                            <div class="col-sm-3 border-left"><span class="btn btn-warning btn-sm"><?php echo $item['quantity'] ?></span></div>
                                                                                                            <div class="col-sm-3 border-left"><span class="btn btn-success btn-sm"><?php echo $item['quantity'] ?></span></div>
                                                                                                        </div>
                                                                                                 <?php } ?>
                                                                                                <hr>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <label> Signature : </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-8">
                                                                                                           <h6><?php echo $row["signature"] ?></h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <label> Remarks :  </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-8">
                                                                                                            <h6><?php echo $row["remarks"] ?></h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <br>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php   }
                                                                    }?>
                                                        </table>                                                                   
                                                                        
                                                              <?php }?> 
                                                              <!-- ============================ users table ============================ -->
                                                            <?php
                                                            if ($_SESSION['access_permission'] == 'Users') {
                                                            ?>                                                                     
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <th> SL#</th>
                                                                            <th> Requisition NO </th>
                                                                            <th> Req Submit At </th>
                                                                            <th> Last action date </th>
                                                                            <th> Rejected At </th>
                                                                            <th> Status </th>
                                                                            <th> Action </th>
                                                                        </tr>
                                                                        
                                                                        <?php
                                                                        $i = 1;
                                                                        $user_id = $_SESSION['employee_id'];
                                                                        $sql = "SELECT requisition.*, requisition.status as requisition_status FROM requisition WHERE  user_id='$user_id' AND status=2 ";
                                                                         if ($result=mysqli_query($conn,$sql))
                                                                         {
                                                                          while ($row=mysqli_fetch_assoc($result))
                                                                          {?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $row['req_no']; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td>
                                                                                    <?php if ($row['status'] == 0) {?>
                                                                                           <button class="btn-sm btn btn-warning"> Division Head </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                           <button class="btn-sm btn btn-success"> Forwared to Store Admin </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 2) {?>
                                                                                           <button class="btn-sm btn btn-danger"> Rejected by Division Head </button>
                                                                                    <?php }?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($row['status'] == 0) {?>
                                                                                           <button class="btn-sm btn btn-warning"> Pending </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                           <button class="btn-sm btn btn-success"> Approved </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 2) {?>
                                                                                           <button class="btn-sm btn btn-danger"> Rejected </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 3) {?>
                                                                                           <button class="btn-sm btn btn-primary"> Delivered </button>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 4) {?>
                                                                                           <button class="btn-sm btn btn-success"> Received </button>
                                                                                    <?php }?>
                                                                                </td>
                                                                                <td>
                                                                                    <a href="#" data-toggle="modal" class="btn btn-info btn-sm" data-target="#req_view_modal<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
                                                                                    <?php if ($row["requisition_status"] == 0) {?>
                                                                                    <a href="#" data-toggle="modal" class="btn btn-danger btn-sm" data-target="#req_delete_modal<?php echo $row["id"] ?>"><i class="fas fa-trash"></i></a>
                                                                                    <?php }?>
                                                                                    <?php if ($row['status'] == 3) {?>
                                                                                    <a href="#" data-toggle="modal" class="btn btn-success btn-sm" data-target="#req_receive_confirm_modal<?php echo $row["id"] ?>">Yes! Received </i></a>
                                                                                    <?php }?>
                                                                                </td>
                                                                            </tr>
                                                                            <!-- Forward moldal -->
                                                                             <div class="modal fade" id="req_view_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4>Requisition Item Details</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/rejected_requisition.php?reject" method="post" style="display: none;">
                                                                                                <div class="row row-no-gutters border">
                                                                                                    <div class="col-sm-1">#SL</div>
                                                                                                    <div class="col-sm-5 border-left">Item Name</div>
                                                                                                    <div class="col-sm-3 border-left">Request Qty </div>
                                                                                                    <?php if ($row['status'] == 1) {?>
                                                                                                    <div class="col-sm-3 border-left">Approved Qty</div>
                                                                                                    <?php }?>
                                                                                                    <?php if ($row['status'] == 4) {?>
                                                                                                    <div class="col-sm-3 border-left"> Received Qty</div>
                                                                                                    <?php }?>
                                                                                                </div>
                                                                                                <?php
                                                                                                    $i = 1;
                                                                                                    $req_id = $row['id'];
                                                                                                    $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                    $requisition = mysqli_query($conn, $sql);
                                                                                                    while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                    <div class="row row-no-gutters border">
                                                                                                        <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                        <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><?php echo $item['quantity'] ?></div>
                                                                                                        <?php if ($row['status'] == 1) {?>
                                                                                                        <div class="col-sm-3 border-left"><span class="btn btn-primary btn-sm"><?php echo $item['aprv_qty'] ?></span></div>
                                                                                                        <?php }?>
                                                                                                        <?php if ($row['status'] == 4) {?>
                                                                                                        <div class="col-sm-3 border-left"><span class="btn btn-success btn-sm"><?php echo $item['recv_qty'] ?></span></div>
                                                                                                        <?php }?>
                                                                                                    </div>
                                                                                                 <?php } ?>
                                                                                                
                                                                                                <!-- /.card-body -->
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        <!-- Req Delete modal -->
                                                                        <div class="modal fade" id="req_delete_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body">
                                                                                        <!-- form start -->
                                                                                        <form role="form" action="data/rejected_requisition.php?delete" method="post" style="display: none;">
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
                                                                         <!-- Req Receive Confirm Modal modal -->
                                                                        <div class="modal fade" id="req_receive_confirm_modal<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body">
                                                                                        <!-- form start -->
                                                                                        <form role="form" action="data/rejected_requisition.php?receive" method="post" style="display: none;">
                                                                                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                                                                            <h3 class="text-success"><b>Are you received these items??</b></h3>
                                                                                            <hr>
                                                                                            <div class="row row-no-gutters border">
                                                                                                <div class="col-sm-1">#SL</div>
                                                                                                <div class="col-sm-5 border-left"> Item Name </div>
                                                                                                <div class="col-sm-3 border-left"> Request Qty </div>
                                                                                                <div class="col-sm-3 border-left">  Received Qty</div>
                                                                                            </div>
                                                                                            <?php
                                                                                                $i = 1;
                                                                                                $req_id = $row['id'];
                                                                                                $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                $requisition = mysqli_query($conn, $sql);
                                                                                                while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                    <input type="hidden" name="rawrequisition_items[<?php echo $item['id']; ?>][reqd_id]" value="<?php echo $item['id']; ?>">
                                                                                                    <div class="row row-no-gutters border">
                                                                                                        <div class="col-sm-1"><?php echo $i++ ?></div>
                                                                                                        <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                        <div class="col-sm-3 border-left"><span class="btn btn-warning btn-sm"><?php echo $item['quantity'] ?></span></div>
                                                                                                        <div class="col-sm-3 border-left"><input type="text" name="rawrequisition_items[<?php echo $item['id']; ?>][recv_qty]" class="form-control" required placeholder="00"></div>
                                                                                                    </div>
                                                                                             <?php } ?>
                                                                                            <hr>
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <label> Signature : </label>
                                                                                                </div>
                                                                                                <div class="col-md-8">
                                                                                                    <input name="signature" class="form-control" required="true" type="text"/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <hr>
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <label> Remarks :  </label>
                                                                                                </div>
                                                                                                <div class="col-md-8">
                                                                                                        <textarea class="form-control" name="remarks"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"> No! </button>
                                                                                                <button type="submit" class="btn btn-success"> Yes! Received </button>
                                                                                            </div>
                                                                                            <!-- /.card-body -->
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php   }
                                                                    }?>
                                                        </table>                                                                      
                                                                        
                                                              <?php }?> 





                                                                        
                                                                        

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
                                <div class="card card-primary">
                                    <!-- form start -->
                                    <form action="data/rejected_requisition.php?store" method="post">

                                        <fieldset>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Request No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                                <input id="req_no" name="req_no" class="form-control" required="true" readonly type="text" value="<?php 
                                                                $employee_id = $_SESSION['employee_id'];
                                                                $rand_number = rand(9999, 1111);
                                                                $output = $employee_id.$rand_number;
                                                                echo $output;

                                                               ?>"/>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Requisition Type</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                                <select class="form-control" name="req_type" id="req_type">
                                                                    <option value=""> Select Type </option>
                                                                    <option value="Individual"> Individual </option>
                                                                    <option value="Department"> Department </option>
                                                                    <option value="Project"> Project </option>
                                                                    <option value="SIMEC"> SIMEC Group </option>
                                                                </select>
                                                        </div>
                                                    </div> 
                                                    <span class="req_type"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Employee ID :</b> <?php echo $_SESSION['employee_id']; ?><br>
                                                    <b>Employee Name :</b> <?php echo $_SESSION['employee_name']; ?><br>
                                                    <b>Division :</b> <?php echo $_SESSION['division_name']; ?><br>
                                                    <b>Department :</b> <?php echo $_SESSION['department_name']; ?><br>
                                                    <b>Unit :</b> <?php echo $_SESSION['unit_name']; ?><br>
                                                    <b>Designation :</b> <?php echo $_SESSION['designation_name']; ?><br>
                                                </div>
                                                </div>
                                                <div class="col-md-2">
                                                <button type="button" class="btn btn-success item-add">+ Add Item</button>
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
                </div>

                <?php
                    $results=mysqli_query( $conn,"select * from item_info" );
                    $options = '';
                    while ( $row = mysqli_fetch_assoc( $results ) ) {
                        $options .= sprintf( "<option value='%s'>%s</option>", $row['item_id'], $row['item_name'] );
                    }
                ?>

                    <script>
                        $("#show_modal").click(function(){
                        $("#addmodal").modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    });

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
                                    <select style="width:250px;" class="input-group form-control select2" name="rawrequisition_items[${i}][item_id]" required>
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

                            $('.item-add').click(function() {
                                console.log(_options);
                            });

                            $(document).on('click', '.item-remove', function() {
                                $(this).parent().parent().remove();
                            });

                            $("#req_type").change(function(event){
                                event.preventDefault();
                                $(".req_type").empty();
                                var req_type = $(this).val();
                                if (req_type == 'Project') 
                                {
                                    var html = `<br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label> Project Name </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                           <input  name="project_name" class="form-control" required="true" placeholder="Project name"/>
                                                    </div>
                                                </div>`;
                                    $(".req_type").html(html);
                                }
                            });

                        });

                    </script>
                    <?php echo include 'include/footer.php' ?>