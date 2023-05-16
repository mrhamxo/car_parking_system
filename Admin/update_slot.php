<?php
include('config/dbconn.php');
// updating for manage park slot
if(isset($_POST['update_btn'])){
$edit_slot_id = $_POST['slot_id'];
$edit_slot_name = $_POST['slot_name'];
$edit_selected_park = $_POST['selected_park'];
$edit_availability_status = $_POST['slot_status'];
//$sql1 = "UPDATE `park_slot` SET `slot_name`='{$edit_slot_name}',`selected_park`='{$edit_selected_park}',`availability_status`='{$edit_availability_status}' WHERE slot_id='$edit_slot_id'";
$sql="UPDATE `park_slot` SET `slot_name`='$edit_slot_name',`selected_park`='$edit_selected_park',`availability_status`='$edit_availability_status' WHERE slot_id='$edit_slot_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location: manage_slots.php");
}
else {
    die(mysqli_error($conn));
}
}
?>