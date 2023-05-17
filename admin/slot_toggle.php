<?php
include('config/dbconn.php');

$slot_toggleId = $_POST['slot_toggleId'];  
$sql = "SELECT * FROM park_slot WHERE slot_id = $slot_toggleId";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$status = $data['availability_status'];

if($status == '0'){
    $status = '1';
}
else{
    $status = '0';
}

$update = "UPDATE park_slot SET availability_status = '$status' WHERE slot_id = $slot_toggleId";
$res1 = mysqli_query($conn, $update);

if($res1){
    echo $status;
}

?>