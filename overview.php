<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  
  <title>Overview</title>
  <style>
    body {
     background-image: url("wel.jpg");
     background-repeat: no-repeat;
     background-attachment: fixed;
     background-position: center;
     background-size: cover;
     
     
    }

    .content-box {
    background-color: #dadae0;
    box-shadow: 1px 4px 8px rgba(0,0,0,.15);
    transition: all .3s ease-in-out;
    padding: 10px;
    padding-bottom: 0;
    margin-top: 40px;
    margin-bottom: 10px;
    height: 200px;
}
.content-box .finbyz-icon {
    height: 100px;
    width: 100px;
    display: inline;
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
    <div class="container">
                <h2 align="center">Instructions</a></h2>
        
</div>
<div class="container">
<div class="row">	
	<div class="col-md-4 text-center" style="opacity: 1;">
	<div class="content-box">
	<img alt="Real-time information" title="Real-time information" class="finbyz-icon img-responsive" src="https://finbyz.tech/svg/icon%20Real-time%20information.svg">
	<h4 class="content-box-title">1. UPDATE PROFILE</h4>
	<p class="content-box-sub">Update your profile with necessary details to make delivery easier for use.</p>
	</div>
	</div>
	<div class="col-md-4" style="opacity: 1;">
		<div class="content-box text-center">
		<img alt="Higher Productivity" title="Higher Productivity" class="finbyz-icon img-responsive" src="https://finbyz.tech/svg/icon%20Higher%20Productivity.svg">
		<h4 class="content-box-title">2. GET FUEL QUOTE</h4>
		<p class="content-box-sub">Input the required gallons in order to get your price quote.</p>
		</div>
	</div>
	<div class="col-md-4" style="opacity: 1;">
		<div class="content-box text-center">
		<img alt="Improved Collaboration" title="Improved Collaboration" class="finbyz-icon img-responsive" src="https://finbyz.tech/svg/icon%20Improved%20Collaboration.svg">
		<h4 class="content-box-title">3. OBSERVE FUEL HISTORY</h4>
		<p class="content-box-sub">View your current and previous transactions with us.</p>
		</div>
	</div>
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