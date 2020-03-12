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
                                    <h1 class="m-0 text-dark">All Requisition</h1>
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
                                                                    <?php            
                                                                        if ($_SESSION['access_permission'] == 'Division Head' || $_SESSION['access_permission'] == 'Users' ) {
                                                                    ?>
                                                                <div class="card-header">
                                                                    <h3 class="card-title">
                                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmodal">
                                                                 <i class="fas fa-plus"></i>  New Requisition
                                                                </button>
                                                                </h3>
                                                                </div>
                                                                <?php }?>
                                                                <!-- /.card-header -->
                                                                <div class="card-body p-2">
                                                                    <!-- for admin start..v...for admin start...for admin start..for admin start...for admin start...for admin start-->
                                                                  
                                                        
                                                         <?php            
                                                                    if ($_SESSION['access_permission'] == ('Store Admin' && 'Division Head' && 'logadmin' && 'log-1' && 'log-2' && 'log-3'))  {
                                                                    ?>
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <th> SL#</th>
                                                                            <th> Requisition No </th>
                                                                            <th> Division </th>
                                                                            <th> Department </th>
                                                                            <th> Date </th>
                                                                            <th> Status </th>
                                                                            <th> Action </th>
                                                                        </tr>                                                                        
                                                                        <?php
                                                                            $i = 1;                                                                        
                                                                            $user_id = $_SESSION['employee_id'];
                                                                            $sql = "SELECT requisition.*, division.*, department.*, user_accounts.employee_id as eid, user_accounts.division_id as dvid, user_accounts.department_id as dpid, requisition.status as requisition_status FROM requisition,user_accounts,division,department WHERE requisition.user_id =user_accounts.employee_id AND requisition.division_id=division.division_id AND requisition.department_id = department.department_id  ORDER BY requisition.id  DESC";

                                                                            if ($result=mysqli_query($conn,$sql))
                                                                            {
                                                                            while ($row=mysqli_fetch_assoc($result))
                                                                            { ?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $row['req_no']; ?></td>
                                                                                <td><?php echo $row['division_name']; ?></td>
                                                                                <td><?php echo $row['department_name']; ?></td>
                                                                                <td><?php echo $row['date']; ?></td>
                                                                                <td>
                                                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#req_view_modaldfd<?php echo $row["id"] ?>">View </a>
                                                                                    </div>
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
                                                                               
                                                                            </tr>    

                                                                            <div class="modal fade" id="req_view_modaldfd<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4>Requisition Item Details</h4>
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> X </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="row"> <h6><b>Requisition No: </b><?php echo $row['req_no']; ?></h6></div> 
                                                                                            <div class="row">
                                                                                                 <?php if ($row['req_type']== "Project") {?>
                                                                                                        <h6><b>Project Name: </b><?php echo $row['project_name'];?> Purpose</h6> 
                                                                                                   <?php }
                                                                                                   else{?>
                                                                                                    <h6><b>Request Type: </b><?php echo $row['req_type'];?> Purpose</h6>
                                                                                                 <?php  }
                                                                                                    ?>
                                                                                            </div>

                                                                                            <!-- form start -->
                                                                                            <form role="form" action="data/create_requisition.php?reject" method="post" style="display: none;">
                                                                                                <div class="row"><br></div>
                                                                                                <div class="row row-no-gutters border">
                                                                                                    <div class="col-sm-1">#SL</div>
                                                                                                    <div class="col-sm-5 border-left">Item Name</div>
                                                                                                    <div class="col-sm-2 border-left">Requisition Qty </div>
                                                                                                    <div class="col-sm-2 border-left">Approved Qty</div>
                                                                                                </div>

                                                                                                <?php
                                                                                                    $ii = 1;
                                                                                                    $req_id = $row['id'];                                                                                                   

                                                                                                    $sql = "SELECT requisition_details.*, item_info.item_name FROM  requisition_details,item_info WHERE requisition_details.item_id=item_info.item_id AND req_id='$req_id'";
                                                                                                    $requisition = mysqli_query($conn, $sql);
                                                                                                    while ($item = mysqli_fetch_assoc($requisition)) {?>
                                                                                                    <div class="row row-no-gutters border">
                                                                                                        <div class="col-sm-1"><?php echo $ii++ ?></div>
                                                                                                        <div class="col-sm-5 border-left"><?php echo $item['item_name'] ?></div>
                                                                                                        <div class="col-sm-2 border-left"><?php echo $item['quantity'] ?></div>
                                                                                                        <div class="col-sm-2 border-left"><?php echo $item['aprv_qty'] ?></div>                                                                                                        
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
                                    <form action="data/create_requisition.php?store" method="post">

                                        <fieldset>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Requisition No</label>
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
                                                                <select class="form-control" name="req_type" id="req_type" required>
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
                    
