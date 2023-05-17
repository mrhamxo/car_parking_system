<?php
include('config/dbconn.php');

$park_toggleId = $_POST['park_toggleId'];  
$sql = "SELECT * FROM parks WHERE pid = $park_toggleId";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$status = $data['p_status'];

if($status == '1'){
    $status = '0';
}
else{
    $status = '1';
}

$update = "UPDATE parks SET p_status = '$status' WHERE pid = $park_toggleId";
$res1 = mysqli_query($conn, $update);

if($res1){
    echo $status;
}

?>