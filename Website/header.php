<?php
    session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/png" href="afbeeldingen/favicon.png"> 
        <link rel="stylesheet" type="text/css" href="CSS/styling_header.css">
    </head>
    <body>
        <div class="header">
            <div class="inner_header">
                <a href="start.php">
                    <div class="logo_container">
                        <h1><span>University</span> of the Philippines</h1>
                    </div>
                </a>
                <ul class ="navigation">          
                    <!--When user is not logged in, show login in header-->
                    <?php if(empty($_SESSION['username'])){; ?>
                        <a href="login_page.php"><li>Login</li></a>
                    <!--else show name of user + logout button-->
                    <?php } else {?> 
                        <a><li>
                    <?php echo $_SESSION['username'];?>
                        </li></a>
                        <a href="logout.php"><li>Logout</li></a> 
                    <?php } ?>

                </ul>
            </div>
        </div>
    </body>
</html>
