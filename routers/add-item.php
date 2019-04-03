<?php
include '../includes/connect.php';

$name = $_POST['name'];
$manf_by = $_POST['manf_by'];
$type = $_POST['type'];
$price = $_POST['price'];
$details = $_POST['details'];
$sql = "INSERT INTO item(Name, Manf_by, Type, Price, Details) VALUES ('$name', '$manf_by', '$type', '$price','$details')";
$con->query($sql);
header("location: ../admin-page.php");
?>