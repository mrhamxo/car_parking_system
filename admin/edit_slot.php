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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Parking Slot</a></li>
                                <li class="breadcrumb-item active">Edit Slots</li>
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
                                <strong>Edit </strong>Slots
                            </div>
                            <?php
                            $edit_slot = $_GET['id'];
                            $sql = "SELECT * FROM park_slot WHERE slot_id = {$edit_slot}";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="card-body card-block">
                                <form action="update_data.php" method="POST" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slot Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" id="" name="" class="form-control"
                                                value="<?php echo $row['slot_id'] ?>">
                                            <input type="text" id="catename" name="slot_name"
                                                value="<?php echo $row['slot_name'] ?>" class="form-control"
                                                placeholder="Enter Slot Name" required="true">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Select Park</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <?php
                                                    $sql1 = "SELECT * FROM parks";
                                                    $result1 = mysqli_query($conn, $sql1);

                                                    echo '<select class="form-control" name="selected_park" required>';
                                                    echo '<option value="" selected disabled>Select Park</option>';
                                                    if (mysqli_num_rows($result1) > 0) {
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                                            if ($row['selected_park'] == $row1['pid']) {
                                                                $select = "selected";
                                                            } else {
                                                                $select = "";
                                                            }
                                                            echo "<option {$select} value='{$row1['pid']}'>{$row1['park_name']}</option>";
                                                        }
                                                        echo "</select>";
                                                    }
                                                    ?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slot
                                                Availability</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="slot_status" required>
                                                <option selected disabled>Select one</option>
                                                <option value="0">Available</option>
                                                <option value="1">Unavailable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p style="text-align: center;">
                                        <button type="submit" name="update_btn"
                                            class="btn btn-primary btn-sm">Update</button>
                                    </p>
                                </form>
                            </div>
                            <?php
                                }
                            }
                            ?>
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