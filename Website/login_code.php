<?php

if (isset($_POST['submit'])) {
    
    $username = $_POST['uname'];
    $pswd = $_POST['pswd'];
    
    require_once 'dbcon_weatherstation.php';
    require_once 'functions.php'; 

    loginUser($conn, $username, $pswd);
}

else {
    header("location ../Website/login_page.php");
    exit();
}