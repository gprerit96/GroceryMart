<?php
include '../includes/connect.php';
$email = $_SESSION['email'];
$userid = $_SESSION['user_id'];

$sid = $_GET['sid'];
$iid = $_GET['iid'];

$sql_edit_cart = "delete from cart where U_Id = '$userid' and I_Id ='$iid' and S_Id= '$sid';";

$con->query($sql_edit_cart);

header("location: ../showcart.php")
?>