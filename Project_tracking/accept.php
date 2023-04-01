<?php 
include 'api/connection.php';
$id = $_GET['id'];
mysqli_query($con,"update coordinators set status='1' where co_id ='$id'");
header("location:view-coordinators.php");
?>
 