<?php
include '../includes/connect.php';
	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_name/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET Name = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_manager/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET Manager = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_street/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET A_street = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_city/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET A_city = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_state/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET A_state = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_pin/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET A_PIN = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_email/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET Email = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_contact/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE store SET Phone_no = '$value' WHERE S_Id = $key;";
			$con->query($sql);
			}
		}
		// if(preg_match("/[0-9]+_price/",$key)){
		// 	$key = strtok($key, '_');
		// 	$sql = "UPDATE store SET Name = '$value' WHERE S_Id = $key;";
		// 	$con->query($sql);
		// }
		// if(preg_match("/[0-9]+_hide/",$key)){
		// 	if($_POST[$key] == 1){
		// 	$key = strtok($key, '_');
		// 	$sql = "UPDATE store SET Name = '$value' WHERE S_Id = $key;";
		// 	$con->query($sql);
		// 	} else{
		// 	$key = strtok($key, '_');
		// 	$sql = "UPDATE store SET Name = '$value' WHERE S_Id = $key;";
		// 	$con->query($sql);			
		// 	}
		// }
	}
header("location: ../admin-page.php");
?>