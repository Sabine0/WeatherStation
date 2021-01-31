<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["uname"];
    $pswd = $_POST["pswd"];
    $pswdRepeat = $_POST["pswdRepeat"];

    require_once 'dbcon_weatherstation.php';
    require_once 'functions.php';

    if (invalidUsername($username) !== false) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=invalidusername");
        exit();
    }

    if (usernameExists($conn, $username) !== false) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=usernametaken");
        exit();
    }

    if (pswdDoesntMatch($pswd, $pswdRepeat) !== false) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=passwordsdontmatch");
        exit();
    }
    
    if (usernameTooShort($username, 5) !== false) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=usernametooshort");
        exit();
    }
    
    if (passwordTooShort($pswd, 5) !== false) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=passwordtooshort");
        exit();
    }
    
    if (tooManyUsers($dbcon_weatherstation, 25) !== false) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=toomanyusers");
        exit();
    }
    
    createUser($conn, $user, $username, $pswd);

}
else {
    header("location: http://localhost/WeatherStation/Website/signup_page.php");
    exit();
}

