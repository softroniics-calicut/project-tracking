<?php

include 'connection.php';
$id = $_POST['id'];

$sql = mysqli_query($con, "SELECT * FROM project where project_id = '$id'");
$list = array();

if ($sql->num_rows>0) {
    while ($row = mysqli_fetch_assoc($sql)){

  

    $myarray['message'] = 'viewed';

    $myarray['topic'] = $row['topic'];

    $myarray['about'] = $row['about'];

    $myarray['file'] = $row['file'];

    $myarray['date'] = $row['date'];

   

    array_push($list, $myarray);
  
}
}
 else {

  $myarray['message'] = 'failed';
  array_push($list, $myarray);
}
echo json_encode($list);
