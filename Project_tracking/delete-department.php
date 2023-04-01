<?php
include 'api/connection.php';
$data = $_GET['id'];
mysqli_query($con,"delete from department where department_id = '$data'");
header("location:department.php");
?>