<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["uname"];
    $pswd = $_POST["pswd"];
    $pswdRepeat = $_POST["pswdRepeat"];

    require_once 'dbcon.php';
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
    
    createUser($conn, $user, $username, $pswd);

}
else {
    header("location: http://localhost/WeatherStation/Website/signup_page.php");
    exit();
}

