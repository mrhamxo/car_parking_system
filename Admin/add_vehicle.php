<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<?php
if(isset($_POST['submit']))
  {
    $parkingnumber=mt_rand(100000000, 999999999);
    $catename=$_POST['catename'];
    $vehcomp=$_POST['vehcomp'];
    $vehreno=$_POST['vehreno'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $enteringtime=$_POST['enteringtime'];     
    $query=mysqli_query($conn, "insert into  tblvehicle(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno')");
    if ($query) {
echo "<script>alert('Vehicle Entry Detail has been added');</script>";
echo "<script>window.location.href ='manage-incomingvehicle.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
    }
  }
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
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Vehicle</a></li>
                                <li class="breadcrumb-item active">Add Vehicle</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Add </strong> Vehicle
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="catename" id="catename" class="form-control">
                                        <option value="0">Select Category</option>
                                        <?php $query=mysqli_query($conn,"select * from tblcategory");
                                         while($row=mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <option value="<?php echo $row['VehicleCat'];?>">
                                            <?php echo $row['VehicleCat'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle
                                        Company</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="vehcomp" name="vehcomp"
                                        class="form-control" placeholder="Vehicle Company" required="true"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Registration Number</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="vehreno" name="vehreno"
                                        class="form-control" placeholder="Registration Number" required="true"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner
                                        Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="ownername" name="ownername"
                                        class="form-control" placeholder="Owner Name" required="true"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner
                                        Contact Number</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="ownercontno" name="ownercontno"
                                        class="form-control" placeholder="Owner Contact Number" required="true"
                                        maxlength="10" pattern="[0-9]+"></div>
                            </div>



                            <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm"
                                    name="submit">Add</button></p>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>
<?php
include('includes/footer.php');
?>