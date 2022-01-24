<link rel="stylesheet" href="static/css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="home-main">
    <div class="sidenav" id="sidenav">
        <div class="btn-side">
            <div class="btn-b">
                <button><img src="media/logo.png"></button>
            </div>
            <div class="btn-a">
                <div class="btn-name f-25" id="ba1">
                    <a href="">Pariyojana</a>
                </div>
            </div>
        </div>
        <div class="btn-side">
            <div class="btn-b">
                <button><img src="media/p1.png"></button>
            </div>
            <div class="btn-a">
                <div class="btn-name f-17" id="ba2">
                    <a href="">First Project</a>
                </div>
            </div>
        </div>
        <div class="btn-side">
            <div class="btn-b">
                <button><img src="media/p2.png"></button>
            </div>
            <div class="btn-a">
                <div class="btn-name f-17" id="ba3">
                    <a href="">Minor Project</a>
                </div>
            </div>
        </div>
        <div class="btn-side">
            <div class="btn-b">
                <button><img src="media/p3.png"></button>
            </div>
            <div class="btn-a">
                <div class="btn-name f-17" id="ba4">
                    <a href="">Major Project</a>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="btn-side">
                <div class="btn-b">
                    <button class="so-btn"><i class="fa fa-sign-out"></i></button>
                </div>
                <div class="btn-a">
                    <div class="btn-name f-17" id="ba5">
                        <a href="">Logout</a>
                    </div>
                </div>
            </div>
            <div class="mn">
                <div id="mname">
                    Powered By <a href="https://rusanvaidya.com.np">Rusan Vaidya</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-info">
        <div class="my-college">
            <div class="college-logo">
                <?php
                include 'db.php';
                $institute_check = "SELECT * FROM userc WHERE college='Snowdrop College'";
                $run_check = pg_query($dbcon, $institute_check);
                while($row=pg_fetch_array($get_run))
                {
                    $college_logo = $row[5];
                }
                ?>
                <img src="<?php echo"$college_logo" ?>">
            </div>
            <div class="college-name">
                &nbsp;Nepal College of Information Technology
            </div>
        </div>
        <div class="my-info">
            <div class="name">
                Rusan Vaidya
            </div>
            <div class="program">
                BE-IT
            </div>
            <div class="semester">
                8th semester
            </div>
        </div>
        <div class="notice">
            <fieldset>
                <legend>Notice</legend>
                <div class="mi-content">
                    <div class="no-nothing">No Notice Yet.</div>
                </div>
            </fieldset>
        </div>
        <div class="dashboard">
            <fieldset>
                <legend>Progression</legend>
                <div class="mi-content">
                    <div class="no-nothing">No Registration Yet.</div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script src="static/js/home.js"></script>