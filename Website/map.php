<?php 
    require 'header.php';
?>

<!--Clickable weather stations: data in a table (or graph) as live as possible. (up to 1 week)-->
<html>
    <head>
        <title>Map of the Philippines</title>
        <link rel="stylesheet" href="CSS/styling.css">
        <meta http-equiv="refresh" content="30">
    </head>

    <body>
        <div class='map-container-left'>
            <h2>Weather stations in the Philippines</h2>
            <p>Click on the desired weather station to show air pressure</p>

            <img src="afbeeldingen/map.jpg" alt="mapPhilippines" usemap="#weatherstations" width="1300" height="1400">

            <map name="weatherstations" id="weatherstations"> 
                <!--pixels from left, pixels from top, pixels from left, pixels from top-->
                <area shape="rect" coords="590, 50, 610, 70" alt="Basco" href="map.php?weatherstation=Basco">
                <area shape="rect" coords="490, 240, 510, 260" alt="Laoag" href="map.php?weatherstation=Laoag">
                <area shape="rect" coords="480, 270, 500, 290" alt="Sinait" href="map.php?weatherstation=Sinait">
                <area shape="rect" coords="570, 230, 590, 250" alt="Aparri" href="map.php?weatherstation=Aparri">
                <area shape="rect" coords="445, 475, 465, 495" alt="Iba" href="map.php?weatherstation=Iba">
                <area shape="rect" coords="470, 420, 490, 440" alt="Dagupan" href="map.php?weatherstation=Dagupan">
                <area shape="rect" coords="490, 390, 510, 410" alt="Baguio" href="map.php?weatherstation=Baguio">
                <area shape="rect" coords="530, 465, 550, 485" alt="Cabanatuan" href="map.php?weatherstation=Cabanatuan">
                <area shape="rect" coords="520, 545, 540, 565" alt="Manila" href="map.php?weatherstation=Manila">
                <area shape="rect" coords="460, 520, 480, 540" alt="Subic Bay" href="map.php?weatherstation=Subic+Bay">
                <area shape="rect" coords="525, 530, 545, 550" alt="Science garden" href="map.php?weatherstation=Science+garden">
                <area shape="rect" coords="535, 640, 555, 660" alt="Calapan" href="map.php?weatherstation=Calapan">
                <area shape="rect" coords="525, 735, 545, 755" alt="Ambulong" href="map.php?weatherstation=Ambulong">
                <area shape="rect" coords="545, 540, 565, 560" alt="Tanay" href="map.php?weatherstation=Tanay">
                <area shape="rect" coords="665, 580, 685, 600" alt="Daet" href="map.php?weatherstation=Daet">
                <area shape="rect" coords="725, 660, 745, 680" alt="Legaspi" href="map.php?weatherstation=Legaspi">
                <area shape="rect" coords="760, 625, 780, 645" alt="Virac" href="map.php?weatherstation=Virac">
                <area shape="rect" coords="775, 615, 795, 635" alt="Catanduanes radar" href="map.php?weatherstation=Catanduanes+radar">
                <area shape="rect" coords="525, 720, 545, 740" alt="San Jose" href="map.php?weatherstation=San+Jose">
                <area shape="rect" coords="615, 705, 635, 725" alt="Romblon" href="map.php?weatherstation=Romblon">
                <area shape="rect" coords="655, 790, 675, 810" alt="Roxas" href="map.php?weatherstation=Roxas">
                <area shape="rect" coords="710, 720, 730, 740" alt="Masbate" href="map.php?weatherstation=Masbate">
                <area shape="rect" coords="795, 715, 815, 735" alt="Catarman" href="map.php?weatherstation=Catarman">
                <area shape="rect" coords="815, 770, 835, 790" alt="Catbalogan" href="map.php?weatherstation=Catbalogan">
                <area shape="rect" coords="850, 795, 870, 815" alt="Borongan" href="map.php?weatherstation=Borongan">
                <area shape="rect" coords="820, 810, 840, 830" alt="Tacloban" href="map.php?weatherstation=Tacloban">
                <area shape="rect" coords="880, 830, 900, 850" alt="Guiuan" href="map.php?weatherstation=Guiuan">
                <area shape="rect" coords="345, 920, 365, 940" alt="Puerto Princesa" href="map.php?weatherstation=Puerto+Princesa">
                <area shape="rect" coords="640, 860, 660, 880" alt="Iloilo" href="map.php?weatherstation=Iloilo">
                <area shape="rect" coords="695, 975, 715, 995" alt="Dumaguete" href="map.php?weatherstation=Dumaguete">
                <area shape="rect" coords="740, 945, 760, 965" alt="Tagbilaran" href="map.php?weatherstation=Tagbilaran">
                <area shape="rect" coords="740, 890, 760, 910" alt="Lahug" href="map.php?weatherstation=Lahug">
                <area shape="rect" coords="740, 905, 760, 925" alt="Mactan" href="map.php?weatherstation=Mactan">
                <area shape="rect" coords="860, 930, 880, 950" alt="Surigao" href="map.php?weatherstation=Surigao">
                <area shape="rect" coords="785, 1055, 805, 1075" alt="Lumbia Airport" href="map.php?weatherstation=Lumbia+Airport">
                <area shape="rect" coords="795, 1040, 815, 1060" alt="Cagayan de Oro" href="map.php?weatherstation=Cagayan+de+Oro">
                <area shape="rect" coords="860, 1005, 880, 1025" alt="Butuan" href="map.php?weatherstation=Butuan">
                <area shape="rect" coords="870, 1160, 890, 1180" alt="Davao Airport" href="map.php?weatherstation=Davao+Airport">
                <area shape="rect" coords="925, 1045, 945, 1065" alt="Hinatuan" href="map.php?weatherstation=Hinatuan">
                <area shape="rect" coords="600, 1165, 620, 1185" alt="Zamboanga" href="map.php?weatherstation=Zamboanga">
                <area shape="rect" coords="830, 1240, 850, 1260" alt="Gen. Santos" href="map.php?weatherstation=Gen.+Santos">
            </map>
        </div>
        
        <?php  
            if (isset($_GET["weatherstation"])) { 
            $weatherstation = str_replace("+", " ", $_GET["weatherstation"]);
        ?>
        
        <div class='map-container-right'>
            <h2>Weather data of station:</h2>
            
            <p><?php echo $weatherstation; ?></p>
            </br>
            <table id="weatherdata">
                <h2>Most recent</h2>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Air pressure</th>
                    <th>Air pressure at sea level</th>
                </tr>
                
                <?php  
                    require_once 'dbcon_unwdmi.php';
                    require_once 'functions.php';
                    // get current STN
                    $currentSTN = implode(" ", getStationCode($conn, $user, $weatherstation));       
                    // load file in variable
                    $xmldata = simplexml_load_file("WeatherData.xml") or die("Failed to load file");
                    // Variable that counts every loop for measurements array
                    $i = 0;
                    // Variable that counts how many times data is printed
                    $countRowsMostRecent = 0;
                    // Max rows in table;
                    $maxRows = 10;
                    // all measures ar in this array
                    $measurements = array();
                    // array of live data in table for download
                    $mostRecentData = array(); 
                    // generate code that we can use to print the date of last week
                    $lastWeekCode=strtotime("last week");
                    // date of today
                    $dateLastWeek = date("Y-m-d", $lastWeekCode);
                    
                    // put all data from the last week in $measurements 
                    foreach($xmldata->MEASUREMENT as $item) {
                        if ($item->STN == $currentSTN) {
                            if ($dateLastWeek <= $item->DATE) {
                                $measurements[$i]['DATE'] = (string)$item->DATE;
                                $measurements[$i]['TIME'] = (string)$item->TIME;
                                $measurements[$i]['STP'] = (string)$item->STP;
                                $measurements[$i]['SLP'] = (string)$item->SLP;

                                $i++;
                            }
                        }
                    }                     
                    
                    // reverse array so that we can read the most recent values first
                    $reversedMeasurements = array_reverse($measurements, true);
                    
                    // print rows of table Most Recent
                    foreach($reversedMeasurements as $row) { 
                        // only print if there are less rows printed than maxRows
                        if ($countRowsMostRecent < $maxRows) {
                            echo "<tr>";
                                echo "<td> " . $row['DATE'] . "</td>";
                                echo "<td> " . $row['TIME'] . "</td>";
                                echo "<td> " . $row['STP'] . " mbar" . "</td>";
                                echo "<td> " . $row['SLP'] . " mbar" . "</td>";
                            echo "</tr>";

                            // put the data in array so that the use can download the displayed data
                            $mostRecentData[$countRowsMostRecent]['DATE'] = $row['DATE'];
                            $mostRecentData[$countRowsMostRecent]['TIME'] = $row['TIME'];
                            $mostRecentData[$countRowsMostRecent]['STP'] = $row['STP'];
                            $mostRecentData[$countRowsMostRecent]['SLP'] = $row['SLP'];

                            $countRowsMostRecent++;
                        }
                    }
                    
                    // transform mostRecentData array to an XML file
                    array_to_xml_most_recent_data($mostRecentData);
                    
                    // is true if no row is printed in the table
                    $tableMostRecentEmpty = false;
                    // If no data was found of the station
                    // Print 1 row 
                    if ($countRowsMostRecent == 0){
                        $tableMostRecentEmpty = true;
                        echo "<tr>";
                            echo "<td> " . "No data found" . "</td>";
                            echo "<td> " . "-" . "</td>"; 
                            echo "<td> " . "-" . "</td>";
                            echo "<td> " . "-" . "</td>";
                        echo "</tr>";
                    }
                ?>
  
            </table>
            
            <!--Data is only downloadable if user is logged in and table has atleast 1 row printed of values-->
            <?php if(!empty($_SESSION['username']) and !$tableMostRecentEmpty){ ?> </br>
                <button><a href="measurements.xml" download="measurements.xml">Download this data!</a></button> 
            <?php } ?>
            
            <!--PRINT TABLE Last 7 days-->
            </br>
            <table id="weatherdata">
                </br>
                <h2> Last 7 days </h2>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Air pressure</th>
                    <th>Air pressure at sea level</th>
                </tr>
                <?php
                    // count rows of tabe Last 7 days
                    $countRowsLastWeek = 0;
                    // array of data from last 7 days in table for download
                    $dataLastWeek = array();
                    // is true if no row is printed in the table
                    $tableLastWeekEmpty = false;
                  $dataPerDay = array();
                    
                    
                    
                    for ($i=0; $i < 7; $i++) {
                        $date = date("Y-m-d", strtotime("-" . $i . " days"));
                        $dataPerDay[$i] = 'Empty';
                        
                        foreach ($reversedMeasurements as $row) {
                            if ($row['DATE'] == $date) {                               
                                    echo "<tr>";
                                        echo "<td> " . $row['DATE'] . "</td>";
                                        echo "<td> " . $row['TIME'] . "</td>";
                                        echo "<td> " . $row['STP'] . " mbar" . "</td>";
                                        echo "<td> " . $row['SLP'] . " mbar" . "</td>";
                                    echo "</tr>";

                                    // put the data in array so that the use can download the displayed data
                                    $dataLastWeek[$countRowsLastWeek]['DATE'] = $row['DATE'];
                                    $dataLastWeek[$countRowsLastWeek]['TIME'] = $row['TIME'];
                                    $dataLastWeek[$countRowsLastWeek]['STP'] = $row['STP'];
                                    $dataLastWeek[$countRowsLastWeek]['SLP'] = $row['SLP'];
                                    
                                    $dataPerDay[$i] = $row['STP'];
                                    
                            }
                        }
                    }
                    
                    //print_r($dataPerDay);
                
                


                    // print rows of table Last 7 days
//                    foreach($reversedMeasurements as $row) { 
//                        // only print if there are less rows printed than maxRows
//                        if ($countRowsLastWeek < $maxRows) {
//                            echo "<tr>";
//                                echo "<td> " . $row['DATE'] . "</td>";
//                                echo "<td> " . $row['TIME'] . "</td>";
//                                echo "<td> " . $row['STP'] . " mbar" . "</td>";
//                                echo "<td> " . $row['SLP'] . " mbar" . "</td>";
//                            echo "</tr>";
//
//                            // put the data in array so that the use can download the displayed data
//                            $dataLastWeek[$countRowsLastWeek]['DATE'] = $row['DATE'];
//                            $dataLastWeek[$countRowsLastWeek]['TIME'] = $row['TIME'];
//                            $dataLastWeek[$countRowsLastWeek]['STP'] = $row['STP'];
//                            $dataLastWeek[$countRowsLastWeek]['SLP'] = $row['SLP'];
//
//                            $countRowsLastWeek++;
//                        }
//                    }

                    // transform mostRecentData array to an XML file
                    array_to_xml_last_week_data($dataLastWeek);

                    // If no data was found of the station
                    // Print 1 row 
                    if ($countRowsMostRecent == 0){
                        $tableLastWeekEmpty = true;
                        echo "<tr>";
                            echo "<td> " . "No data found" . "</td>";
                            echo "<td> " . "-" . "</td>"; 
                            echo "<td> " . "-" . "</td>";
                            echo "<td> " . "-" . "</td>";
                        echo "</tr>";
                    }

                ?> 
                
            </table>
            
            <!--Data is only downloadable if user is logged in and table has atleast 1 row printed of values-->
            <?php if(!empty($_SESSION['username']) and !$tableLastWeekEmpty){ ?> </br>
                <button><a href="Measurements_Air_Pressure_Philippines_Last_Week.xml" download="Measurements_Air_Pressure_Philippines_Last_Week.xml">Download this data!</a></button> 
            <?php } ?>
            
            <?php } ?>
            
        </div>
    </body>
</html>

<!--
BESTAAT NIET
 (983270,'CLARK AB','PHILIPPINES',15.167,120.567,155),
 (983275,'CLARK INTL','PHILIPPINES',15.183,120.55,151),
 (984280,'SANGLEY POINT AB','PHILIPPINES',14.5,120.917,2.1),
 (984290,'NINOY AQUINO INTERN','PHILIPPINES',14.517,121,15),
 ->