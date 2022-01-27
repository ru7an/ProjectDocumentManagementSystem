
<title>
    Pariyojana
</title>
<link rel="icon" href="media/icon/logo.png">

<link rel="stylesheet" href="static/css/preloader.css">
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
    unset($_SESSION['email']);
    header('Refresh: 2; URL = /');
?>
<script src="static/js/preloader.js"></script>
      