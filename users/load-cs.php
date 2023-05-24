<?php

	$conn = mysqli_connect("localhost","root","","car_parking_system") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM parks";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['pid']}'>{$row['park_name']}</option>";
		}
	}else if($_POST['type'] == "stateData"){
		$sql = "SELECT * FROM park_slot WHERE selected_park = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['slot_id']}'>{$row['slot_name']}</option>";
		}
	}

	echo $str;
 ?>
