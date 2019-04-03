<?php
include '../includes/connect.php';
	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_role/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE users SET Role = '$value' WHERE U_Id = $key;";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_memb/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE users SET Membership_type = '$value' WHERE U_Id = $key;";
			$con->query($sql);
		}
			
	}
header("location: ../users.php");
?>