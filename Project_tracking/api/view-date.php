<?php

include 'connection.php';
$id = $_POST['id'];

$sql = mysqli_query($con, "SELECT * FROM schedules where group_id='1'");
$list = array();

if ($sql->num_rows>0) {
    while ($row = mysqli_fetch_assoc($sql)){

  

    $myarray['message'] = 'viewed';

    $myarray['group_id'] = $row['group_id'];

    $myarray['note'] = $row['note'];
    $myarray['date'] = $row['date'];
   
    array_push($list, $myarray);
  
}
}
 else {

  $myarray['message'] = 'failed';
  array_push($list, $myarray);
}
echo json_encode($list);
