<!DOCTYPE html>
<html>
    <head>
        <title>Sign up</title>
        <h1>Sign up</h1>
    </head>
        <body>
            <form action="signup_code.php" method="POST">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="uname" required>

                <label for="pswd"><b>Password</b></label>
                <input type="Password" placeholder="Enter password" name="pswd" required>

                <label for="pswdRepeat"><b>Repeat password</b></label>
                <input type="Password" placeholder="Repeat password" name="pswdRepeat" required>

                <input type="submit" name="submit" value="Aanmelden">


            </form>

            <form>
                <input type="button" value="Go back" onclick="history.go(-1)">
            </form>
            
            
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