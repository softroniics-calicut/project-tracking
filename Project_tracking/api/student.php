<?php

include 'connection.php';
$name = $_POST['name'];
$place = $_POST['place'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$password = $_POST['password'];
mysqli_query($con, "INSERT INTO login(username,password,type)values('$username','$password','student')");
$log = mysqli_insert_id($con);
$sql = mysqli_query($con, "INSERT INTO student(login_id,name,email,mobile,place)values('$log','$name','$email','$mobile','$place')");



if ($sql) {

  

    $myarray['message'] = 'Added';

    // $myarray['login_id'] = $row['login_id'];

    // $myarray['type'] = $row['type'];
  
} else {

  $myarray['message'] = 'Failed';
}
echo json_encode($myarray);
