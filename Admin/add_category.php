<?php
include("config/dbconn.php");
?>
<?php
session_start();
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
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Category</a></li>
                                <li class="breadcrumb-item active">Add Category</li>
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
                                <strong>Add </strong> Category
                            </div>
                            <div class="card-body card-block">
                                <?php
                                if(isset($_POST['submit'])){
                                $cat_name=$_POST['catename'];
                                $sql="INSERT INTO tblcategory(vehiclecat) VALUES('$cat_name')";
                                $res=mysqli_query($conn,$sql);
                                if($res){
                                    echo "<script>alert('Category added successfully');</script>";
                                    echo "<script>window.location.href='manage_category.php'</script>";
                                }else{
                                 
                                   echo "<script>alert('Something Went Wrong. Please try again');</script>";
                                }
                            
                                }
                                ?>
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input"
                                                class=" form-control-label">Category Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="catename" name="catename"
                                                class="form-control" placeholder="Vehicle Category" required="true">
                                        </div>
                                    </div>
                                    <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm"
                                            name="submit">Add</button></p>
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