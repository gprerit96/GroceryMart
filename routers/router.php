<?php
include '../includes/connect.php';
$success=false;

$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' AND Role='Administrator' AND not deleted;");
while($row = mysqli_fetch_array($result))
{
	$success = true;
	$user_id = $row['U_Id'];
	$firstname = $row['Name_f'];
	$role= $row['Role'];
	$email = $row['Email'];
}
if($success == true)
{	
	session_start();
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['role'] = $role;
	$_SESSION['firstname'] = $firstname;
	$_SESSION['email'] = $email;

	header("location: ../admin-page.php");
}
else
{
	$result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' AND Role='Customer' AND not deleted;");
	while($row = mysqli_fetch_array($result))
	{
	$success = true;
	$user_id = $row['U_Id'];
	$lastname = $row['Name_l'];
	$firstname = $row['Name_f'];
	$role= $row['Role'];
	$email = $row['Email'];
	}
	if($success == true)
	{
		session_start();
		$_SESSION['customer_sid']=session_id();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['role'] = $role;
		$_SESSION['email'] = $email;
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;			
		header("location: ../index.php");
	}
	else
	{
		header("location: ../login.php");
	}
}
?>