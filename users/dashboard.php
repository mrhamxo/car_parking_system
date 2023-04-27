<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('location: login.php');
}

include('config/dbconn.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
<<<<<<< HEAD
=======

>>>>>>> d8dcb2597998c835925698acbee85267b9d8efeb
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
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                        <li class="breadcrumb-item active"><?php echo $user; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
<<<<<<< HEAD
        </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
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
</section>
=======
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $sql1 = "SELECT * FROM user_car JOIN park_slot WHERE user_car.parking_slots=park_slot.slot_id";
                        // $sql1 = "SELECT * FROM park_slot WHERE 1";
                        $res = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <?php
                            if ($row['availability_status'] == 'unavailable') {
                            ?>
                                <div class="col-2 p-4 bg-danger text-white m-2">
                                    <ul class="text-start">
                                        <li><?php echo $row['id'] . "<br>"; ?></li>
                                        <li><?php echo $row['slot_name'] . "<br>"; ?></li>
                                        <li><?php echo $row['parking_address'] . "<br>"; ?></li>
                                        <li><?php echo $row['parking_area'] . "<br>"; ?></li>
                                    </ul>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="col-2 p-4 bg-success text-white m-2">
                                    <ul class="text-start">
                                        <li><?php echo $row['slot_name'] . "<br>"; ?></li>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div><!-- /.container-fluid -->
    </div>
>>>>>>> d8dcb2597998c835925698acbee85267b9d8efeb
</div>
<?php
include('includes/footer.php');
?>