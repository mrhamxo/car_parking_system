<?php
include('includes/header.php');
session_start();
if (isset($_SESSION['user'])) {
    header('location:index.php');
}
?>

<div class="col-xl-4 col-lg-4 col-md-4 mx-auto">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
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
                </div>
                <form class="user" action="loginprocess.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="user" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
                    <button type="submit" name="Login" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>