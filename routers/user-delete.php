<?php
include '../includes/connect.php';
$uid = $_GET['uid'];
$sql = "update users set deleted = 1 where U_Id='$uid';";
$result = mysqli_query($con, $sql);
header("location: ../users.php")
?>