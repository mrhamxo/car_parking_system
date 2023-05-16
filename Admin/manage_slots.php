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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0"> <strong>Manage</strong> Slots</h4>

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Category</a></li>
                                <li class="breadcrumb-item active">Manage Slots</li>
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
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <!-- Add slot Button -->
                                    <a href="add_slots.php" class="btn btn-primary float-right">
                                        Add slot
                                    </a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S No:</th>
                                            <th>Slot Name</th>
                                            <th>Selected Park</th>
                                            <th>Availability</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $sql = "SELECT * FROM `park_slot`";
                                        $sql = "SELECT * FROM park_slot JOIN parks WHERE park_slot.selected_park = parks.pid";
                                     
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['slot_id']; ?></td>
                                            <td><?php echo $row['slot_name']; ?></td>
                                            <td><?php echo $row['park_name']; ?></td>
                                            <td>
                                                <?php if ($row['availability_status'] == '0') { ?>
                                                <span class="badge bg-green p-2 text-white">Available</span>
                                                <?php } else { ?>
                                                <span class="badge bg-danger p-2 text-white">Unavailable</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="edit_slot.php?id=<?php echo $row['slot_id'] ?>"
                                                    class="btn btn-primary" value="">Edit </a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

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