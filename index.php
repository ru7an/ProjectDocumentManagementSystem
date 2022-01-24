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
    }
    else
    {
        include 'home.php';
    }
    ?>
    
    <script src="static/js/signup.js"></script>
    <script src="static/js/preloader.js"></script>
</html>
