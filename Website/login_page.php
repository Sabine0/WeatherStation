<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <h1>Login</h1>
    </head>
        <body>
            <form action="login_code.php" method="POST">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="uname" required>

                <label for="pswd"><b>Password</b></label>
                <input type="Password" placeholder="Enter password" name="pswd" required>

                <input type="submit" name="submit" value="Login">
            </form>

            <form>
                <input type="button" value="Go back" onclick="history.go(-1)">
            </form>

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