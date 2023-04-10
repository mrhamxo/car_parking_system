<?php
session_start();
include("config/dbconn.php");

if($conn){
    // echo 'Database connected';
}
else{
    header("location: connectdb.php");
}

if(!$_SESSION['user_name']){
    header('location: login.php');
}
?>