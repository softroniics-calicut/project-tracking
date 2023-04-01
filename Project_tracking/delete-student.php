<?php
include 'api/connection.php';
$data = $_GET['id'];
mysqli_query($con,"delete from student where student_id = '$data'");
header("location:manage-students.php");
?>