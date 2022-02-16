
<title>
    Pariyojana
</title>
<link rel="icon" href="media/logo.png">

<link rel="stylesheet" href="layout/css/preloader.css">
<div id="preloader">
    <div class="pl">
        <div class="ploader">
            <img src="media/logo.png">
            <div class="shadow"></div>
        </div>
    </div>
</div>

<?php
    session_start();
    unset($_SESSION['email']);
    header('Refresh: 2; URL = /');
?>
<script src="layout/js/preloader.js"></script>
      