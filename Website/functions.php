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
    $pswd = sha1($pswd);
    $sql = "INSERT INTO users (username, password) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: http://localhost/WeatherStation/Website/signup_page.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $pswd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: http://localhost/WeatherStation/Website/login_page.php?error=signedup");
    exit();
}

function loginUser($conn, $username, $pswd) {
    $pswd = sha1($pswd);
    $usernameExists = usernameExists($conn, $username);
    if ($usernameExists === false) {
        header("location: ../Website/login_page.php?error=wronglogin");
        exit();
    }

    $pswddb = $usernameExists['password'];
 
    if ($pswddb == $pswd){
        session_start();
        $_SESSION['username'] = $username;
        header("location: ../Website/start.php");
        exit();
    }
 
    header("location: ../Website/login_page.php?error=wronglogin");
    exit();
  
}

// returns true if the username contains enough characters.
function usernameTooShort($username, $border) {
    $result = false;
    if (strlen($username) < $border) {
        $result = true;
    }
    return $result;
}

// returns true if the password contains enough characters.
function passwordTooShort($pswd, $border) {
    $result = false;
    if (strlen($pswd) < $border) {
        $result = true;
    }
    return $result;
}

// returns true if there are too many users in the data base
function tooManyUsers($dbcon_weatherstation, $max_users) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($dbcon_weatherstation, $sql);
    $rows = mysqli_num_rows($result);
    
    if ($rows >= $max_users) {
        return true;
    }
    else {
        return false;
    }
}

// returns code of current weatherstation
function getStationCode($conn, $user, $weatherstation) {
    $sql = "SELECT stn FROM stations WHERE name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: http://localhost/WeatherStation/Website/map.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $weatherstation);
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


// returns country of current weatherstation
function getStationCountry($conn, $user, $stationCode) {
    $sql = "SELECT country FROM stations WHERE stn = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: http://localhost/WeatherStation/Website/map.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $stationCode);
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

function getWeatherstation($conn, $user, $stn) {
    $sql = "SELECT name FROM stations WHERE stn = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: http://localhost/WeatherStation/Website/map.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $stn);
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

// function to convert array to xml
function array_to_xml($measurements, $fileName) {
    $xml_data = new SimpleXMLElement('<?xml version="1.0"?><WEATHERDATA></WEATHERDATA>'); 
    foreach($measurements as $row) {
        $measurementNode = $xml_data->addChild('MEASUREMENT');
        foreach($row as $key => $value ) {
            
            if( is_array($value) ) {
                $subnode = $measurementNode->addChild($key);
                array_to_xml($value, $subnode);
            } else {
                $measurementNode->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
    $result = $xml_data->asXML($fileName);
}















// function to convert array to xml
function array_to_xml_most_recent_data($measurements) {
    $xml_data = new SimpleXMLElement('<?xml version="1.0"?><WEATHERDATA></WEATHERDATA>'); 
    foreach($measurements as $row) {
        $measurementNode = $xml_data->addChild('MEASUREMENT');
        foreach($row as $key => $value ) {
            
            if( is_array($value) ) {
                $subnode = $measurementNode->addChild($key);
                array_to_xml($value, $subnode);
            } else {
                $measurementNode->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
    $result = $xml_data->asXML('Measurements_Air_Pressure_Philippines_Most_Recent.xml');
}

// function to convert array to xml
function array_to_xml_avg_last_week($measurements) {
    $xml_data = new SimpleXMLElement('<?xml version="1.0"?><WEATHERDATA></WEATHERDATA>'); 
    foreach($measurements as $row) {
        $measurementNode = $xml_data->addChild('MEASUREMENT');
        foreach($row as $key => $value ) {
            
            if( is_array($value) ) {
                $subnode = $measurementNode->addChild($key);
                array_to_xml($value, $subnode);
            } else {
                $measurementNode->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
    $result = $xml_data->asXML('Measurements_Air_Pressure_Philippines_Average_Last_Week.xml');
}

// function to convert array to xml
function array_to_xml_all_data_last_week($measurements) {
    $xml_data = new SimpleXMLElement('<?xml version="1.0"?><WEATHERDATA></WEATHERDATA>'); 
    foreach($measurements as $row) {
        $measurementNode = $xml_data->addChild('MEASUREMENT');
        foreach($row as $key => $value ) {
            
            if( is_array($value) ) {
                $subnode = $measurementNode->addChild($key);
                array_to_xml($value, $subnode);
            } else {
                $measurementNode->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
    $result = $xml_data->asXML('Measurements_Air_Pressure_Philippines_Last_Week.xml');
}
