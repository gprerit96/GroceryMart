<?php
include '../includes/connect.php';

$status = $_POST['status'];
$id = $_POST['id'];
// echo $id;
$sql = "UPDATE orders SET status='$status', deleted=1 WHERE Order_Id=$id;";
 $result = $con->query($sql);
// echo $result;
header("location: ../orders.php");
?>