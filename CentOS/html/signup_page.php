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
                                <input type="submit" name="submit" value="Sign Up">
                            </p>
                        </div>

                    </form>
                    
                        <?php
                            // when de URL contains an error, display text 
                            if (isset($_GET["error"])) { ?>
                            <div class="textbox-error">
                                <?php if ($_GET["error"] == "invalidusername") { 
                                echo "<p>Invalid username."; 
                                }
                                else if ($_GET["error"] == "usernametaken") {
                                    echo "<p>The username already exists.";
                                }
                                else if ($_GET["error"] == "passwordsdontmatch") {
                                    echo "<p>The passwords do no match.";
                                }
                                else if ($_GET["error"] == "stmtfailed") {
                                    echo "<p>Something went wrong, Try again!.";
                                }
                                else if ($_GET["error"] == "usernametooshort") {
                                    echo "<p>The username has to be greater than 4 characters long.";
                                }
                                else if ($_GET["error"] == "passwordtooshort") {
                                    echo "<p>The password has to be greater than 4 characters long.";
                                }
                                else if ($_GET["error"] == "toomanyusers") {
                                    echo "<p>Sorry, there is no room for any more user accounts.";
                                }
                            }
                        ?>
                            </div>
                    </div>

                </div>
            </div>

            

        </body>
</html>
