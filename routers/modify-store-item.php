<?php
include '../includes/connect.php';
	foreach ($_POST as $key => $value)
	{
		$key2=$key;
		$iid = strtok($key2, "_");
 		$sid =  strtok("_");
 		//$temp= strtok("_");;
 		
 		if($iid!='action' and $iid!='discount' and $iid!='quantity' and $sid!='action' and $sid!='discount' and $sid!='quantity' ){

		if(preg_match("/[0-9]+_discount/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			//$sql = "UPDATE item SET Name = '$value' WHERE S_Id = $key;";
			$sql="UPDATE sold_by set Discount='$value' WHERE S_Id = '$sid' and I_Id= '$iid';";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_quantity/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql="UPDATE sold_by set Available_qty='$value' WHERE S_Id = $sid and I_Id=$iid;";
			//$sql = "UPDATE item SET Manf_by = '$value' WHERE I_Id = $key;";
			$con->query($sql);
			}
		}
	}
	}
header("location: ../admin-page.php");
?>