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
                            <h1 class="m-0">
                                Edit Users
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="user_register_edit.php">Register Users</a></li>
                                <li class="breadcrumb-item active">Edit Users</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- <div class="card-header">
                            </div> -->
                            <div class="card-body">
                                <div class="container">
                                    <form action="user_updatedata.php" method="POST">
                                        <?php
                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM `user` WHERE id={$id}";
                                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="user_name" value="<?php echo $row['user_name'] ?>" class="form-control" placeholder="Please Enter Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Please Enter Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_type">User Type</label>
                                                <input type="number" name="user_type" value="<?php echo $row['user_type'] ?>" class="form-control" placeholder="Please Enter User Type">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="Password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Please Enter Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="edit_btn" class="form-control btn btn-primary" value="Update User">
                                            </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>