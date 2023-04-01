<?php

include 'connection.php';
// $id = $_POST['id'];

$sql = mysqli_query($con, "SELECT * FROM notification");
$list = array();

if ($sql->num_rows>0) {
    while ($row = mysqli_fetch_assoc($sql)){

  

    $myarray['message'] = 'viewed';

    $myarray['title'] = $row['title'];

    $myarray['content'] = $row['content'];

   
    array_push($list, $myarray);
  
}
}
 else {

  $myarray['message'] = 'failed';
  array_push($list, $myarray);
}
echo json_encode($list);
