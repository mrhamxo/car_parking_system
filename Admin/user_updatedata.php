<?php
include('config/dbconn.php');

$user_id = $_POST['id'];
$edit_username = $_POST['user_name'];
$edit_email = $_POST['email'];
$edit_usertype = $_POST['user_type'];
$edit_password = $_POST['password'];

    $sql = "UPDATE `user` SET user_name='{$edit_username}', email='{$edit_email}', user_type='{$edit_usertype}', password='{$edit_password}' WHERE id='{$user_id}'";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

    header("location: all_users.php");
    
    mysqli_close($conn);
?>