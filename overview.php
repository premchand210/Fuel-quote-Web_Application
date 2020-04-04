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
     background-image: url("welcome.jpeg");
     background-repeat: no-repeat;
     background-attachment: fixed;
     background-position: center;
     background-size: cover;
     
     
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