<?php include 'data/config/conn.php' ?>
<?php include 'include/header.php' ?>
<?php include 'include/sidebar.php' ?>
	<div class="content-wrapper">
		<div class="content-header">
          	<div class="container-fluid">
	            <div class="row mb-2">
		            <div class="col-sm-6">
		                <h1 class="m-0 text-dark"> Reports </h1>
		            </div><!-- /.col -->
	              	<div class="col-sm-6">
		                <ol class="breadcrumb float-sm-right">
		                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		                  <li class="breadcrumb-item active">Store Reports</li>
		                </ol>
	              	</div><!-- /.col -->
	            </div><!-- /.row -->
	            <hr>
	            <div class="row">
	            	<div class="col-md-2"></div>
	            	<div class="col-md-8">
	            		<div class="card">
							<div class="card-header"><h4 class="m-0 text-dark"> Store Reports </h4></div>

				<?php
                    $results=mysqli_query( $conn,"select * from item_info" );
                    $options = '';
                    while ( $row = mysqli_fetch_assoc( $results ) ) {
                        $options .= sprintf( "<option value='%s'>%s</option>", $row['item_id'], $row['item_name'] );
                    }
                ?> 
							
							<form class="report_from" method="POST" target="__blank">
							  	<div class="card-body">
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Report Type : </label>
							    		</div>
							    		<div class="col-md-8">
							    			<div class="form-group">
												<select name="report_type" class="form-control" id="report_type">
													<option value=""> Select Report Type</option>
													<option value="Stock Report"> Stock Report </option>
													<option value="Item Ledger"> Item Ledger Report </option>
													<option value="Current Report"> Current Item Balance </option>
													<option value="Division wise"> Division Wise report </option>
													<option value="Project wise"> Project Wise Report </option>
													<option value="Employee wise"> Employee Wise Report </option>
													<option value="Pending wise"> Pending Requisition Report </option>
												</select>
											</div>
							    		</div>
							    		<div class="col-md-2"></div>
							    	</div>
							    	<span class="items_list"></span>
							    	<span class="project_stock"></span>
							    	<span class="date_stock"></span>
							    	<span class="date_range"></span>						    	
							    	
									<hr>
							    	<div class="row">
							    		<div class="col-md-6"></div>
							    		<div class="col-md-3">
							    			<button type="submit" class="btn btn-md btn-success"> Get Report </button>
							    		</div>
							    		<div class="col-md-4"></div>
							    	</div>
							  	</div>
							</form>
							<?php
							?>
						</div>
	            	</div>
	            	<div class="col-md-2"></div>
	            </div>
          	</div><!-- /.container-fluid -->
        </div>	
        <script type="text/javascript">
			$(function() {
				$(" #from ").datepicker({dateFormat: 'yy-mm-dd'});
			});

        	$(document).ready(function(){
        		$("#report_type").change(function(event){
        			event.preventDefault();
        			var report_type = $(this).val();     			

        			if (report_type == "Item Ledger")
        			{

        				var items_list = `
							    	<hr>
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Product Name : </label>
							    		</div>
							    		<div class="col-md-8">
							    			<div class="form-group">
												<select class="form-control select2" name="item">
								                <option value="" selected>-- Select One --</option>
								                <?php echo $options; ?>
								                </select> 
											</div>
							    		</div>
							    		<div class="col-md-2"></div>
							    	</div>
							    	<script>
	                                    $( '.select2' ).select2();
	                                <\/script>
							    	`;
						$('.items_list').html(items_list);
        				$(".report_from").attr("action", "data/item_ledger_report.php");

        			}

        			if (report_type == "Item Ledger")
        			{


        				var date_range = `
							    	<hr>
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Date : </label>
							    		</div>
							    		<div class="col-md-4">
							    			<div class="form-group">
												<label> From </label>
												<input type="date" name="from_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
											</div>
							    		</div>
							    		<div class="col-md-4">
							    			<div class="form-group">
												<label> To </label>
												<input type="date" name="to_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
											</div>
							    		</div>
							    		<div class="col-md-2"></div>
							    	</div>
							    	`;
						$('.date_range').html(date_range);
						$('.date_stock').empty();
						$('.project_stock').empty();
        				$(".report_from").attr("action", "data/item_ledger_report.php");

        			}

        			if (report_type == "Project wise")
        			{

        				var project_stock = `
										<hr>
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Project Name : </label>
							    		</div>
							    	<div class="col-md-8">
							    			<div class="form-group">
												<select class="form-control" name="project">
												<?php 
							                	$query = mysqli_query($conn,"SELECT requisition.*, projects.id as pid, projects.name,  projects_details.* FROM requisition, projects, projects_details WHERE requisition.project_name=projects.id AND projects.id = projects_details.project_id group by requisition.project_name");
							                	while ($row1=mysqli_fetch_array($query)) {
							                		if($row1['name']!=""){
							                	?>

								                <option value="<?php echo $row1['pid'];  ?>" selected><?php echo $row1['name'];  ?></option>	
								            <?php } } ?>
								            	</select> 
											</div>
							    		</div>
							    		<div class="col-md-2"></div>
							    	</div>               
						`;

        				var work_order = `
										<hr>
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Project Name : </label>
							    		</div>
							    	<div class="col-md-8">
							    			<div class="form-group">
												<select class="form-control" name="project">
												<?php 
							                	// $query = mysqli_query($conn,"SELECT requisition.*, projects.id as pid, projects.name,  projects_details.* FROM requisition, projects, projects_details WHERE requisition.project_name=projects.id AND projects.id = projects_details.project_id group by requisition.project_name");
							                	$query = mysqli_query($conn,"SELECT requisition.*, projects.id as pid, projects.name,  projects_details.* FROM requisition, projects, projects_details WHERE requisition.project_name=projects.id AND projects.id = projects_details.project_id");
							                	while ($row1=mysqli_fetch_array($query)) {
							                		if($row1['name']!=""){
							                	?>
								                <option value="<?php echo $row1['pid'];  ?>" selected><?php echo $row1['name'];  ?></option>	
								            <?php } } ?>
								            	</select> 
											</div>
							    		</div>
							    		<div class="col-md-2"></div>
							    	</div>               
						`;

						var date_range = `
							    	<hr>
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Date : </label>
							    		</div>
							    		<div class="col-md-4">
							    			<div class="form-group">
												<label> From </label>
												<input type="date" name="from_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
											</div>
							    		</div>
							    		<div class="col-md-4">
							    			<div class="form-group">
												<label> To </label>
												<input type="date" name="to_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
											</div>
							    		</div>
							    		<div class="col-md-2"></div>
							    	</div>
							    	`;
								$('.items_list').empty();								
								$('.project_stock').html(project_stock);
								$('.date_range').html(date_range);
			    				$(".report_from").attr("action", "data/project_wise_report.php");
        			}

        			if (report_type == "Stock Report")
        			{

        				var date_stock = `
										<hr>
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Date : </label>
							    		</div>
							    		<div class="col-md-4">
							    			<div class="form-group">												
												<input type="date" name="from_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
											</div>
							    		</div>
							    		
							    		<div class="col-md-2"></div>
							    	</div>                
						`;
								$('.items_list').empty();
								$('.date_range').empty();
								$('.project_stock').empty();
								$('.date_stock').html(date_stock);
			    				$(".report_from").attr("action", "data/stock_report.php");
        			}

        			if (report_type == "Current Report")
        			{
        				$('.items_list').empty();
        				$('.date_stock').empty();
        				$('.project_stock').empty();
        				$(".report_from").attr("action", "data/current_balance.php");
        			}
        			if (report_type == "Division wise")
        			{
        				$('.items_list').empty();
        				$('.date_range').empty();
        				$('.date_stock').empty();
        				$('.project_stock').empty();
        				$(".report_from").attr("action", "data/division_wise_report.php");
        			}

        			if (report_type == "Employee wise")
        			{
        				$('.items_list').empty();
        				$('.date_range').empty();
        				$('.project_stock').empty();
        				$('.date_stock').empty();
        				$(".report_from").attr("action", "data/emp_wise_report.php");
        			}
        			if (report_type == "Pending wise")
        			{
						var date_range = `
							    	<hr>
							    	<div class="row">
							    		<div class="col-md-3">
							    			<label> Date : </label>
							    		</div>
							    		<div class="col-md-4">
							    			<div class="form-group">
												<label> From </label>
												<input type="date" name="from_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
											</div>
							    		</div>
							    		<div class="col-md-4">
							    			<div class="form-group">
												<label> To </label>
												<input type="date" name="to_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
											</div>
							    		</div>
							    		<div class="col-md-2"></div>
							    	</div>
							    	`;
																
								
								$('.date_range').html(date_range);

        				$('.items_list').empty();
        				$('.date_stock').empty();
        				$('.project_stock').empty();
        				$(".report_from").attr("action", "data/pending_wise_report.php");
        			}
        		});
        	});
        </script>	
	</div>
<?php echo include 'include/footer.php' ?>