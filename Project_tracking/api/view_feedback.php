<?php

include 'connection.php';
// $id = $_POST['id'];

$sql = mysqli_query($con, "SELECT * FROM feedback join student on student.login_id = feedback.student_id ");
$list = array();

if ($sql->num_rows>0) {
    while ($row = mysqli_fetch_assoc($sql)){

  

    $myarray['message'] = 'viewed';

    $myarray['student'] = $row['name'];

    $myarray['feedback'] = $row['feedback'];

   
    array_push($list, $myarray);
  
}
}
 else {

  $myarray['message'] = 'failed';
  array_push($list, $myarray);
}
echo json_encode($list);
