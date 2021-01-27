<?php 
    require 'header.php'; 
?>

<!--Clickable weather stations: data in a table (or graph) as live as possible. (up to 1 week)-->
<html>
	<head>
            <title>Map of the Philippines</title>
            <link rel="stylesheet" href="CSS/styling.css">
	</head>

            <body>
                <div class='map-container-left'>
                    <h2>Weather stations in the Philippines</h2>
                    <p>Click on the desired weather station to show weather data</p>

                    <img src="map_Philippines.png" alt="mapPhilippines" usemap="#weatherstations" width="1300" height="1400">

                    <!--NEEDS TO BE CHANGED TO THE CORRECT LOCATIONS AND COORDINATES!!-->
                    <map name="weatherstations"> 
                        <!--pixels from left, pixels from top, pixels from left, pixels from top-->
                        <area shape="rect" coords="580, 50, 610, 80" alt="Basco" href="table_data_airpressure.php">
                        <area shape="rect" coords="490, 240, 510, 260" alt="Laoag" href="table_data_airpressure.php">
                        <area shape="rect" coords="480, 270, 500, 290" alt="Sinait" href="table_data_airpressure.php">
                        <area shape="rect" coords="570, 230, 590, 250" alt="Aparri" href="table_data_airpressure.php">
                        <area shape="rect" coords="445, 475, 465, 495" alt="Iba" href="table_data_airpressure.php">
                        <area shape="rect" coords="470, 420, 490, 440" alt="Dagupan" href="table_data_airpressure.php">
                        <area shape="rect" coords="490, 390, 510, 410" alt="Baguio" href="table_data_airpressure.php">
                        <area shape="rect" coords="530, 465, 550, 485" alt="Cabanatuan" href="table_data_airpressure.php">
                        <area shape="rect" coords="520, 545, 540, 565" alt="Manila" href="table_data_airpressure.php">
                        <area shape="rect" coords="460, 520, 480, 540" alt="Subic Bay" href="table_data_airpressure.php">
                        <area shape="rect" coords="525, 530, 545, 550" alt="Science garden" href="table_data_airpressure.php">
                        <area shape="rect" coords="535, 640, 555, 660" alt="Calapan" href="table_data_airpressure.php">
                        <area shape="rect" coords="525, 735, 545, 755" alt="Ambulong" href="table_data_airpressure.php">
                        <area shape="rect" coords="545, 540, 565, 560" alt="Tanay" href="table_data_airpressure.php">
                        <area shape="rect" coords="665, 580, 685, 600" alt="Daet" href="table_data_airpressure.php">
                        <area shape="rect" coords="725, 660, 745, 680" alt="Legaspi" href="table_data_airpressure.php">
                        <area shape="rect" coords="760, 625, 780, 645" alt="Virac" href="table_data_airpressure.php">
                        <area shape="rect" coords="775, 615, 795, 635" alt="Catanduanes radar" href="table_data_airpressure.php">
                        <area shape="rect" coords="525, 720, 545, 740" alt="San Jose" href="table_data_airpressure.php">
                        <area shape="rect" coords="615, 705, 635, 725" alt="Romblon" href="table_data_airpressure.php">
                        <area shape="rect" coords="615, 705, 635, 725" alt="Romblon" href="table_data_airpressure.php">

                    </map>
                </div>
                
                <div class='map-container-right'>
                    <h2>Weather data of station:</h2>
                    <p>*Current weather station*</p>
                </div>
            </body>
</html>

<!--
BESTAAT NIET
 (983270,'CLARK AB','PHILIPPINES',15.167,120.567,155),
 (983275,'CLARK INTL','PHILIPPINES',15.183,120.55,151),
 (984280,'SANGLEY POINT AB','PHILIPPINES',14.5,120.917,2.1),
 (984290,'NINOY AQUINO INTERN','PHILIPPINES',14.517,121,15),

 
 (985380,'ROXAS','PHILIPPINES',11.583,122.75,4),
 (985430,'MASBATE','PHILIPPINES',12.367,123.617,6),
 (985460,'CATARMAN','PHILIPPINES',12.5,124.633,7),
 (985480,'CATBALOGAN','PHILIPPINES',11.783,124.883,5),
 (985500,'TACLOBAN','PHILIPPINES',11.25,125,3),
 (985530,'BORONGAN','PHILIPPINES',11.65,125.433,3),
 (985580,'GUIUAN','PHILIPPINES',11.033,125.733,60),
 (986180,'PUERTO PRINCESA','PHILIPPINES',9.75,118.733,15),
 (986370,'ILOILO','PHILIPPINES',10.7,122.567,8),
 (986420,'DUMAGUETE','PHILIPPINES',9.3,123.3,8),
 (986440,'TAGBILARAN','PHILIPPINES',9.6,123.85,8),
 (986450,'LAHUG','PHILIPPINES',10.333,123.9,35),
 (986460,'MACTAN','PHILIPPINES',10.3,123.967,24),
 (986530,'SURIGAO','PHILIPPINES',9.8,125.5,55),
 (987470,'LUMBIA AIRPORT','PHILIPPINES',8.433,124.283,188),
 (987480,'CAGAYAN DE ORO','PHILIPPINES',8.483,124.633,6),
 (987520,'BUTUAN','PHILIPPINES',8.933,125.517,46),
 (987530,'DAVAO AIRPORT','PHILIPPINES',7.117,125.65,18),
 (987550,'HINATUAN','PHILIPPINES',8.367,126.333,3),
 (988360,'ZAMBOANGA','PHILIPPINES',6.9,122.067,6),
 (988510,'GEN. SANTOS','PHILIPPINES',6.117,125.183,15)

 ->