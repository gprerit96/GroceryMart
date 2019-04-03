<?php
include '../includes/connect.php';
$sid = $_GET['sid'];
$sql = "update store set deleted = 1 where S_Id='$sid';";
$result = mysqli_query($con, $sql);
header("location: ../admin-page.php")
?>