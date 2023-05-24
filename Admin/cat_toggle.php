<?php
include('config/dbconn.php');
$cat_toggleId = $_POST['id'];
$sql = "SELECT * FROM `vehicle_category` WHERE id = $cat_toggleId";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$status = $data['status'];

if($status == '1'){
    $status = '0';
}
else{
    $status = '1';
}

$update = "UPDATE vehicle_category SET status = '$status' WHERE id = $cat_toggleId";
$res = mysqli_query($conn, $update);

if($res){
    echo $status;
}

?>