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
                                <li class="breadcrumb-item"><a href="manage_in_vehicle.php">Manage Vehicle</a></li>
                                <li class="breadcrumb-item active">Manage In Vehicle</li>
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
                            <strong class="card-title">Manage Incoming Vehicle</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>Id</th>
                                        <th>Parking Number</th>
                                        <th>Owner Name</th>
                                        <th>parking_slot</th>
                                        <th>Vehicle Reg Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql="SELECT tblvehicle.ID,tblvehicle.ParkingNumber,tblvehicle.OwnerName,park_slot.slot_id 
                                    FROM tblvehicle
                                    INNER JOIN park_slot
                                    WHERE tblvehicle.parking_slot=park_slot.slot_id";
                                    $query=mysqli_query($conn,$sql);
                                    $check=mysqli_fetch_array($query);
                                    if($check>0){
                                    while($row=mysqli_fetch_assoc($query)){
                                    ?>
                                <tr>
                                    <td><?php echo $row['ID'];?></td>
                                    <td><?php echo $row['ParkingNumber'];?></td>
                                    <td><?php echo $row['OwnerName'];?></td>
                                    <td><?php echo $row['parking_slot'];?></td>
                                    <td><?php echo $row['RegistrationNumber'];?></td>
                                    <td><a href=""
                                            class="btn btn-primary">View</a>

                                        <a href="" style="cursor:pointer"
                                            target="_blank" class="btn btn-warning">Print</a>
                                        <a href=""
                                            class="btn btn-danger"
                                            onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                                </tbody>
                       </table>
                       </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
</div>
</div>
<?php
include('includes/footer.php');
?>