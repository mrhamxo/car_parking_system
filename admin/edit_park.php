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
                            <h4 class="m-0"><strong>Edit</strong> Parks</h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Manage Parks</a></li>
                                <li class="breadcrumb-item active">Edit Parks</li>
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
                                <strong>Edit </strong>Parks
                            </div>
                            <?php
                            $edit_park = $_GET['id'];
                            $sql = "SELECT * FROM parks WHERE pid = {$edit_park}";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="card-body card-block">
                                        <form action="update_data.php" method="POST" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Park Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="hidden" name="pid" value="<?php echo $row['pid'] ?>" />
                                                    <input type="text" id="catename" name="park_name" value="<?php echo $row['park_name'] ?>" class="form-control" placeholder="Enter Park Name" required="true">
                                                </div>
                                            </div>
                                            <!-- <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Total Slots</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="catename" name="edit_total_slots" value="<?php echo $row['total_slots'] ?>" class="form-control" placeholder="Enter Total Slot" required="true">
                                                </div>
                                            </div> -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="catename" name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Enter Park address" required="true">
                                                </div>
                                            </div>
                                            <p style="text-align: center;">
                                                <button type="submit" name="edit_park_btn" class="btn btn-primary btn-sm">Update</button>
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