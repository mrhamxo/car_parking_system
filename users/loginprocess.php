
<?php
include("security.php");
include("config/dbconn.php");
if (isset($_POST['Login'])) {
    // $email_login = $_POST['email'];
    $user=$_POST['user'];
    $password = $_POST['password'];

    $sql="SELECT *FROM `user` WHERE user_name = '$user' AND password = '$password'";
    $check=mysqli_query($conn,$sql);
    $usertypes = mysqli_fetch_assoc($check);

    if ($usertypes['user_type'] == 'admin') {

        $_SESSION['user_name'] = $user;
        header('location:index.php');

    } else if ($usertypes['user_type'] == 'user') {

            $_SESSION['user_name'] = $user;
            if($usertypes['status'] == 1){
                header('location: dashboard.php');

            }else{
                echo "Please contact to admin";
            }
    } else {
        $_SESSION['status'] = 'email id and password are invalid';
        header('location: login.php');
    }
};
?>