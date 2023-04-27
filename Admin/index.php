<?php
session_start();
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
} else {
    header('location:login.php');       
}
?>
<?php
include('config/dbconn.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>    
                        <li class="breadcrumb-item"><a href="adm_logout.php">Logout</a></li>
                        <li class="breadcrumb-item active"><?php echo $admin; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Total parking slot</p>
                            <?php
                            $sql = "SELECT
                                COUNT(if(availability_status='1' && availability_status='0', 1, 0)) as slot
                                FROM `park_slot`";

                            $result = mysqli_query($conn, $sql);

                            while ($query_array = mysqli_fetch_array($result)) {
                                $slot = $query_array['slot'];

                                echo '<h4 class="font-weight-bolder">' . $slot . '</h4>';
                            }
                            ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p>Available park slot</p>
                            <?php
                            $sql = "SELECT
                                    COUNT(if(availability_status='0', 1, NULL)) as slot
                                    FROM `park_slot`";

                            $result = mysqli_query($conn, $sql);

                            while ($query_array = mysqli_fetch_array($result)) {
                                $slot = $query_array['slot'];

                                echo '<h4 class="font-weight-bolder">' . $slot . '</h4>';
                            }
                            ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <p>Unavailable park slot</p>
                            <?php
                            $sql = "SELECT
                                COUNT(if(availability_status='1', 0, NULL)) as slot
                                FROM `park_slot`";

                            $result = mysqli_query($conn, $sql);

                            while ($query_array = mysqli_fetch_array($result)) {
                                $slot = $query_array['slot'];

                                echo '<h4 class="font-weight-bolder">' . $slot . '</h4>';
                            }
                            ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">


            </div>
        </div>
    </section>
</div>
<?php
include('includes/footer.php');
?>