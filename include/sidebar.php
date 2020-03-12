<?php if($_SESSION['access_permission'] == "Admin"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/SIMEC-Group.png" alt="AdminLTE Logo" style="border-radius:10%;" class="brand-image  elevation-3"
    style="opacity: .8">
    <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Logistics & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="requisition.php" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              Requisition
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="request_projects.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                  Project Request
                <!-- <span class="badge badge-info right users_req_item"></span> -->
              </p>
            </a>
          </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
            <p> Store
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" <?php if(@$_GET[btn] == 2) {?>style="display: block;" <?php } ?>>

            <li class="nav-item">
              <a href="reports.php?btn=2" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Reports </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="user_accounts.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User Accounts
             <!--  <span class="badge badge-info right total_users"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>MASTER / SETTINGS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" <?php if(@$_GET[btn] == 1) {?>style="display: block;" <?php } ?>>
            <!-- <li class="nav-item">
              <a href="access_level.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Access Level</p>
              </a>
            </li> -->
           <!--  <li class="nav-item">
              <a href="company_type.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Company Type</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="item_category.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="item_type.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Type</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="item_info.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="division.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Division</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="department.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Department</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="designation.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Designation</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>

<?php if($_SESSION['access_permission'] == "Super Admin"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/SIMEC-Group.png" alt="AdminLTE Logo" style="border-radius:10%;" class="brand-image  elevation-3"
    style="opacity: .8">
    <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Logistics & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="requisition.php" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              Requisition
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="request_projects.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                  Project Request
                <!-- <span class="badge badge-info right users_req_item"></span> -->
              </p>
            </a>
          </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
            <p> Store
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" <?php if(@$_GET[btn] == 2) {?>style="display: block;" <?php } ?>>

            <li class="nav-item">
              <a href="reports.php?btn=2" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Reports </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="user_accounts.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User Accounts
             <!--  <span class="badge badge-info right total_users"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>MASTER / SETTINGS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" <?php if(@$_GET[btn] == 1) {?>style="display: block;" <?php } ?>>
            <li class="nav-item">
              <a href="access_level.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Access Level</p>
              </a>
            </li>
           <!--  <li class="nav-item">
              <a href="company_type.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Company Type</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="item_category.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="item_type.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Type</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="item_info.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="division.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Division</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="department.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Department</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="designation.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Designation</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>

<?php if($_SESSION['access_permission'] == "Users"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/logo.png" alt="AdminLTE Logo" style="border-radius:5%;"class="brand-image  elevation-3"
    style="opacity: .8">
    <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Log & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="requisition.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>Requisition<!-- <span class="badge badge-info right user_total_req"> --></span></p>
            </a>
          </li>
           <li class="nav-item">
            <a href="request_items.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                New Item Request
                <!-- <span class="badge badge-info right users_req_item"></span> -->
              </p>
            </a>
          </li>
         <!--  <li class="nav-item">
            <a href="request_projects.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                  Project Request
              </p>
            </a>
          </li> -->
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>

<?php if($_SESSION['access_permission'] == "Division Head"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/logo.png" alt="AdminLTE Logo" style="border-radius:10%;"class="brand-image  elevation-3"
    style="opacity: .8">
    <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Logistics & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if($_SESSION['division_id'] == '8'){?>
         <li class="nav-item">
          <a href="all_requisition.php" class="nav-link">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
              All Division's Req.
             <!--  <span class="badge badge-info right div_total_req"></span> -->
            </p>
          </a>
        </li>
      <?php } ?>
        <li class="nav-item">
          <a href="requisition.php" class="nav-link">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
              Requisition
             <!--  <span class="badge badge-info right div_total_req"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="request_items.php" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              New Item Request
             <!--  <span class="badge badge-info right t_req_item"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="request_projects.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                  Project Request
                <!-- <span class="badge badge-info right users_req_item"></span> -->
              </p>
            </a>
          </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>

<?php if($_SESSION['access_permission'] == "Support"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/logo.png" alt="AdminLTE Logo" style="border-radius:10%;"class="brand-image  elevation-3"
    style="opacity: .8">
    <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Logistics & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>      
        <li class="nav-item">
          <a href="requisition.php" class="nav-link">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
              Requisition
             <!--  <span class="badge badge-info right div_total_req"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="request_items.php" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              New Item Request
             <!--  <span class="badge badge-info right t_req_item"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="request_projects.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                  Project Request
                <!-- <span class="badge badge-info right users_req_item"></span> -->
              </p>
            </a>
          </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>

<?php if($_SESSION['access_permission'] === "Department Head" || $_SESSION['access_permission'] === "Checker"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/logo.png" alt="AdminLTE Logo" style="border-radius:10%;"class="brand-image  elevation-3"
    style="opacity: .8">
    <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Logistics & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="requisition.php" class="nav-link">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
              Requisition
             <!--  <span class="badge badge-info right div_total_req"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="request_items.php" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              New Item Request test
             <!--  <span class="badge badge-info right t_req_item"></span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="request_projects.php" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                  Project Request
                <!-- <span class="badge badge-info right users_req_item"></span> -->
              </p>
            </a>
        </li>

          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>

<?php if($_SESSION['access_permission'] === "Store Admin" || $_SESSION['access_permission'] === "log-1" || $_SESSION['access_permission'] === "log-2" || $_SESSION['access_permission'] === "log-3" || $_SESSION['access_permission'] === "log admin" || $_SESSION['access_permission'] === "purchaser"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/logo.png" alt="AdminLTE Logo" style="border-radius:10%;"class="brand-image  elevation-3"
    style="opacity: .8">
    <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Logistics & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if ($_SESSION['access_permission'] === "purchaser") {?>
            <li></li>
         <?php }
          else
          {?>
          <li class="nav-item">
          <a href="all_requisition.php" class="nav-link">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
              All Division's Req.
             <!--  <span class="badge badge-info right div_total_req"></span> -->
            </p>
          </a>
        </li>

         <?php }
          ?>
          <li class="nav-item">
            <a href="requisition.php" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Requisitions
                <!-- <span class="badge badge-info right store_total_req"></span> -->
              </p>
            </a>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p> Store
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" <?php if(@$_GET[btn] == 2) {?>style="display: block;" <?php } ?>>
              <li class="nav-item">
                <a href="material_receive.php?btn=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Metarial Receive </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reports.php?btn=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Reports </p>
                </a>
              </li>
            </ul>
          </li>
         <!--  <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>Items Configuration
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" <?php if(@$_GET[btn] == 1) {?>style="display: block;" <?php } ?>>            
            <li class="nav-item">
              <a href="item_category.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="item_type.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Type</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="item_info.php?btn=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Info</p>
              </a>
            </li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a href="request_items.php" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              New Item Request
            </p>
          </a>
        </li>
       <li class="nav-item">
          <a href="request_projects.php" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
                Project Request
            </p>
          </a>
        </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>


<?php if($_SESSION['access_permission'] == "Store Keeper"){?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="images/logo.png" alt="AdminLTE Logo" style="border-radius:10%;"class="brand-image  elevation-3"
    style="opacity: .8">
   <span style="font-size: 16px; " class="brand-text font-weight-light"><b>Logistics & Supply</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/default_user.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> Name : <?php echo $_SESSION['employee_name']; ?></a>
        <a href="#" class="d-block"> Role : <?php echo $_SESSION['access_permission']; ?></a>
        <a href="#" class="d-block"> ID : <?php echo $_SESSION['employee_id']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Dashboard
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="requisition.php" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              Requisition
              <!-- <span class="badge badge-info right">count</span> -->
            </p>
          </a>
        </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php } ?>


