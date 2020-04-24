<?php
   include 'dbutil.php';
   $firstname_result = array();
   $lastname_result = array();
   $email_result = array();
   $address1_result = array();
   $address2_result = array();
   $city_result = array();
   $state_result = array();
   $zipcode_result = array();
   session_start(); //initialize session variables
 
   $email=$_SESSION['email'];
   
    
   
   if(isset($_POST['index']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	
		
	
  # if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //if this is a post call
   
	  
	   
	   if($_POST['firstname']==""||strlen($_POST['firstname'])>1){ //validate name
	 
		   array_push($firstname_result,"Error: Enter your firstname in 0-50 characters");
      
       }
       
       if($_POST['address1']==""||strlen($_POST['address1'])>100){ //validate address 
           
		   
		array_push($address1_result,"Error: Enter your address in 0-100 characters");
          
       }
       
       if(strlen($_POST['address2'])>100){ //validate address 
           
		   
		array_push($address2_result,"Error: Enter your address2 in 0-100 characters");
          
	   }
	   if($_POST['city']==""||strlen($_POST['city'])>20){ //validate city
        
           array_push($city_result,"Error: Enter your city name in 0-20 characters");          
	   }
       if($_POST['state']==""||strlen($_POST['state'])>2){
	    array_push($state_result,"Error: Enter your city name in 0-20 characters");//validate state
    
       }
       if($_POST['zip']==""||!is_numeric($_POST['zip'])||strlen($_POST['zip'])>9||strlen($_POST['zip'])<5){ //validate zip
           
		   
		   array_push($zipcode_result,"Error: Enter your zip in 5-9 numbers");
		   
       }
	  
  
   
	   if($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}
		else{ 
            $sql="UPDATE client_profile SET first_name='".$_POST["firstname"]."' WHERE email='$email'";
            $conn->query($sql);
            $sql="UPDATE client_profile SET address1='".$_POST["address1"]."' WHERE email='$email'";
            $conn->query($sql);
            $sql="UPDATE client_profile SET address2='".$_POST["address2"]."' WHERE email='$email'";
            $conn->query($sql);
            $sql="UPDATE client_profile SET city='".$_POST["city"]."' WHERE email='$email'";
            $conn->query($sql);
            $sql="UPDATE client_profile SET state='".$_POST["state"]."' WHERE email='$email'";
            $conn->query($sql);
            $sql="UPDATE client_profile SET zip='".$_POST["zip"]."' WHERE email='$email'";
            $conn->query($sql);
            $conn->close();
            $_SESSION['email']=$email;
            header('Location: indexprofileEditing.php'); //if valid input redirect to calculator
		}  
		
   }
	#}
	
   
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet"type="text/css"href="style.css">
  <title>Profile page</title>
  <style>
    body {
     background-image: url("clientprofile.jpeg");
      font-family: Arial, Helvetica, sans-serif;
    }
    
    * {
      box-sizing: border-box;
    }
    
    /* Style inputs */
    input[type=text], select{
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }
    
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    /* Style the container/contact section */
    .container {
      border-radius: 12px;
      padding-right: 1px;
      width: 50%;
      height: 50%;
    }
    
    /* Create two columns that float next to eachother */
    .column {
      float: center;
      width: 50%;
      margin-top: 2px;
      
    }
   

    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .column, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
    </style>
</head>
<body>
  <header class="cd-main-header js-cd-main-header">
    <div class="cd-logo-wrapper">
      <a href="#0" class="cd-logo"><img src="assets/img/cd-logo.svg" alt="Logo"></a>
    </div>
    <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
  
    <ul class="cd-nav__list js-cd-nav__list">
      
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0">
          <img src="assets/img/cd-avatar.svg" alt="avatar">
          <span>Account</span>
        </a>
    
        <ul class="cd-nav__sub-list">
          <li class="cd-nav__sub-item"><a href="overview.php">Home</a></li>
          <li class="cd-nav__sub-item"><a href="logouthandler.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header> <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <nav class="cd-side-nav js-cd-side-nav">
      <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Main</span></li>
        <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
          <a href="overview.php">Overview</a>
        </li>
        <li class="cd-side__item cd-side__item--has-children cd-side__item--comments js-cd-item--has-children">
          <a href="indexprofileEditing.php">Profile</a>
        </li>
      </ul>
    
      <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
          <a href="fuelquoteEditing.php">Fuel Quote Form</a>
        </li>

        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
          <a href="fuelquotehistory.php">Fuel Quote History</a>
        </li>
      </ul>
    </nav>
  
    <div class="cd-content-wrapper">
      <div class="text-component text-left">
        <div class="container">

          <div style="text-align:left">
            <h2>Client Profile</h2> 
            
          </div>
          <div class="row">
            <div class="column">
            </div>
            <div class="column">
            <form action="indexprofileEditing.php" method="post">
                <label for="fname">*First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="First Name" required="required" > <br>
				<?php if(count($firstname_result)>0): ?>

<div class="error">
<?php foreach ($firstname_result as $error):?>
<p><font color="red"><?php echo $error ?></font></p>
<?php endforeach ?>

</div>
<?php endif ?>
				
               
				<label for="address">*Address1 </label>
                <input type="text" id="address1" name="address1" placeholder="Enter the Address1" required="required"> <br>
                <?php if(count($address1_result)>0): ?>
				<div class="error">
<?php foreach ($address1_result as $error):?>
<p><font color="red"><?php echo $error ?></font></p>
<?php endforeach ?>

</div>
<?php endif ?>
                <label for="address2">Address2 </label>
                <input type="text" id="address2" name="address2" placeholder="Enter the Address2"> <br>
                <?php if(count($address2_result)>0): ?>
				<div class="error">
<?php foreach ($address2_result as $error):?>
<p><font color="red"><?php echo $error ?></font></p>
<?php endforeach ?>

</div>
<?php endif ?>
				<label for="address">City</label>
                <input type="text" id="city" name="city" placeholder="city" required="city">
                <?php if(count($city_result)>0): ?>
				<div class="error">
<?php foreach ($city_result as $error):?>
<p><font color="red"><?php echo $error ?></font></p>
<?php endforeach ?>

</div>
<?php endif ?>
				<label for="state">State</label> 
			<select type = "state"  name= "state" id="state" placeholder= "Select State" required>
       


		 <option value=" ">Select state</option>
          <option value="AL">AL</option>
          <option value="AK">AK</option>
          <option value="AZ">AZ</option>
          <option value="AR">AR</option>
          <option value="CA">CA</option>
          <option value="CO">CO</option>
          <option value="CT">CT</option>
          <option value="DE">DE</option>
          <option value="DC">DC</option>
          <option value="FL">FL</option>
          <option value="GA">GA</option>
          <option value="HI">HI</option>
          <option value="ID">ID</option>
          <option value="IL">IL</option>
          <option value="IN">IN</option>
          <option value="IA">IA</option>
          <option value="KS">KS</option>
          <option value="KY">KY</option>
          <option value="LA">LA</option>
          <option value="ME">ME</option>
          <option value="MD">MD</option>
          <option value="MA">MA</option>
          <option value="MI">MI</option>
          <option value="MN">MN</option>
          <option value="MS">MS</option>
          <option value="MO">MO</option>
          <option value="MT">MT</option>
          <option value="NE">NE</option>
          <option value="NV">NV</option>
          <option value="NH">NH</option>
          <option value="NJ">NJ</option>
          <option value="NM">NM</option>
          <option value="NY">NY</option>
          <option value="NC">NC</option>
          <option value="ND">ND</option>
          <option value="OH">OH</option>
          <option value="OK">OK</option>
          <option value="OR">OR</option>
          <option value="PA">PA</option>
          <option value="RI">RI</option>
          <option value="SC">SC</option>
          <option value="SD">SD</option>
          <option value="TN">TN</option>
          <option value="TX">TX</option>
          <option value="UT">UT</option>
          <option value="VT">VT</option>
          <option value="VA">VA</option>
          <option value="WA">WA</option>
          <option value="WV">WV</option>
          <option value="WI">WI</option>
          <option value="WY">WY</option>
        </select>
		
 
				<label for="zip">Zip Code</label>
                <input type="text" name="zip" placeholder="max 9 chracters" required="zip"> <br>
                <?php if(count($zipcode_result)>0): ?>
				<div class="error">
<?php foreach ($zipcode_result as $error):?>
<p><font color="red"><?php echo $error ?></font></p>
<?php endforeach ?>

</div>
<?php endif ?><input type="submit" name="index" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>