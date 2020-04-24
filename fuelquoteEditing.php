<?php
   include 'dbutil.php';
   $gallons_result = array();
   $date_result=array();
   $error=false;
   $min=1;
   $max=999999;
   $location="";
   $price="";
   $totalPrice="";
   
  
   session_start(); //initialize session variables
   
   $email=$_SESSION['email'];
   $sql="SELECT email FROM users_reg where email='$email'";
   $result=$conn->query($sql);
   if($result->num_rows>0)
   while($row=$result->fetch_assoc())     #if($_SESSION["user"]==$row["username"])$userid=$row["user_id"];
   $address1="";
   $sql="SELECT address1 FROM client_profile WHERE email='$email'";
   $result=$conn->query($sql);
   if($result->num_rows>0)
	while($row=$result->fetch_assoc())
	$address1=$row["address1"];

   if(isset($_POST['fuel']) && $error==false){
	  $gallons=$_POST['gallons'];
    $deliverydate=$_POST['deliverydate'];
	#echo "deivery date is",$deliverydate;

		
		if (filter_var($gallons, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false){
			$error=true;
		   array_push($gallons_result,"Error: Enter your quantity less than or equals to 999999 gallons");
      
	}
	
	if($deliverydate ==""){
	$error=true;
	array_push($date_result,"Error: Pick a Date");
	}
   
   
   
   /*if($result->num_rows>0)
   while($row=$result->fetch_assoc())$address=$row["address1"];*/
   #if($_SERVER['REQUEST_METHOD']=='POST'){   //if this is a post call
   if($error==false){
      $gallons=$_POST['gallons'];
      $suggestedprice=0;
	    $totalprice=0;
      $basePrice = 1.50; //baseprice is always constant

	    $historyFactor = ""; //initial
	    $historyCheck="";  //determine if the user has history
		  $sql1="SELECT * from fuel_quote WHERE email= '$email' and number_of_gallons is not null";
		  $result1=$conn->query($sql1);
		  if($result1->num_rows>0)
			  #echo "entered inide result";
	      $historyCheck=1;
	  
		  if($historyCheck == 1) {//if history, historyFacotry value
		    #echo "setiing hitory factory";
		  $historyFactor = 0.01;}
          else $historyFactor = 0;
		  
          #echo "the history factor is", $historyFactor;  
		  
	    $gallonFactor = 0.03;   //initial 
	    $gallons = $_POST['gallons']; //retrieve number of gallons on input
	    if($gallons > 1000) //if more than 1k, change gallonFactor
	        $gallonFactor = 0.02; 

	  $sql1="select state from client_profile where email='$email'";
		$result1=$conn->query($sql1);
		if($result1->num_rows>0)
		while($row=$result1->fetch_assoc())
		$location=$row["state"]; 
		#echo "the location is", $location;
		
		$locationFactor = 0.04; //initial
	    if($location == 'TX') //if tx
		    $locationFactor = 0.02;

	    
		$month=date('m',strtotime($deliverydate));
		
		$fluc_factor = 0.04; //initial
	    if($month < 6 || $month > 8 ) //if not summer, set fluc .03
		    $fluc_factor = 0.03;


	     $margin = $basePrice *($locationFactor - $historyFactor + $gallonFactor + 0.1 + $fluc_factor); 
	    $price = $basePrice + $margin;  //suggested price per gallon, should output

	    $totalPrice = $price * $gallons;		//final amount due, should output
    #echo "total price",$totalPrice;

   }}

		if(isset($_POST['quote'])){
			/*$pricegallons=$_POST['$pricepergallon1'];
		echo "price per gallon value",$pricegallons;
    echo "total amount value",$_POST['totalamountdue'];
        
      
        $sql="INSERT INTO fuel_quote (email,number_of_gallons,delivery_address,delivery_date,price_per_gallon,total_amount_due)
        VALUES ('".$_SESSION['email']."','".$_POST['gallons']."','".$_POST['address1']."','".$_POST['deliverydate']."','".$_POST['pricepergallon']."',
		'".$_POST['totalamountdue']."')";
        $conn->query($sql);
        $conn->close();
        header('Location: fuelquoteEditing.php');*/
        $tot=$_POST['totalamountdue'];
        $pri=$_POST['pricepergallon1'];
       /* $sql="UPDATE fuel_quote SET number_of_gallons='".$_POST["gallons"]."' WHERE email='$email'";
        $conn->query($sql);
        $sql="UPDATE fuel_quote SET delivery_address='$address1' WHERE email='$email'";
        $conn->query($sql);
        $sql="UPDATE fuel_quote SET delivery_date='".$_POST["deliverydate"]."' WHERE email='$email'";
        $conn->query($sql);
        $sql="UPDATE fuel_quote SET price_per_gallon='$pri' WHERE email='$email'";
        $conn->query($sql);
        $sql="UPDATE fuel_quote SET total_amount_due='$tot' WHERE email='$email'";
        $conn->query($sql);*/
        $sql="INSERT INTO fuel_quote (email,number_of_gallons,delivery_address,delivery_date,price_per_gallon,total_amount_due)
        VALUES ('".$_SESSION['email']."','".$_POST['gallons']."','$address1','".$_POST['deliverydate']."','$pri',
        '$tot')";
        if (mysqli_query($conn, $sql)) {
          $_SESSION['company']=$email;
          header('Location: fuelquotehistory.php');
        } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
        $conn->close();
        
    }
   
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  
  <title>Profile page</title>
  <style>
    body {
     background-image: url("clientprofile.jpeg");
     background-repeat: no-repeat;
     background-attachment: fixed;
     background-position: center;
     background-size: cover;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    * {
      box-sizing: border-box;
    }
    
    /* Style inputs */
    input[type=text], select{
      width: 100%;
      padding: 12px;
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
      border-radius: 5px;
      padding: 10px;
      width: 50%;
      height: 50%;
    }
    
    /* Create two columns that float next to eachother */
    .column {
      float: left;
      width: 50%;
      margin-top: 6px;
      padding: 20px;
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
      <div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-5 FuelQuoteDiv">
		<div class="card col-lg-12"  style="height: auto;">
			<div class="card-header">
        <h3 class="profileText" style ="align:center">Your Fuel Quote</h3>
        
			</div>
			<div class="card-body col-lg-12">
				<form onsubmit="successfull()" method="post" name="form">

					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span class="parameter-label floatLeft" >Number of Gallons*  </span>
							
							<span><input style="padding:12px;" type="number" name="gallons" class="parameter-input form-control" 
							value=<?php if(isset($_POST['fuel'])) echo ($gallons); ?> placeholder=""  required></span>
						 <?php if(count($gallons_result)>0): ?>
				<div class="error">
<?php foreach ($gallons_result as $error):?>
<p><font color="red"><?php echo $error ?></font></p>
<?php endforeach ?>

</div>
<?php endif ?>	


						</div>
					</div>
					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span class="parameter-label floatLeft" >Delivery Address*  </span>
							<span style="padding: 19px;"><textarea type="text"  class="parameter-input form-control" name="address1" rows="5" cols="20" readonly><?php echo($address1);?></textarea></span>
						</div>
					</div>
					
					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span style="padding: 25px;" class="parameter-label floatLeft">Delivery Date*  </span>
							<span><input type="date" class="parameter-input form-control" id="deliverydate" name="deliverydate" 
							value=<?php if(isset($_POST['fuel'])) echo ($deliverydate); ?> required > </span>
							<?php if(count($date_result)>0): ?>
				<div class="error">
<?php foreach ($date_result as $error):?>
<p><font color="red"><?php echo $error ?></font></p>
<?php endforeach ?>

</div>
<?php endif ?>	
							
					
						</div>
					</div>

					<div class="form-group" style="text-align: center;">
						<input type="submit" value="Get Quote" class="btn float-right login_btn" id="fuel" name="fuel">
					</div>
					
					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span class="parameter-label floatLeft">Price per gallon </span>
							<span><input type="text" class="parameter-input form-control" name="pricepergallon1" id="pricepergallon1" placeholder= "current price + margin" 
							value="<?php if(isset($_POST['fuel'])) echo ($price); ?>" readonly></span>
						</div>
					</div>

					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span class="parameter-label floatLeft">Total Amount Due </span>
							<span><input type="text" class="parameter-input form-control" name="totalamountdue" id="totalamountdue"
							value="<?php if(isset($_POST['fuel'])) echo ($totalPrice); ?> " readonly></span>
						</div>
          </div>

					<input type="submit" name="quote" value="Finalize Quote">

		</div>			
					
					
					
				</form>
			</div>
		</div>
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
<script>
</script>
</body>
</html>

