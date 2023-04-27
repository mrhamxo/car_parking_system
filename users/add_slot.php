<?php
include('config/dbconn.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
echo "<script>if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
    }  
    </script>";
/*
if(isset($_POST['slot_btn'])){
   echo  $slot_name = $_POST['slot_name'];
   echo  $slot_status = $_POST['slot_status'];
    $sql = "INSERT INTO `park_slot`(`slot_name`, `slot_status`) VALUES ('$slot_name', '$slot_status')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        header("location:manage_slot.php");
        // echo "Data inserted successfully";
        // mysqli_close($conn);
    } else {
        die(mysqli_error($conn));
    }
    // header('location: add_slot.php');
}
*/
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
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_slot.php">Parking Slot</a></li>
                                <li class="breadcrumb-item active">Add Parking Slot</li>
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
                                <strong>Add </strong>Parking Slot
                            </div>
                            <?php
                            if(isset($_POST['slot_btn'])){
                                 $slot_name=$_POST['slot_name'];
                                 $slot_status=$_POST['slot_status'];
                                 $sql="INSERT INTO `park_slot` (`slot_name`, `slot_status`) VALUES ('$slot_name', '$slot_status')";
                                 $result=mysqli_query($conn,$sql);
                                 if($result){
                                 echo "<script>
                                 window.location.href =('manage_slot.php');
                                 </script>";
                                 }
                                }
                            ?>
                            <div class="card-body card-block">
                                <form action="" method="POST" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slot Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="slot_name" class="form-control"
                                                placeholder="Enter Slot Name" required="true">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slot Status</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="slot_status" required>
                                                <option value="" selected>Select one</option>
                                                <option value="1">1</option>
                                                <option value="0">0</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p style="text-align: center;">
                                        <button type="submit" name="slot_btn"
                                            class="btn btn-primary btn-sm">Add</button>
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