<?php
    require 'header.php';
?>

<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="CSS/styling.css">
    </head>
        <body>
            <div class="bg-image"></div>
            <div class ="signup-background">
                <div class="login-box">

                    <h1>Sign up</h1>
                    <form action="signup_code.php" method="POST">

                        <div class="textbox">
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Enter username" name="uname" required>
                        </div>

                        <div class="textbox">
                            <i class="fa fa-lock"></i>
                            <input type="Password" placeholder="Enter password" name="pswd" required>
                        </div>
                        
                        <div class="textbox">
                            <i class="fa fa-lock"></i>
                            <input type="Password" placeholder="Repeat password" name="pswdRepeat" required>
                        </div>
                        
                        <div style="padding-top: 10px">
                            <p class="alignleft">
                                <input type="submit" name="submit" value="Login">
                            </p>
                        </div>

                    </form>

                </div>
            </div>

            <?php
                // when de URL contains an error, display text 
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "invalidusername") {
                        echo "<p>De username bevat tekens die niet zijn toegestaan.";
                    }
                    else if ($_GET["error"] == "usernametaken") {
                        echo "<p>De door u ingevoerde username bestaat al. Probeer een andere username.";
                    }
                    else if ($_GET["error"] == "passwordsdontmatch") {
                        echo "<p>De ingevoerde wachtwoorden komen niet overeen.";
                    }
                    else if ($_GET["error"] == "stmtfailed") {
                        echo "<p>Er is iets fout gegaan, probeer opnieuw!.";
                    }
                }
            ?>

        </body>
</html>