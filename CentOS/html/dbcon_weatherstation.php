<?php

$host="localhost";
$user="root";
$password="GroteSlangen456";
$db="weatherstation";

$conn=mysqli_connect($host,$user,$password,$db);

if (!$conn) {
    die("Connection failed: " . mysqli.mysqli_connect_error());
}

