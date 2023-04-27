<?php
include("config/dbconn.php");

if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $Password = $_POST['password'];

  $sql = "SELECT *FROM tbl_admin WHERE email='$email' AND password='$Password'";
  $check = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($check);

  $user_email = $result['email'];

  if (mysqli_num_rows($check) > 0) {

    if ($result['user_type'] == '1') {
      if ($result['admin_status'] == 1) {
        session_start();
        $_SESSION['admin'] = $user_email;
        header('location:index.php');
      } else {
        echo "Please contact to admin section";
      }
    }
  }
}






// include("config/dbconn.php");
// if (isset($_POST['login'])) {

//   $user = $_POST['user'];
//   // $email = $_POST['email'];
//   $password = $_POST['password'];

//   $sql="SELECT * FROM tbl_admin WHERE user_name='$user' AND password='$password'";
//   $result = mysqli_query($conn, $sql);
//   $usertypes = mysqli_fetch_assoc($result);

//   if ($usertypes['user_type'] == 'admin') {

//     $_SESSION['user_name'] = $user;
//     header('location: index.php');
//   } 
//   // else if ($usertypes['usertype'] == 'user') {

//   //   $_SESSION['username'] = $email_login;
//   //   if ($usertypes['status'] == 1) {
//   //     header('location:../user/dashboard.php');
//   //   } else {
//   //     echo "Please contact to admin";
//   //   }
//   // } 
//   else {
//     $_SESSION['user_status'] = 'email id and password are invalid';
//     header('location: login.php');
//   }
// };
