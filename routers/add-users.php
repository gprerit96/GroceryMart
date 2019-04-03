<?php
include '../includes/connect.php';


$email = $_POST['email'];
$password = $_POST['password'];
$name_f = $_POST['name_f'];
$name_l = $_POST['name_l'];
$role = $_POST['role'];
$memb = $_POST['memb'];
$verified = 0;
$deleted = 0;
$sql = "INSERT INTO users (Email, Password, Name_f, Name_l, Role, Membership_type,verified,deleted) VALUES ('$email', '$password', '$name_f', '$name_l', '$role', '$memb', '$verified', '$deleted');";
$con->query($sql);

header("location: ../users.php");
?>