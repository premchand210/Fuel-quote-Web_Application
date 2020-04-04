<?php
   include 'dbutil.php';
   $gallons_result = array();
   $min=1;
   $max=500;
  
   session_start(); //initialize session variables
   if(isset($_POST['fuel'])){
	   $gallons=$_POST['gallons'];
		
		if (filter_var($gallons, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false){
			
		   array_push($gallons_result,"Error: Enter your quantity less than or equals to 500 gallons");
      
	}
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
     background-image: url("lblue.jpeg");
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
      <li class="cd-nav__item"><a href="#0">Support</a></li>
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0">
          <img src="assets/img/cd-avatar.svg" alt="avatar">
          <span>Account</span>
        </a>
    
        <ul class="cd-nav__sub-list">
          <li class="cd-nav__sub-item"><a href="#0">Home</a></li>
          <li class="cd-nav__sub-item"><a href="#0">Logout</a></li>
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
          <a href="indexprofile.php">Profile</a>
        </li>
      </ul>
    
      <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
          <a href="fuelquote.php">Fuel Quote Form</a>
        </li>

        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
          <a href="fuelquotehistory.html">Fuel Quote History</a>
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
							
							<span><input style="padding:12px;" type="number" name="gallons" class="parameter-input form-control" placeholder=""  required></span>
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
							<span style="padding: 19px;"><textarea type="text"  class="parameter-input form-control" rows="5" cols="20" disabled>Client Address Fetched from Database!</textarea></span>
						</div>
					</div>
					
					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span style="padding: 25px;" class="parameter-label floatLeft">Delivery Date*  </span>
							<span><input type="date" class="parameter-input form-control" id="deliverydate" required="required"></span>
					
						</div>
					</div>

					<div class="form-group" style="text-align: center;">
						<input type="submit" value="Get Quote" class="btn float-right login_btn" name="fuel" onclick=" return validate1()">
					</div>
					
					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span class="parameter-label floatLeft">Price per gallon </span>
							<span><input type="text" class="parameter-input form-control" placeholder= "current price + margin" disabled></span>
						</div>
					</div>

					<div class="input-group form-group col-lg-12 top-10">
						<div class="textLabel">
							<span class="parameter-label floatLeft">Total Amount Due </span>
							<span><input type="text" class="parameter-input form-control" disabled></span>
						</div>
					</div>

		</div>			
					
					
					
				</form>
			</div>
		</div>
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>