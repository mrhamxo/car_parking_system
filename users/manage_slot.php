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
                            <h1 class="m-0">Manage Parking System</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Category</a></li>
                                <li class="breadcrumb-item active">Manage Add Slot</li>
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
                                    <a href="add_slot.php" class="btn btn-primary float-right">
                                        Select slot
                                    </a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Slot Id</th>
                                            <th>Slot Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `park_slot`";
                                        // $sql1 = "SELECT * FROM user_car JOIN park_slot WHERE user_car.parking_slots = park_slot.slot_id";
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['slot_id']; ?></td>
                                                <td><?php echo $row['slot_name']; ?></td>
                                                <td>
                                                    <?php if ($row['slot_status'] == 'available') { ?>
                                                        <span class="badge bg-warning p-2 text-white">available</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-danger p-2 text-white">unavailable</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['slot_status'] == 'available') { ?>
                                                        <button class="btn btn-primary" name="delete" value="">Select Slot</button>
                                                    <?php
                                                    } else { ?>
                                                        <button disabled class="btn btn-primary" name="delete" value="">Select Slot</button>
                                                    <?php
                                                    }
                                                    ?>
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