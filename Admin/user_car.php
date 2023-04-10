<?php
session_start();
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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="user_car.php">Car</a></li>
                                <li class="breadcrumb-item active">User Car</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Add User car
                    <a class="btn btn-primary float-right" href="add_user_car.php">Add User Car</a>

                </h6>
            </div>
            <div class="card-body">
                <?php
                // if (isset($_SESSION['success']) && ($_SESSION['success']) != '') {
                //     echo '<h2 class="my-2 bg-primary text-white">' . $_SESSION['success'] . ' </h2>';
                //     unset($_SESSION['success']);
                // }
                // if (isset($_SESSION['status']) && ($_SESSION['status']) != '') {
                //     echo '<h2 class="my-2 bg-danger text-white">' . $_SESSION['status'] . ' </h2>';
                //     unset($_SESSION['status']);
                // }
                ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Parking Address</th>
                            <th scope="col">Parking Slots</th>
                            <th scope="col">Parking Area</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM user_car JOIN park_slot WHERE user_car.parking_slots = park_slot.slot_id";
                        $res = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['parking_address']; ?></td>
                                <td><?php echo $row['slot_name']; ?></td>
                                <td><?php echo $row['parking_area']; ?></td>
                                <td>
                                    <?php if ($row['status'] == '1') { ?>
                                        <span class="badge bg-warning p-2 text-white">Active</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger p-2 text-white">Inactive</span>
                                    <?php } ?>
                                </td>
                                <td><a href="delete.php" class="btn btn-primary" nam="delete" value="<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- end container fluid -->
</div>
<?php
include('includes/footer.php');
?>