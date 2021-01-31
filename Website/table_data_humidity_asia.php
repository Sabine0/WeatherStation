<?php 
require "header.php";
?>
<!--Humidity of the top 10 weather stations in Asia which have an average temparture between 27-29.5c
Downloadable data in XML format-->

<!DOCTYPE html>
<html>
    <head>
        <title>Humidity in Asia</title>
        <link rel="stylesheet" href="CSS/styling.css">
        <meta http-equiv="refresh" content="30">
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
                        $asia = array('ARMENIA','AZERBAIJAN','BAHRAIN','BANGLADESH','BHUTAN','BRUNEI', 'COMBODIA','CHINA','CYPRUS','GEORGIA','INDIA','INDONESIA','IRAN','IRAQ','ISREAL', 'JAPAN','JORDAN','KAZAKHSTAN','KUWAIT','KRYGZSTAN','LAOS','LEBANON','MALAYSIA','MALDIVES','MONGOLIA','MYANMAR','NEPAL','NORTH KOREA','OMAN','PAKISTAN','PALESTINE','PHILIPPINES','QATAR','RUSSIA','SAUDI ARABIA','SINGAPORE','SOUTH KOREA','SRI LANKA','SYRIA','TAIWAN','TAJIKISTAN','THAILAND','TIMOR LESTE','TURKEY','TURKMENISTAN','UNITED ARAB EMIRATES','UZBEKISTAN','VIETNAM','YEMEN');

                        //To be continued?
						// foreach($xmldata->MEASUREMENT as $item){	
							//Get the station code
                            // $stationCode = (string)$item->STN;
                            
                            //Find country matching the station code
                            // $stationCountry = getStationCountry($conn, $user, $stationCode)['country'];

                            //Only process data if country is in Asia
							// if(in_array($stationCountry, $asia)){
								// print_r($item);


								//array: $asiaStations = STN => array(DATE => array(temperatures))

								// if $stationCode is in $asiaStations:
									// does current_date exist in dateArray?
										//yes: add temperature to temperatureArray where key=current_date
										//no: add current_date to current_STN and add current_temperature to temperature array
									//else: add $stationCode to $asiaStation

							// }
						// }



                        //Iterate through XML
                        foreach ($xmldata->MEASUREMENT as $item){
                            //Get the station code
                            $stationCode = (string)$item->STN;
                            //echo $stationCode . " ";
                            
                            //Find country matching the station code
                            $stationCountry = getStationCountry($conn, $user, $stationCode)['country'];
                            //echo $stationCountry . ", ";

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