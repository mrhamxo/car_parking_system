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
                                $sql = "SELECT * FROM `parks` ORDER BY parks.pid;";

                                $res = mysqli_query($conn, $sql);


                                ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S No:</th>
                                            <th>Park name</th>
                                            <th>Total Slots</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($res) > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['pid']; ?></td>
                                            <td><?php echo $row['park_name']; ?></td>
                                            <td>
                                                <?php
                                                    $sql1 = "SELECT COUNT(selected_park) as all_slots FROM park_slot WHERE selected_park='{$row['pid']}'";
                                                    $res1 = mysqli_query($conn, $sql1);
                                                    if (mysqli_num_rows($res1) > 0) {
                                                        while ($row1 = mysqli_fetch_assoc($res1)) {
                                                    ?>
                                                <?php
                                                        if ($row1['all_slots'] == 0) {

                                                            echo 'no slot';
                                                        } else {
                                                            echo $row1['all_slots'];
                                                        }
                                                        ?>
                                                <?php
                                                        }
                                                    }
                                                    ?>
                                            </td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="<?Php echo $row['pid']?>"
                                                        <?php if ($row['p_status'] == '0') { echo "checked"; } ?>
                                                        onclick="toggleStatus(<?php echo $row['pid'] ?>)">
                                                    <label class="custom-control-label" for="<?Php echo $row['pid']?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="edit_park.php?id=<?php echo $row['pid'] ?>"
                                                    class="btn btn-primary" value="">Edit </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<h2 class='text-center'>No Record Found</h2>";
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                                <?php

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
<script>
function toggleStatus(id) {
     var id = id;
    $.ajax({
        url: "park_toggle.php",
        type: "POST",
        data: {
            park_toggleId: id,
        },
        success: function(result) {
            if (result == '0') {
                swal("DONE!", "Status is ON", "success");
            } else {
                swal("DONE!", "Status is OFF", "success");
            }
        },
    });
}
</script>