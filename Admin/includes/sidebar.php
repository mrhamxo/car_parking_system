<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!--div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div-->
      <div class="info">
        <a href="#" class="d-block">
          <h1>Admin</h1>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Vehicle Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_category.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Add Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manage_category.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Manage Category</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="add_vehicle.php" class="nav-link">
            <i class="nav-icon fa fa-car"></i>
            <p>Add Vehicle</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Manage Vehicle
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="manage_in_vehicle.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Manage In Vehicle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manage_out_vehicle.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Manage Out Vehicle</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Parking
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_parking.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Add Parking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manage_parking.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Manage Parking</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Parking Slot
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_slot.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Add Slot</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manage_slot.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Manage Slot</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-car"></i>
            <p>
              Manage User Car
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_user_car.php" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>Add User Car</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="user_car.php" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>User Car</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="all_users.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>Register User</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>