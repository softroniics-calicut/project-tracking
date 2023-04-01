
<?php

include 'connection.php';

$feedback = $_POST['feedback'];
$student_id = $_POST['student_id'];
$sql = mysqli_query($con, "insert into feedback(student_id,feedback)values('$student_id','$feedback')");


if ($sql) {

 
    $myarray['message'] = 'Added';
} else {

  $myarray['message'] = 'Failed ';
}
echo json_encode($myarray);

?>