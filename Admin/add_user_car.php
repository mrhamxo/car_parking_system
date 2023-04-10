<?php
include('config/dbconn.php');
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Vehicle</a></li>
                                <li class="breadcrumb-item active">Add User Car</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Add </strong> User car
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php
                            if (isset($_POST["submit"])) {
                                $par_address = $_POST['park_address'];
                                $par_slots = $_POST['park_slots'];
                                $par_area = $_POST['park_area'];
                                $slot_status = $_POST['slot_status'];
                                $sql = "INSERT INTO `user_car` (`parking_address`, `parking_slots`, `parking_area`, `status`, `action`) VALUES ('$par_address', '$par_slots', '$par_area', '1', '0')";
                                $res = mysqli_query($conn, $sql);
                                if ($res) {
                                    // header("location:user_car.php");
                                }
                            }
                            ?>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Select Parking Slots</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="park_slots" id="catename" class="form-control">
                                        <option value="0">Select Parking Slots</option>
                                        <?php
                                        $sql = "SELECT * FROM park_slot";
                                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['slot_id'] ?>"><?php echo $row['slot_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Parking Address</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="vehcomp" name="park_address" class="form-control" placeholder="Enter Parking Address" required="true"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Select Parking Slots</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="slot_status" id="catename" class="form-control">
                                        <option value="0">Select Slots Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Parking Area</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="vehreno" name="park_area" class="form-control" placeholder="Registration Number" required="true"></div>
                            </div>
                            <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit">Add</button></p>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>
<?php
include('includes/footer.php');
?>