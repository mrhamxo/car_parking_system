<?php
include('config/dbconn.php');

// updating for manage park
$edit_park_id = $_POST['pid'];
$edit_park_name = $_POST['park_name'];
$edit_address = $_POST['address'];
$sql = "UPDATE `parks` SET `pid`='{$edit_park_id}',`park_name`='{$edit_park_name}',`address`='{$edit_address}' WHERE pid='{$edit_park_id}'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location: manage_parks.php");
} else {
    die(mysqli_error($conn));
}
