
<?php

include 'connection.php';

$g_id = $_POST['g_id'];
$image = $_POST['image'];
$sql = mysqli_query($con, "insert into uploads(g_id,file)values('$g_id','$image')");


if ($sql) {

 
    $myarray['message'] = 'Added';
} else {

  $myarray['message'] = 'Failed ';
}
echo json_encode($myarray);

?>