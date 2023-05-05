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
                            <h4 class="m-0"> <strong>Manage</strong> Parks</h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Category</a></li>
                                <li class="breadcrumb-item active">Manage Parks</li>
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
                                    <a href="add_parks.php" class="btn btn-primary float-right">
                                        Add Parks
                                    </a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <?php
                                // $sql = "SELECT parks.total_slots,parks.pid,park_slot.slot_name FROM `parks` INNER JOIN `park_slot` ON parks.pid = park_slot.selected_park;";
                                $sql = "SELECT *, COUNT(slot_name='selected_park') as all_slots FROM `parks` INNER JOIN `park_slot` ON parks.pid = park_slot.selected_park;";
                            
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S No:</th>
                                                <th>Park name</th>
                                                <th>Total Slots</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['pid']; ?></td>
                                                    <td><?php echo $row['park_name']; ?></td>
                                                    <td><?php echo $row['all_slots']; ?></td>
                                                    <td><?php echo $row['location']; ?></td>
                                                    <td>
                                                        <?php
                                                        // $row = 0;
                                                        if ($row) {
                                                        ?>
                                                            <span class="badge badge-success">Available</span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class="badge badge-danger">Unavailable</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <!-- <td>
                                                        <a href="#" class="btn btn-primary" name="delete" value="">Delete</a>
                                                    </td> -->
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                    echo "<h2 class='text-center'>No Record Found</h2>";
                                }
                                mysqli_close($conn);
                                ?>
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