<?php
   session_start(); //initialize session variables
    $_SESSION["email"]=""; //set user to default (blank)
    header("location:http://localhost/final/login/index.php"); //redirect to login
?>