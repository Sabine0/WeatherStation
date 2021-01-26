<?php

// returns true if username is invalid
function invalidUsername($username) {
    $result = false;
    // preg_match is used to look if the username contains signs that are allowed
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    return $result;
}

// returns true if the passwords do not match with each other
function pswdDoesntMatch($pswd, $pswdRepeat) {
    $result = false;
    if ($pswd != $pswdRepeat) {
        $result = true;
    }
    return $result;
}

// returns false if username does not exist in database
function usernameExists($conn, $username) {
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;

    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $user, $username, $pswd) {
    $sql = "INSERT INTO users (username, password) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=stmtfailed");
        exit();
    }

    $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPswd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: http://localhost/WeatherStation/Website/login_page.php?error=signedup");
    exit();
}

function loginUser($conn, $username, $pswd) {
    $usernameExists = usernameExists($conn, $username);
    
    if ($usernameExists === false) {
        header("location: ../Website/login_page.php?error=wronglogin1");
        exit();
    }
    
    // password in database of user (this is a hashed password)
    $pswdHashed = $usernameExists["password"];
    // dehashes password from database and compares it with password from login form
    $checkPswd = password_verify($pswd, $pswdHashed);
    
    $hashedPswd2 = password_hash($pswd, PASSWORD_DEFAULT);
    
//    if (!$checkPswd) {
//        header("location: ../Website/login_page.php?error=wronglogin2");
//        exit();
//    }
//    else {
//        session_start();
//        $_SESSION["username"] = $usernameExists["username"];
//        header("location: ../Website/start.html");
//        exit();
//    }
    if ($hashedPswd2 == $usernameExists["password"]) {
        echo 'hi'; 
    }
    
}