<?php
include 'api/connection.php';
session_start();
$id = $_SESSION['login_id'];

if(isset($_POST['sub'])){
    $note = $_POST['note'];
    
    $image = $_FILES['image']['name'];
    $image1 = $_FILES['image1']['name'];
    
    if ($image != "") {
	$filearray = pathinfo($_FILES['image']['name']);
	// var_dump($filearray);exit();

	$file1 = rand();
	$file_ext = $filearray["extension"];




	$filenew = $file1 . "." . $file_ext;
	move_uploaded_file($_FILES['image']['tmp_name'], "../../../Users/Administrator/StudioProjects/project_tracking/assets/images/" . $filenew);
  
  // move_uploaded_file($_FILES['image']['tmp_name'], "../img/" . $filenew);

	//var_dump($filenew);exit();

  

  $filearray = pathinfo($_FILES['image1']['name']);
// var_dump($filearray);exit();

$file1 = rand();
$file_ext = $filearray["extension"];




$filenew1 = $file1 . "." . $file_ext;
move_uploaded_file($_FILES['image1']['tmp_name'], "images/" . $filenew);

// move_uploaded_file($_FILES['image']['tmp_name'], "../img/" . $filenew);

//var_dump($filenew);exit();
}


    

$data = mysqli_query($con,"insert into uploads(p_id,note,file)values('$id','$note','$filenew')");
header('location:g_dashboard.php');


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Project Tracking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
  <?php
    include 'gheader.php';
  ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <?php
  include 'g_sidebar.php';
  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <a href="add-pro.php" class="btn btn-primary">add files</a><br><br>
      <div class="row">
       
      <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Schedules</h3>
            <form method="post" enctype="multipart/form-data">
              
            <div class="form-group">
                  <label class="control-label">note</label>
                  <input class="form-control" type="text" name="note" placeholder="Enter note" required>
                </div>
                <div class="form-group">
                  <label class="control-label">file</label>
                  <input class="form-control" type="file" name="image" placeholder="Enter note" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Please choose the same file once more</label>
                  <input class="form-control" type="file" name="image1" placeholder="Enter note" required>
                </div>
              
          
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" name="sub"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
   
     
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>