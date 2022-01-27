<!DOCTYPE html>
<html>
    <head>
        <title>
            Pariyojana
        </title>
        <link rel="icon" href="media/icon/logo.png">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <link rel="stylesheet" href="static/css/preloader.css">

        <link rel="preload" as="image" href="media/icon/logo.png">
        <link rel="preload" as="font" href="static/fonts/Oswald-VariableFont_wght.ttf">

        <style>
            @font-face {
                font-family: "Oswald";
                src: url("static/fonts/Oswald-VariableFont_wght.ttf") format("truetype");
            }
        </style>
    </head>

    <!-- preloader -->
    <div id="preloader">
        <div class="pl">
            <div class="ploader">
                <img src="media/icon/logo.png">
                <div class="shadow"></div>
            </div>
        </div>
    </div>
    <?php 
    session_start();
    if(!$_SESSION)
    {
        include 'login.php';
        ?>
        <script src="static/js/signup.js"></script>
        <?php
    }
    else
    {
        include 'db.php';
        $my_email = $_SESSION['email'];
        $get_my_info = "SELECT * FROM userc WHERE user_email='$my_email' AND verify = 'Yes';";
        $get_run = pg_query($dbcon, $get_my_info);
        if(pg_num_rows($get_run))
        {
            include 'home.php';
        }
        else
        {
            include 'waiting.php';
        }
    }
    ?>
    <script src="static/js/preloader.js"></script>
</html>
