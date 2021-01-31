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
                <tr>
                    <th>Country code</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Air pressure</th>
                    <th>Air pressure at sea level</th>
                </tr>
                
                <?php  
                    require_once 'dbcon_unwdmi.php';
                    require_once 'functions.php';
                   
                    $currentSTN = implode(" ", getStationCode($conn, $user, $weatherstation));       
                
                    $xmldata = simplexml_load_file("WeatherData.xml") or die("Failed to load file");
                    // Variable that counts how many times data is printed
                    $count = 0;
                    // Max of $count;
                    $max = 7;
                    
                    // iterate through xml file
                    foreach($xmldata->MEASUREMENT as $item) {
                        if ($item->STN == $currentSTN) {
                            if ($count < $max) {
                                echo "<tr>";
                                    echo "<td> " . (string)$item->STN;
                                    echo "<td> " . (string)$item->DATE;
                                    echo "<td> " . (string)$item->TIME;
                                    echo "<td> " . (string)$item->STP;
                                    echo "<td> " . (string)$item->SLP;
                                echo "</tr>";
                                $count++;
                            }
                        }
                    }
                    // If no data was found of the station
                    // Print 1 row 
                    if ($count == 0){
                        echo "<tr>";
                            echo "<td> " . "No data found";
                            echo "<td> " . "x";
                            echo "<td> " . "x";
                            echo "<td> " . "x";
                            echo "<td> " . "x";
                        echo "</tr>";
                    }
                ?>
  
            </table>
            </br>
            
            <!--Data is only downloadable if user is logged in-->
            <?php if(!empty($_SESSION['username'])){ ?>
                <button><a href="map.php" download="WeatherData.xml">Download this data!</a></button>
            <?php } 
                }
            ?>
            
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