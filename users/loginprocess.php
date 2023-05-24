<?php
include("config/dbconn.php");
if (isset($_POST['login'])) {

  $user = $_POST['user'];
  $Password = $_POST['password'];

  $sql = "SELECT *FROM user WHERE user_name='$user' AND password='$Password'";
  $result = mysqli_query($conn, $sql);
  $usertypes = mysqli_fetch_array($result);

  $user_name = $usertypes['user_name'];

  if (mysqli_num_rows($result) > 0) {

    if ($usertypes['user_type'] == '0') {
      if ($usertypes['user_status'] == 1) {

        session_start();
        $_SESSION['user'] = $user_name;
        header('location:./dashboard.php');
      } else {
        echo "<script>window.location.replace('./login.php');
              alert('Please Contact With Admin Sahab');        
              </script>";
        //header('location:./login.php');
      }
    }
  }
}
