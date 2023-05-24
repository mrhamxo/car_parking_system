<?php
session_start();
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
} else {
    header('location:login.php');
}
?>
<?php
include("config/dbconn.php");
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
                                <li class="breadcrumb-item"><a href="manage_category.php">Category</a></li>
                                <li class="breadcrumb-item active">Manage Category</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Manage Category</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tr>
                                    <?php
                                    $sql="SELECT * FROM `vehicle_category`";
                                    $res=mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($res)>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                id="<?Php echo $row['id'] ?>"
                                                <?php if ($row['status'] == '1') { echo "checked";} ?>
                                                onclick="toggleStatus(<?php echo $row['id'] ?>)">
                                            <label class="custom-control-label"
                                                for="<?Php echo $row['id'] ?>"></label>
                                        </div>
                                        <?php // if ($row['availability_status'] == '0') { 
                                                    ?>
                                        <!-- <span class="badge bg-green p-2 text-white">Available</span> -->
                                        <?php // } else { 
                                                    ?>
                                        <!-- <span class="badge bg-danger p-2 text-white">Unavailable</span> -->
                                        <?php // } 
                                                    ?>
                                    </td>
                                    <?php
                                }
                                }
                                ?>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>
<?php
include('includes/footer.php');
?>
<script>
    function toggleStatus(id) {
        var id = id;
        $.ajax({
            url: "cat_toggle.php",
            type: "POST",
            data: {
                car_toggleId: id,
            },
            success: function(result) {
                if (result == '1') {
                    swal("DONE!", "Status is ON", "success");
                } else {
                    swal("DONE!", "Status is OFF", "success");
                }
            },
        });
    }
</script>