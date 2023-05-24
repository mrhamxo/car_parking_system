<?php
session_start();
if(isset($_SESSION['user'])){
  header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car_parcking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    body {
        background-color: lightcyan;
    }

    label {
        color: white;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-xl-4 col-lg-4 col-md-4 mx-auto">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                        </div>
                        <form class="form pt-4" action="loginprocess.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control" name="user" id="user_name"
                                    placeholder="Please Enter User Name">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="text" class="form-control" id="Password" placeholder="Password"
                                    name="password"><br>
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>