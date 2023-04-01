<?php

include 'connection.php';
$id = $_POST['id'];

$sql = mysqli_query($con, "delete FROM project where project_id = '$id'");
$list = array();

if ($sql) {
  
    $myarray['message'] = 'deleted';

 
  

}
 else {

  $myarray['message'] = 'failed';
 
}
echo json_encode($myarray);
