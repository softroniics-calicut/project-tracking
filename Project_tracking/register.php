
<?php
include 'api/connection.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  mysqli_query($con,"insert into login(username,password,type)values('$username','$password','coo')");
  $log = mysqli_insert_id($con);
 mysqli_query($con,"insert into coordinators(login_id,name,email,mobile,address)values('$log','$name','$email','$mobile','$address')");

    header("location:index.php");
  
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Project Tracking</h1>
      </div>
     
      <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form method="post">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Name</label>
                    <input class="form-control" type="text" name="name" required placeholder="Enter full name">
                  </div>
                  <div class="form-group col-md-6">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" name="email" required placeholder="Enter email email">
                </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Mobile</label>
                    <input class="form-control" type="text" name="mobile" required pattern="[0-9]{10}" placeholder="Enter Mobile number">
                  </div>
                  <div class="form-group col-md-6">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="4" required name="address" placeholder="Enter your address"></textarea>
                </div>  
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                  <label class="control-label">Username</label>
                  <input class="form-control" type="text" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="text" name="password" placeholder="Enter Password" required ">
                </div>
                </div>
                
             
              
            </div>
            <div class="tile-footer">
              <center><button class="btn btn-primary" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button></center>
            </div>
            </form>
          </div>
        </div>
       
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>