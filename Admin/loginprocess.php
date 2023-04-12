<?php
include("config/dbconn.php");
if(isset($_POST['login'])){
 $email=$_POST['Email'];
 $Password=$_POST['password']; 
 $sql="SELECT *FROM tbl_admin WHERE email='$email' AND password='$Password'";
 $check=mysqli_query($conn,$sql);
 $result=mysqli_fetch_array($check);
 $user_email=$result['email'];
 if(mysqli_num_rows($check)>0){
  if($result['user_type']=='1'){
    session_start();
    $_SESSION['admin']=$user_email;
   header('location:index.php');
   }
 }
}
?>