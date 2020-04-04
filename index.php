<?php

session_start();
$_SESSION['message']='';
$mysqli = new mysqli('localhost','root','','accounts');
 
// Check connection
if(isset($_POST['submit'])){
	$uname=$_POST['username'];
	$password=$_POST['password'];

	$sql= "Select * from users_reg where email='$uname' and pwd='$password'" or 
			die(mysqli_error($mysqli)) ;

	$rw=mysqli_query($mysqli,$sql);
	if(mysqli_num_rows($rw)){
		header("location:http://localhost/test/overview.php");

	}
	else
	{
		$_SESSION['message']="Invalid username and password";

	}
}


/*$username=$_POST['username'];
$password=$_POST['password'];
$mysqli = new mysqli('localhost','root','Msdrox07!','accounts');
$result = "Select * from users_reg where email = '$username' and pwd = '$password'"
			or die("Failed to query database ".mysql_error());
print($result);
$row=mysql_fetch_array($mysqli->query($result));
if($row['email']==$username && $row['pwd']==$password){
	echo "Login success!!!" ;
} else{
	echo "Failed to login";

}*/

?>


<!DOCTYPE html>
<html>
<head>
	<title>Fuel Quote Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <div class="headline">
    <h2> Welcome to the fuel quote page</h2>
    </div>
	<div class="container">
		<div class="img">
			<img src="img/factory.svg">
		</div>
		<div class="login-content">
			<form action="index.php" method="post">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
				<div class="alert alert-error"><?= $_SESSION['message'] ?></div> 
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
					  </div>
					  
           		   <div class="div">
           		   		<h5>Email-Id</h5>
           		   		<input type="text" class="input" name="username" required="required">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name = "password" required="required">
            	   </div>
            	</div>
            	
            	<input type="submit" class="btn" value="Login" name="submit">
              <a class="reg" href="http://localhost/test/register/signup.php">Not a Member?Register</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>