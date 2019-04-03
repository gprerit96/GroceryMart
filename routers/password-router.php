<?php
include '../includes/connect.php';
$email = $_SESSION['email'];
$oldpassword = htmlspecialchars($_POST['old_password_edit']);
$newpassword = htmlspecialchars($_POST['new_password_edit']);


$sql_check ="select * from users where email ='$email' and password = '$oldpassword';";

$result = mysqli_query($con, $sql_check);

$count = mysqli_num_rows($result);

if($count == 1)
{

	$sql_update = "update users set password ='$newpassword' where email ='$email';";
	$result = mysqli_query($con, $sql_update);
	header("location: ../details.php");
}

else{

	header("location: ../details.php?msg=failed");
}


