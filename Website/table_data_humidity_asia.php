<?php 
require "header.php";
?>
<!--Humidity of the top 10 weather stations in Asia which have an average temparture between 27-29.5c
Downloadable data in XML format-->

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/styling.css">
        <title>Humidity in Asia</title>
        <style>
            table {
              margin: 0 auto; 
              margin-top: 2%;
            }
        </style>
    </head>
        <body>
            <div class="container-humidity-asia">
                <h2> Humidity of top 10 weather stations in Asia with an average temperature between 27 and 29.5 degrees Celcius.</h2>
                <table id="weatherdata">
                    <tr>
                        <th>STN</th> <!--Only for testing-->
                        <th>Weatherstation</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Avg temperature</th>
                        <th>Humidity</th>
                    </tr>

                    <?php
                        require_once 'dbcon_unwdmi.php';
                        require_once 'functions.php';

                        $xmldata = simplexml_load_file("WeatherData.xml") or die("Failed to load file");

                        //All countries in Asia
                        $asia = array('Armenia','Azerbaijan','Bahrain','Bangladesh','Bhutan','Brunei', 'Cambodia','China','Cyprus','Georgia','India','Indonesia','Iran','Iraq','Israel', 'Japan','Jordan','Kazakhstan','Kuwait','Kyrgyzstan','Laos','Lebanon','Malaysia','Maldives','Mongolia','Myanmar','Nepal','North Korea','Oman','Pakistan','Palestine','Philippines','Qatar','Russia','Saudi Arabia','Singapore','South Korea','Sri Lanka','Syria','Taiwan','Tajikistan','Thailand','Timor Leste','Turkey','Turkmenistan','United Arab Emirates','Uzbekistan','Vietnam','Yemen');

                        //Iterate through XML
                        foreach ($xmldata->MEASUREMENT as $item){
                            //Get the station code
                            $stationCode = (string)$item->STN;
                            //echo $stationCode . " ";
                            
                            //Find country matching the station code
                            $stationCountry = strtolower(getStationCountry($conn, $user, $stationCode)['country']);
                            //echo $stationCountry . ", ";
                            $stationCountry = ucfirst($stationCountry); //This is scuffed and needs a workaround but works for now :(
                            //echo $stationCountry . " ";

                            if(in_array($stationCountry, $asia)){                            
                            //Get name of current weatherstation
                            $currentWeatherstation = implode(" ", getWeatherstation($conn, $user, $stationCode));                         
                            $currentWeatherstation = ucfirst(strtolower($currentWeatherstation));
                            
                                echo "<tr>";
                                    echo "<td> " . (string)$item->STN . "</td>"; // Only for testing
                                    echo "<td> " . $currentWeatherstation . "</td>";
                                    echo "<td> " . (string)$item->DATE . "</td>";
                                    echo "<td> " . (string)$item->TIME . "</td>";
                                    echo "<td> " . $stationCountry . "</td>";
                                    echo "<td> " . (string)$item->TEMP . " ℃" . "</td>"; // Has to be changed to average temperature!
                                    echo "<td> " . (string)$item->CLDC .  "%</td>";
                                echo "</tr>";
                            }	
                        }
                    ?>
                </table>

                </br>
                <?php if(!empty($_SESSION['username'])){ ?>
                    <button text-align="right"><a href="table_data_humidity_asia.php" download="WeatherData.xml">Download this data!</button>
                <?php } ?>
            </div>
        </body>
</html>