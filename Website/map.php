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
      <map name="weatherstations" id="weatherstations"> 
      <!--pixels from left, pixels from top, pixels from left, pixels from top-->
        <area shape="rect" coords="590, 50, 610, 70" alt="Basco" href="map.php">
        <area shape="rect" coords="490, 240, 510, 260" alt="Laoag" href="map.php">
        <area shape="rect" coords="480, 270, 500, 290" alt="Sinait" href="map.php">
        <area shape="rect" coords="570, 230, 590, 250" alt="Aparri" href="map.php">
        <area shape="rect" coords="445, 475, 465, 495" alt="Iba" href="map.php">
        <area shape="rect" coords="470, 420, 490, 440" alt="Dagupan" href="map.php">
        <area shape="rect" coords="490, 390, 510, 410" alt="Baguio" href="map.php">
        <area shape="rect" coords="530, 465, 550, 485" alt="Cabanatuan" href="map.php">
        <area shape="rect" coords="520, 545, 540, 565" alt="Manila" href="map.php">
        <area shape="rect" coords="460, 520, 480, 540" alt="Subic Bay" href="map.php">
        <area shape="rect" coords="525, 530, 545, 550" alt="Science garden" href="map.php">
        <area shape="rect" coords="535, 640, 555, 660" alt="Calapan" href="map.php">
        <area shape="rect" coords="525, 735, 545, 755" alt="Ambulong" href="map.php">
        <area shape="rect" coords="545, 540, 565, 560" alt="Tanay" href="map.php">
        <area shape="rect" coords="665, 580, 685, 600" alt="Daet" href="map.php">
        <area shape="rect" coords="725, 660, 745, 680" alt="Legaspi" href="map.php">
        <area shape="rect" coords="760, 625, 780, 645" alt="Virac" href="map.php">
        <area shape="rect" coords="775, 615, 795, 635" alt="Catanduanes radar" href="map.php">
        <area shape="rect" coords="525, 720, 545, 740" alt="San Jose" href="map.php">
        <area shape="rect" coords="615, 705, 635, 725" alt="Romblon" href="map.php">
        <area shape="rect" coords="655, 790, 675, 810" alt="Roxas" href="map.php">
        <area shape="rect" coords="710, 720, 730, 740" alt="Masbate" href="map.php">
        <area shape="rect" coords="795, 715, 815, 735" alt="Catarman" href="map.php">
        <area shape="rect" coords="815, 770, 835, 790" alt="Catbalogan" href="map.php">
        <area shape="rect" coords="850, 795, 870, 815" alt="Borongan" href="map.php">
        <area shape="rect" coords="820, 810, 840, 830" alt="Tacloban" href="map.php">
        <area shape="rect" coords="880, 830, 900, 850" alt="Guiuan" href="map.php">
        <area shape="rect" coords="345, 920, 365, 940" alt="Puerto Princesa" href="map.php">
        <area shape="rect" coords="640, 860, 660, 880" alt="Iloilo" href="map.php">
        <area shape="rect" coords="695, 975, 715, 995" alt="Dumaguete" href="map.php">
        <area shape="rect" coords="740, 945, 760, 965" alt="Tagbilaran" href="map.php">
        <area shape="rect" coords="740, 890, 760, 910" alt="Lahug" href="map.php">
        <area shape="rect" coords="740, 905, 760, 925" alt="Mactan" href="map.php">
        <area shape="rect" coords="860, 930, 880, 950" alt="Surigao" href="map.php">
        <area shape="rect" coords="785, 1055, 805, 1075" alt="Lumbia Airport" href="map.php">
        <area shape="rect" coords="795, 1040, 815, 1060" alt="Cagayan de Oro" href="map.php">
        <area shape="rect" coords="860, 1005, 880, 1025" alt="Butuan" href="map.php">
        <area shape="rect" coords="870, 1160, 890, 1180" alt="Davao Airport" href="map.php">
        <area shape="rect" coords="925, 1045, 945, 1065" alt="Hinatuan" href="map.php">
        <area shape="rect" coords="600, 1165, 620, 1185" alt="Zamboanga" href="map.php">
        <area shape="rect" coords="" alt="Gen. Santos" href="map.php">
        <!-- die laaste moet nog im lazy-->
      </map>

    </div>
        
    <div class='map-container-right'>
      <h2>Weather data of station:</h2>
      <p>*Current weather station*</p>
      </br>
      <table style="width:100%" border = 1px>
        <tr>
          <th>Date</th>
          <th>Air pressure</th>
          <th>Air pressure at sea level</th>
        </tr>
        <tr>
        <!--These are all placeholders-->
          <td>25-01-21</td>
          <td>1013.25</td>
          <td>1013.25</td>
        </tr>
        <tr>
        <!--These are all placeholders-->
          <td>26-01-21</td>
          <td>1013.25</td>
          <td>1013.25</td>
          </tr>
        <tr>
         <!--These are all placeholders-->
          <td>27-01-21</td>
          <td>1013.25</td>
          <td>1013.25</td>
        </tr>
        <tr>
         <!--These are all placeholders-->
          <td>28-01-21</td>
          <td>1013.25</td>
          <td>1013.25</td>
        </tr>
        <tr>
         <!--These are all placeholders-->
          <td>29-01-21</td>
          <td>1013.25</td>
          <td>1013.25</td>
        </tr>
        <tr>
         <!--These are all placeholders-->
          <td>30-01-21</td>
          <td>1013.25</td>
          <td>1013.25</td>
        </tr>
        <tr>
         <!--These are all placeholders-->
          <td>31-01-21</td>
          <td>1013.25</td>
          <td>1013.25</td>
        </tr>

      </table>
      </br>
      <button><a href="map.php" download="WeatherData.xml">Download this data!</button>
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