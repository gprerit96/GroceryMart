<?php
	include '../includes/connect.php';


	$user_id = $_SESSION['user_id'];
	$item_id = $_GET['link'];
	// echo $item_id;
	// echo "<br>";

	foreach($_POST as $key=>$value)
	{
		if($key!= "action"){
			echo $key;
			echo "<br>";
			$sql_insert = "insert into cart values('$user_id','$item_id','$key','$value')" ;
			$result = mysqli_query($con, $sql_insert);
		}
	}
	header("location: ../index.php");
?>