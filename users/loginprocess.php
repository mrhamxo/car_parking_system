<?php
include("config/dbconn.php");
if (isset($_POST['login'])) {
  $user = $_POST['user'];
  $Password = $_POST['password'];
  $sql = "SELECT *FROM user WHERE user_name='$user' AND password='$Password'";
  $check = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($check);
  $user_name = $result['user_name'];
  if (mysqli_num_rows($check) > 0) {
    if ($result['user_type'] == '0') {
      session_start();
      $_SESSION['user'] = $user_name;
      header('location:dashboard.php');
    }
  }
}
