<?php
    require 'header.php';
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="CSS/styling.css">
    </head>
        <body>
            <div class="bg-image"></div>
            <div class ="login-background">
                <div class="login-box">

                    <h1>Login</h1>
                    <form action="login_code.php" method="POST">

                        <div class="textbox">
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Enter username" name="uname" required>
                        </div>

                        <div class="textbox">
                            <i class="fa fa-lock"></i>
                            <input type="password" placeholder="Enter password" name="pswd" required>
                        </div>

                        <div style="padding-top: 10px">
                            <p class="alignleft">
                                <input type="submit" name="submit" value="Login"
                            </p>
                    
                            <p class="alignright">Don't have an account?
                                <a href="signup_page.php">
                                    Sign Up
                                </a>
                            </p>
                        </div>

                    </form>

                </div>
            </div>
            
            <?php
                // when de URL contains an error, display text
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "signedup") {
                        echo "<p>U heeft zich succesvol geregistreerd!";
                    }
                }
            ?>

        </body>
</html>