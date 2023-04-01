<?php

include 'connection.php';
// $id = $_POST['id'];
$id = $_POST['id'];

$sql = mysqli_query($con, "SELECT * FROM uploads where u_id = '$id'");
$list = array();

if ($sql->num_rows>0) {
    while ($row = mysqli_fetch_assoc($sql)){

  

    $myarray['message'] = 'viewed';

    $myarray['file'] = $row['file'];

    $myarray['note'] = $row['note'];

   

   

    array_push($list, $myarray);
  
}
}
 else {

  $myarray['message'] = 'failed';
  array_push($list, $myarray);
}
echo json_encode($list);
