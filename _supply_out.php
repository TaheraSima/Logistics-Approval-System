<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
    <?php echo include 'include/sidebar.php' ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Supply Out </h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                      <li class="breadcrumb-item active">Supply Out</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <?php 
                if ( isset($_GET['success']) && $_GET['success'] == 1 ){?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> New Supply Out Added Successfully.
                    </div>
             <?php } ?>
            <?php 
                if ( isset($_GET['success']) && $_GET['success'] == 2 ){?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> Supply Out Updated Successfully.
                    </div>
             <?php } ?>
            <?php 
                if ( isset($_GET['success']) && $_GET['success'] == 3 ){?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> Supply Out Deleted Successfully.
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
                                         <i class="fas fa-plus"></i>  Create New
                                        </button>
                                    </h3>
                                </div>
                                  <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <tr>
                                            <th> SL#</th>
                                            <th> Initiator Name </th>
                                            <th> Department </th>
                                            <th> Requisition number</th>
                                            <th> Date </th>
                                            <th> Action </th>
                                        </tr>
                                        <?php
                                        $i =1;
                                        $sql = "SELECT store.id, store.department, store.employee_id, store.req_number, store.date, user_accounts.employee_name, department.department_name FROM store, user_accounts,department WHERE store.employee_id = user_accounts.employee_id AND store.department=department.department_id ORDER BY store.id DESC";
                                        if ($result=mysqli_query($conn, $sql)) {

                                            while ($row=mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?PHP echo $i++?></td>                                            

                                                    <td><?php echo $row["employee_name"] ?></td>
                                                    <td><?php echo $row["department_name"] ?></td>
                                                    <td><?php echo $row["req_number"] ?></td>
                                                    <td><?php echo $row["date"] ?></td>
                                                    <td>
                                                        <a href="#"  data-toggle="modal" data-target="#view_modal<?php echo $row["id"] ?>"><i class="fas fa-eye"></i></a>
                                                        <a href="#"  data-toggle="modal" data-target="#edit_modal<?php echo $row["id"] ?>"><i class="fas fa-edit"></i></a>
                                                        <a href="#" class="text-danger" data-toggle="modal" data-target="#delete_modal<?php echo $row["id"] ?>" ><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                        <?php 
                                            }
                                        }?>                              
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade bd-example-modal-lg" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle"> Add New Item </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-primary">
                                <!-- form start -->
                                <form role="form" action="data/supply_out.php?store" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">                                                
                                                <div class="form-group">
                                                    <label for="req_number"> Requisition Number </label>
                                                    <input type="text" class="form-control" name="req_number" id="req_number"  placeholder="Enter Requisition Number" required>
                                                </div>   
                                            </div>                                             
                                                
                                            <br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="user_id"> Employee Id </label>
                                                    <input type="text" class="form-control user_id" name="user_id" id="user_id" placeholder="Employee Id" readonly required>
                                                </div>
                                            </div>

                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="user_name"> Employee Name </label>
                                                    <input type="text" class="form-control user_name" name="user_name" id="user_name" placeholder="Employee Name" readonly >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="division_id"> Division Name </label>
                                                    <input type="text" class="form-control division_id" name="division_id"  placeholder="Enter Division name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="department"> Department Name </label>
                                                    <input type="text" class="form-control department" name="department"  placeholder="Enter Department name" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="unit_id"> Unit Name </label>
                                                    <input type="text" class="form-control unit_id" name="unit_id"  placeholder="Enter Unit name" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-success item-add"> + Add </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Item Name </td>
                                                        <td style=" margin-right:200px;"> Previous Qty </td>
                                                        <td style=" margin-right:200px;"> Entry Qty </td>
                                                        <td style=" margin-right:200px;"> Total Qty </td>
                                                    </tr>
                                                </thead>
                                                <tbody class="items">                                                    
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-5"></div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
                                                <button type="submit" class="btn btn-success"> Save </button>
                                            </div>
                                            <div class="col-md-3"></div>
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
                    <select style="width:250px;" class="input-group form-control select_item_id" name="rawrequisition_items[${i}][item_id]" required>
                        <option value="" selected>Select One</option>
                        <?php echo $options; ?>
                      </select>
                    </td>
                    <td>
                        <input type="number" step="any" name="rawrequisition_items[${i}][previous_qty]" readonly class="form-control previous_qty" required/>
                    </td>
                    <td>
                        <input type="number" step="any" name="rawrequisition_items[${i}][new_qty]" class="form-control new_qty" required/>
                    </td>
                    <td>
                        <input type="number" step="any" name="rawrequisition_items[${i}][current_quantity]" readonly class="form-control current_quantity" required/>
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



        $(document).on('change', '.select_item_id', function() {
            var itemElem = $(this);
            var prevQtyElem = itemElem.parent().next().find( '.previous_qty' );
            var item_id = itemElem.val();
            var data = "item_id="+item_id;
            $.ajax({
                url: 'data/supply_out.php',
                method: "POST",
                data: data,
                success: function(data){
                    console.log(data);
                  // console.log(data);
                  // prevQtyElem.empty();
                  prevQtyElem.val(data);
                }
            });
        });
        
        $( document ).on( 'keyup', '.new_qty', function() {
            var newQtyElem = $( this );
            var prevQtyElem = newQtyElem.parent().prev().find( '.previous_qty' );
            var curQtyElem = newQtyElem.parent().next().find( '.current_quantity' );
            var new_qty = parseInt( newQtyElem.val() );
            var previous_qty = parseInt( prevQtyElem.val() );
            var current_quantity = previous_qty - new_qty; 
            curQtyElem.val( current_quantity );
        } );



           $("#req_number").keyup(function(event){
              event.preventDefault();
              var req_number = $(this).val();
              var data = "req_number="+req_number;
                $.ajax({
                    url: 'data/supply_out.php',
                    method: "POST",
                    data: data,
                    success: function(data){
                      // console.log(data);
                      $(".user_id").val(data);
                    }
                });
            });

           $("#user_id").keyup(function(event){
              event.preventDefault();
              var user_id = $(this).val();
              var data = "user_id="+user_id;
                $.ajax({
                    url: 'data/supply_out.php',
                    method: "POST",
                    data: data,
                    success: function(data){
                     console.log(data);
                      
                      //$(".user_name").val(data);
                      
                    }
                });
            });

    }
    );

</script>
<?php echo include 'include/footer.php' ?>