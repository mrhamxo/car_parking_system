<?php
session_start();
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
} else {
    header('location:login.php');
}
?>
<?php
include('config/dbconn.php');

$id = $_GET['id'];
$status = $_GET['user_status'];

$sql = "UPDATE `user` SET user_status = $status WHERE id = $id";
$result = mysqli_query($conn, $sql);

header("location: all_users.php");
?>