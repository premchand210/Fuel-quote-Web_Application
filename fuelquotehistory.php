<?php
session_start();
$email=$_SESSION['email'];
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Fuel Quote History</title>
  <style>
    body {
  background-image: url("clientprofile.jpeg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
  color: var(--cd-color-1);
}

.tableheader{
  background-image: url("clientprofile.jpeg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
  
}
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      align-content: center; 
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 8px;     
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
      
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
      <div class="text-component text-center">
        <div class="tableheader" style="background-color:white;color:black;padding:20px;">
          <h2>FUEL QUOTE HISTORY</h2>
        </div>
        <div class="tabledata">
            <table>
                <tr>
                  <th>EMAIL</th>
                  <th>NUMBER OF GALLONS</th>
                  <th>DELIVERY ADDRESS</th>
                  <th>DELIVERY DATE</th>
                  <th>PRICE PER GALLON($)</th>
                  <th>TOTAL AMOUNT DUE($)</th>
                </tr>
              <?php
                include 'dbutil.php';
                if(!$conn){
                  die('Could not Connect MySql Server:' .mysql_error());
                }
                $email=$_SESSION['email'];
                $sql =  "SELECT * from fuel_quote WHERE email= '$email' and number_of_gallons is not null and number_of_gallons > 0";
                $result=$conn-> query($sql);

                if($result-> num_rows >0){
                  while ($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["email"] . "</td><td>". $row["number_of_gallons"] ."</td><td>". $row["delivery_address"] ."</td><td>" . $row["delivery_date"] ."</td><td>". $row["price_per_gallon"] ."</td><td>". $row["total_amount_due"] ."</td></tr>";
                  }
                  echo "</table>";

                }
                else{
                  
                  echo "This is your first time ! Please go to Fuel Quote form.";
                  echo "<br>";
                }
                $conn-> close();
                  ?>
              </table>
        </div>
      </div>
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>