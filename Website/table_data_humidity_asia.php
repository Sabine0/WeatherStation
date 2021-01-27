<?php 
require "header.php";
?>
<!--Humidity of the top 10 weather stations in Asia which have an average temparture between 27-29.5c
Downloadable data in XML format-->



<!DOCTYPE html>
<html>
<head>
	<title>Humidity in Asia</title>
	<h1> Humidity of top 10 weather stations in Asia with an average temperature between 27 and 29.5 degrees Celcius.</h1>
</head>

<body>
<table style="width:100%">
	<tr>
		<th>Date</th>
		<th>Time</th>
		<th>Location</th>
		<th>Average temperature</th>
		<th>Humidity</th>
	</tr>
	<tr>
		<!--These are all placeholders-->
		<th>25-01-21</th>
		<th>20:41:03</th>
		<th>China</th>
		<th>28 C</th>
		<th>78%</th>
	</tr>
	<tr>
		<!--These are all placeholders-->
		<th>25-01-21</th>
		<th>20:41:03</th>
		<th>China</th>
		<th>28 C</th>
		<th>78%</th>
	</tr>
	<tr>
		<!--These are all placeholders-->
		<th>25-01-21</th>
		<th>20:41:03</th>
		<th>China</th>
		<th>28 C</th>
		<th>78%</th>
	</tr>

</table>

</br>
<button><a href="table_data_humidity_asia.php" download="WeatherData.xml">Download this data!</button>
<!--Removed the back button, the university logo will be used to go back to home in the future-->
</body>
</html>