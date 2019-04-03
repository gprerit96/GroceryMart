<?php
include '../includes/connect.php';
$userid = $_SESSION['user_id'];
$street = htmlspecialchars($_POST['street']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$pin = htmlspecialchars($_POST['pin']);
$phone = htmlspecialchars($_POST['phone']);



$sql_insert= "insert into user_add values('$userid','$street','$city','$state','$pin','$phone');";

$result = mysqli_query($con, $sql_insert);
header("location: ../details.php");




