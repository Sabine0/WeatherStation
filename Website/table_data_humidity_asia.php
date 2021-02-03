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
                <h2> Top 10 weather stations in Asia with the highest humidity per day</h2>
                <h3> Limited to the weather stations with a daily temperature between 27 and 29.5</h3>
                <table id="weatherdata">
                    <tr>
                        <th>Weatherstation</th>
                        <th>Date</th>
                        <th>Country</th>
                        <th>Average temperature</th>
                        <th>Humidity</th>
                    </tr>

                    <?php
                        require_once 'dbcon_unwdmi.php';
                        require_once 'functions.php';

                        $xmldata = simplexml_load_file("WeatherData.xml") or die("Failed to load file");

                        //All countries in Asia
                        $asia = array('ARMENIA','AZERBAIJAN','BAHRAIN','BANGLADESH','BHUTAN','BRUNEI', 'COMBODIA','CHINA','CYPRUS','GEORGIA','INDIA','INDONESIA','IRAN','IRAQ','ISREAL', 'JAPAN','JORDAN','KAZAKHSTAN','KUWAIT','KRYGZSTAN','LAOS','LEBANON','MALAYSIA','MALDIVES','MONGOLIA','MYANMAR','NEPAL','NORTH KOREA','OMAN','PAKISTAN','PALESTINE','PHILIPPINES','QATAR','RUSSIA','SAUDI ARABIA','SINGAPORE','SOUTH KOREA','SRI LANKA','SYRIA','TAIWAN','TAJIKISTAN','THAILAND','TIMOR LESTE','TURKEY','TURKMENISTAN','UNITED ARAB EMIRATES','UZBEKISTAN','VIETNAM','YEMEN');

                        $asiaData = array();
                        //Iterate through the XML file
                        foreach($xmldata->MEASUREMENT as $item){ 
                            $stationCode = (string)$item->STN;
                            // Find country matching the station code
                            $stationCountry = getStationCountry($conn, $user, $stationCode)['country'];
                            $stationDate = (string)$item->DATE;
                            $stationTemp = (float)$item->TEMP;
                            $stationHumidity = (float)$item->CLDC;

                            // Only process data if country is in Asia
                            if(in_array($stationCountry, $asia)){
                                if(!array_key_exists($stationCode, $asiaData)){
                                    $asiaData[$stationCode] = [];
                                }

                                if(!array_key_exists($stationDate, $asiaData[$stationCode])) {
                                    $asiaData[$stationCode][$stationDate] = array(array(), array());
                                }
                        
                                $asiaData[$stationCode][$stationDate][0][] = $stationTemp;
                                $asiaData[$stationCode][$stationDate][1][] = $stationHumidity;
                            }
                        }

                        $asiaAverages = array();
                        //Iterate through array
                        foreach($asiaData as $name=>$station) {

                            $dailyTemp = 0;
                            $dailyHumid = 0;

                            foreach($station as $date) {

                                $temp_acc = 0;
                                $humid_acc = 0;

                                foreach($date[0] as $temp) {
                                    $temp_acc += $temp;

                                }

                                foreach($date[1] as $humid) {
                                    $humid_acc += $humid;
                                }

                                $dailyTemp += $temp_acc / count($date[0]);
                                $dailyHumid += $humid_acc / count($date[1]);

                            }

                            $averageTemp = $dailyTemp / count($station);
                            $averageHumid = $dailyHumid / count($station);


                            if ($averageTemp > 27 && $averageTemp < 29.5) {
                                $asiaAverages[$name] = array($averageTemp, $averageHumid);
                            }
                        }

                        $len = count($asiaAverages);

                        uasort($asiaAverages, function($first, $second) {
                            if ($first[1] == $second[1]) return 0;
                            return ($first[1] < $second[1]) ? 1 : -1;
                        });

                        $top10 = array_slice($asiaAverages, 0, 9 , true);

                        //Iterate through created array
                        foreach ($asiaAverages as $stationCode => $winner){
                            //Find country matching the station code
                            $stationCountry = strtolower(getStationCountry($conn, $user, $stationCode)['country']);

                            //Get name of current weatherstation
                            $currentWeatherstation = implode(" ", getWeatherstation($conn, $user, $stationCode));                         
                            $currentWeatherstation = ucfirst(strtolower($currentWeatherstation));
                            
                                echo "<tr>";
                                    echo "<td> " . $currentWeatherstation . "</td>";
                                    echo "<td> " . (string)$item->DATE . "</td>";
                                    echo "<td> " . ucfirst($stationCountry) . "</td>";
                                    echo "<td> " . (string)$winner[0] . " ℃" . "</td>";
                                    echo "<td> " . (string)$winner[1] .  "%</td>";
                                echo "</tr>"; 
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