<?php

$host="localhost";
$user="root";
$password="";
$db="unwdmi";

$conn=mysqli_connect($host,$user,$password,$db);

if (!$conn) {
    die("Connection failed: " . mysqli.mysqli_connect_error());
}

