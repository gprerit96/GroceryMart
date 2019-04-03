<?php
include '../includes/connect.php';
$userid = $_SESSION['user_id'];
$cardno = htmlspecialchars($_POST['cardno']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$expirydate = htmlspecialchars($_POST['expirydate']);
$type_card = htmlspecialchars($_POST['type_card']);



$sql_insert= "insert into card_details values('$userid','$cardno','$firstname','$lastname','$expirydate','$type_card');";

$result = mysqli_query($con, $sql_insert);
header("location: ../place-order.php");




