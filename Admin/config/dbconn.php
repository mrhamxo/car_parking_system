<?php
$host="localhost";
$user="root";
$password="";
$db="park1";
$conn=mysqli_connect($host,$user,$password,$db);
if(!$conn){
//header("Location: --/errors/db.php");
die("Sorry Connection Error".mysqli_connect_error());
}else{
header("Ok Connection Successfully");
}
?>