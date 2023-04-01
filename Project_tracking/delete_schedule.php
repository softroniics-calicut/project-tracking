<?php
include 'api/connection.php';
$data = $_GET['id'];
mysqli_query($con,"delete from schedules where schedules_id = '$data'");
header("location:review.php");
?>