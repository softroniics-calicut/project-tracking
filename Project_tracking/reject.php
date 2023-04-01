<?php 
include 'api/connection.php';
$id = $_GET['id'];
mysqli_query($con,"update coordinators set status='2' where co_id ='$id'");
header("location:view-coordinators.php");
?>
 