<?php
include '../includes/connect.php';

$name = $_POST['name'];
$manager = $_POST['manager'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['pin'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$sql = "INSERT INTO store (Name, Manager, A_street, A_city, A_state, A_PIN, Email, Phone_no ) VALUES ('$name', '$manager', '$street', '$city', '$state', '$pin', '$email', '$contact');";
$result=$con->query($sql);
echo $result;
//header("location: ../admin-page.php");
?>