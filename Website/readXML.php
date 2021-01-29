<!-- for testing purposes, will be added to map.php later-->
<?php
	echo "<table>";
	echo "<tr>";
	echo "<th>Country code</th>";
	echo "<th>Date</th>";
	echo "<th>Time</th>";
	echo "<th>Air pressure</th>";
	echo "<th>Air pressure at sea level</th>";
	echo "</tr>";

	$xmldata = simplexml_load_file("WeatherData.xml") or die("Failed to load file");
	for($i=0; $i<7; $i++){
	echo "<tr>";
	echo "<td> " . $xmldata->MEASUREMENT[$i]->STN . "</td></br>";
	echo "<td> " . $xmldata->MEASUREMENT[$i]->DATE . "</td>";
	echo "<td>" . $xmldata->MEASUREMENT[$i]->TIME . "</td>";
	echo "<td>" . $xmldata->MEASUREMENT[$i]->STP . "</td>";
	echo "<td>" . $xmldata->MEASUREMENT[$i]->SLP . "</td>";
	echo "</tr>";
	}

	echo "</table>";

?>