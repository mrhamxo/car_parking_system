<?php
$conn=mysqli_connect("localhost","root","","car_parking_system");
if(!$conn){
//header("Location: --/errors/db.php");
die("Sorry Connection Error".mysqli_connect_error());
}else{
header("Ok Connection Successfully");
}
?>