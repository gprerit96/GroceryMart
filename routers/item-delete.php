<?php
include '../includes/connect.php';
$iid = $_GET['iid'];
$sql = "update item set deleted = 1 where I_Id='$iid';";
$result = mysqli_query($con, $sql);
header("location: ../admin-page.php")
?>