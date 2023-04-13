<?php
include("config/dbconn.php");
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
echo "<script>if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
    }  
    </script>";
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
                            <h1 class="m-0">
                                Add User Car
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="user_car.php">User Car</a></li>
                                <li class="breadcrumb-item active">Add User Car</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- <div class="card-header">
                            </div> -->
                            <div class="card-body">
                                <div class="container">
                                    <form action="" method="POST">
                                        <?php
                                        if (isset($_POST["user_car_btn"])) {
                                            $par_address = $_POST['park_address'];
                                            $par_slots = $_POST['park_slots'];
                                            $par_area = $_POST['park_area'];
                                            $sql = "INSERT INTO `user_car` (`parking_address`, `parking_slots`, `parking_area`, `status`, `action`) VALUES ('$par_address', '$par_slots', '$par_area', '1', '0')";
                                            $res = mysqli_query($conn, $sql);
                                            if ($res) {
                                                echo "<script>
                                                window.location.href =('user_car.php');
                                                </script>";
                                            }
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label for="name">Parking Address</label>
                                            <input type="text" name="park_address" class="form-control" placeholder="Please Enter Parking Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Parking Slots</label>
                                            <select class="form-control" name="park_slots">
                                                <option>Please Add Car Slots</option>
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
                                        <!-- <div class="form-group">
                                            <label for="u_type">User Car Status</label>
                                            <input type="number" name="car_status" class="form-control">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="area">Parking Area</label>
                                            <input type="text" name="park_area" class="form-control" placeholder="Please Enter Parking Area">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="user_car_btn" class="form-control btn btn-primary" value="Add User Car">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php
include('includes/footer.php');
?>