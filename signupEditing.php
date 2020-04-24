<?php
session_start();
$_SESSION['message']='';
$db = mysqli_connect('localhost','root','','accounts');

if($_SERVER['REQUEST_METHOD']=='POST'){
	$email1=$_POST['email'];
	#echo $email1;


	
//two emails must match
$sql3="SELECT email FROM users_reg where email='$email1'";
$result3=$db->query($sql3);
if($result3->num_rows==0){
  //two passwords entered are the same
  
  if($_POST['password']==$_POST['confirmpassword']){
    $compname= $db->real_escape_string($_POST['companyname']);
    $email=$db->real_escape_string($_POST['email']);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
      $password=$_POST['password'];
      $number    = preg_match('@[0-9]@', $password);
	  
	  #if($result3->num_rows=0){
	  if( $number || strlen($password) >= 6) {
		  
		  
               
        $_SESSION['email']=$email;
        $sql = "INSERT INTO users_reg (company_name, email, pwd) VALUES ('$compname','$email','$password')";
			  
		$sql1 = "INSERT INTO client_profile (email) VALUES ('$email')";		  
		$sql2 = "INSERT INTO fuel_quote (email) VALUES ('$email')";	
	
		$result=$db->query($sql);
		$result1=$db->query($sql1);
		$result2=$db->query($sql2);
		if($result2==true){
          $_SESSION['message']="Registration successful!";
          $_SESSION['username']=$compname;
          header("location:thankyou.php");
		}
	
   }
      else{
           $_SESSION['message']= "Password should be of atleast 6 characters and should contain a number !";
          }
        }
	
		
    else{
      $_SESSION['message']="Invalid email format";
       }

   
  }
  else{
    $_SESSION['message']="Both the passwords should match";
  }
  
  }
  else
  {
$_SESSION['message']="This Email is already registered";
}
}




?>
<!DOCTYPE HTML>
<html lang="en" >
<html>
<head>
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="signup_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>  
</head>

<body class="body">
    <div class="headline">
    <h1> Registration </h1>
    </div>
  
  
<div class="login-page">
  <div class="form">

    <form class="formphp" action="signupEditing.php" method="post" enctype="multipart/form-data" autocomplete="off" >
     <div class="alert alert-error"><?= $_SESSION['message'] ?></div>     
	<input type="text" placeholder="Registered Company name" name="companyname" required="required">
      <input type="text" placeholder="Email address" name="email" required="This is mandatory" >
      <input type="password" placeholder="Set a password" name="password" required="This is mandatory" >
      <input type="password" placeholder="Re-confirm password" name="confirmpassword" required="This is mandatory"  >
      <button type="submit">SIGN UP</button>
    </form>


  </div>
</div>

</body>
</html>
