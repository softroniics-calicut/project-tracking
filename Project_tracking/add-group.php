<?php 
include 'api/connection.php';
$da = mysqli_query($con,"select * from department");
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $dept = $_POST['department'];
    $details = $_POST['details'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // var_dump($password);exit();
    $query = mysqli_query($con,"insert into login(username,password,type) values('$username','$password','group')");
    $log = mysqli_insert_id($con);
    mysqli_query($con,"insert into `group`(login_id,name,department_id,details)values('$log','$name','$dept','$details')");
    header("location:project_groups.php");
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
    include 'coo_header.php';
  ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <?php
  include 'coo_sidebar.php';
  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
      <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Add Project Groups</h3>
            <div class="tile-body">
              <form method="post">
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" name="name" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Department</label>
                    <select class="form-control" name="department" id="exampleSelect1" required>
                      <option aria-readonly="">Select Department</option>
                        <?php
                         while($dat = mysqli_fetch_assoc($da)){
                        ?>
                      <option value="<?php echo $dat['department_id'] ?>"><?php echo $dat['name'] ?></option>
                      <?php
                        }
                       ?>
                    </select>
                  </div>
                <div class="form-group">
                  <label class="control-label">Details</label>
                  <textarea class="form-control" rows="4" name="details" placeholder="Enter group details" required></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Username</label>
                  <input class="form-control" type="text" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="text" name="password" placeholder="Enter password" required>
                </div>
               
          
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" name="sub"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
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