<?php require "assets/function.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require "assets/autoloader.php" ?>
	<style type="text/css">
	<?php include 'css/customStyle.css'; ?>
	
	</style>
</head>
<body style="background: url('photo/login.jpg');background-size: 100%;width:100vw">

	<div class="login-box" style="">
  <div style="margin-right: 5vw;margin-left:60vw">
  <!--
  <div class="well well-sm center" style="margin: auto;padding:4px 11px;margin-top: 30vh;text-align: center;">

  	<h3 class="center">Login</h3>
  </div>-->
  <!-- /.login-logo -->
  <div class="well well-sm" style="margin:auto;padding: 22px;margin-top:30vh;z-index: 6;background: rgba(50, 50, 50, 0.7)">
    <!--<p class="login-box-msg">Sign in to start your session</p>-->
    <form action="" method="post">
    
    <img src="photo/download.png"style="height:15vh;margin:auto"/>
    <h2> </h2>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
    
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </form>
    
  </div>
</div>
  <br>
  <div class="alert alert-danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,0,0.7); width: 100%;height: 100%;z-index: -1"></div>

  <!-- /.login-box-body -->
</div>
</body>
</html>

<?php 

if (isset($_POST['login'])) 
{
	$user = $_POST['email'];
    $pass = $_POST['password'];
    $con = new mysqli('localhost','root','','store');

    $result = $con->query("select * from users where email='$user' AND password='$pass'");
    if($result->num_rows>0)
    {	
    	session_start();
    	$data = $result->fetch_assoc();
    	$_SESSION['userId']=$data['id'];
      $_SESSION['bill'] = array();
    	header('location:index.php');
      }
    else
    {
     	echo 
     	"<script>
     		\$(document).ready(function(){\$('#error').slideDown().html('Login Error! Try again.').delay(3000).fadeOut();});
     	</script>
     	";
    }
}

 ?>