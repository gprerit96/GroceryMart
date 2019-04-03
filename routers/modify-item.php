<?php
include '../includes/connect.php';
	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_name/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE item SET Name = '$value' WHERE I_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_manf_by/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE item SET Manf_by = '$value' WHERE I_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_type/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE item SET Type = '$value' WHERE I_Id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_price/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE items SET Price = $value WHERE id = $key;";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_details/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE item SET Details = '$value' WHERE I_Id = $key;";
			$con->query($sql);
			}
		}
	}
header("location: ../admin-page.php");
?>