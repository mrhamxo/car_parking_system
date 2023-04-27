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
                                Register Users
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                                <li class="breadcrumb-item active">Register Users</li>
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
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="u_name" class="form-control" placeholder="Please Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="Email" class="form-control" placeholder="Please Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="u_type">User Type</label>
                                            <input type="number" name="u_type" class="form-control" placeholder="Please Enter User Type">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="Password" name="password" class="form-control" placeholder="Please Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="add_users" class="form-control btn btn-primary" value="Add User">
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['add_users'])) {
                                        $name = $_POST['u_name'];
                                        $email = $_POST['email'];
                                        $user_type = $_POST['u_type'];
                                        $password = $_POST['password'];
                                        $sql = "INSERT INTO `user` ( `user_name`, `email`, `user_type`, `password`) VALUES ('$name', '$email', '$user_type', '$password')";
                                        $res = mysqli_query($conn, $sql);
                                        if ($res) {
                                            echo '<script>window.location.href="all_users.php";</script>';
                                        }
                                    }
                                    ?>
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