<?php
session_start();
if(isset($_SESSION['user'])){
  $user=$_SESSION['user'];
}else{
header('location:login.php');
}
?>
<?php
include('config/dbconn.php');
include('includes/header.php');
include('includes/topbar.php');

?>
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
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="view-vehicle.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>View Vehicle</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                        <li class="breadcrumb-item active"><?php echo $user;?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="container" style="margin-left:70px">
           
                <div class="row">
                    <?php
    $sql1 = "SELECT *FROM user_car JOIN park_slot WHERE user_car.parking_slots=park_slot.slot_id;";
    $res = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($res)) {
        ?>
                    <?php
            if ($row['slot_status'] == '1') {
            ?>      
                    <div class="col-2 p-4 pb-4 bg-danger text-white m-2 text-center">
                        <?php  echo $row['id']."<br>"; ?>
                        <?php  echo $row['slot_name']."<br>"; ?>
                        <?php  echo $row['parking_address']."<br>"; ?>
                        <?php  echo $row['parking_area']."<br>"; ?>
                    </div>

                    <?php
            } else {
            ?>  
                    <div class="col-2 p-4 pb-4 bg-success text-white m-2 text-center">

                    </div>

                    <?php
            }
            ?>

                    <?php
        }

        ?>

                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
</div>
<?php
include('includes/footer.php');
?>