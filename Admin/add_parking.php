<?php
include('config/dbconn.php');
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
                            <h4 class="m-0"><strong>Manage</strong> Parking</h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Manage Parking</a></li>
                                <li class="breadcrumb-item active">Add Parking</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add </strong>Parking
                            </div>
                            <?php
                            if (isset($_POST['park_btn'])) {
                                $parking_name = $_POST['parking_name'];
                                $location = $_POST['location'];
                                $total_slot = $_POST['total_slot'];
                                $sql = "INSERT INTO `parking` (`parking_name`, `total_slot`, `location`) VALUES ('$parking_name', '$total_slot', '$location')";
                                $result = mysqli_query($conn, $sql);
                                // if ($result) {
                                //     echo "<script>
                                //  window.location.href =('manage_slot.php');
                                //  </script>";
                                // }
                            }
                            ?>
                            <div class="card-body card-block">
                                <form action="" method="POST" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Parking Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="parking_name" class="form-control" placeholder="Enter Park Name" required="true">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Total Slots</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="catename" name="total_slot" class="form-control" placeholder="Enter Total Slot in the Park" required="true">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Location</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="location" class="form-control" placeholder="Enter Park Location" required="true">
                                        </div>
                                    </div>
                                    <p style="text-align: center;">
                                        <button type="submit" name="park_btn" class="btn btn-primary btn-sm">Add</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- /.container-fluid -->
    </div>
</div>


<?php
include('includes/footer.php');
?>