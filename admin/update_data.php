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

// updating for manage park slot
$edit_slot_id = $_POST['slot_id'];
$edit_slot_name = $_POST['slot_name'];
$edit_selected_park = $_POST['selected_park'];
$edit_availability_status = $_POST['availability_status'];

$sql1 = "UPDATE `park_slot` SET `slot_id`='{$edit_slot_id}',`slot_name`='{$$edit_slot_name}',`selected_park`='{$$edit_selected_park}',`availability_status`='{$$edit_availability_status}' WHERE slot_id='{$edit_slot_id}'";

$result1 = mysqli_query($conn, $sql1);
if ($result1) {
    header("location: manage_slots.php");
}
else {
    die(mysqli_error($conn));
}
