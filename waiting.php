<link rel="stylesheet" href="static/css/home.css">
<link rel="stylesheet" href="static/css/taskbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body onload="preloader_home()">
    <div class="home-main" id="main">        
            <!-- college -->
        <div class="my-college">
            <div class="college-logo">
                <?php
                include 'db.php';
                $user_email = $_SESSION['email'];
                $institute_check = "SELECT * FROM userc WHERE user_email = '$user_email'";
                $run_check = pg_query($dbcon, $institute_check);
                if(pg_num_rows($run_check)>0)
                {
                    while($row=pg_fetch_array($run_check))
                    {                    
                        $college_name = $row[4];
                        $college_logo = $row[5];
                    }
                }
                else
                {
                    $institute_check_ss = "SELECT * FROM userss WHERE user_email = '$user_email'";
                    $run_check_ss = pg_query($dbcon, $institute_check_ss);
                    while($row=pg_fetch_array($run_check_ss))
                    {                    
                        $college_name = $row[5];
                    }
                    $i_check = "SELECT * FROM userc WHERE college = '$college_name'";
                    $r_check = pg_query($dbcon, $i_check);
                    while($row=pg_fetch_array($r_check))
                    {                    
                        $college_logo = $row[5];
                    }
                }
                ?>
                <img src="<?php echo $college_logo ?>">
            </div>
            <div class="college-name">
                &nbsp;<?php echo $college_name ?>
            </div>
        </div>
        <div class="notice">
            <div class="mi-content">
                <div class="no-nothing" style="margin-bottom: 50px">
                    <div>&nbsp;Please Wait&nbsp;</div>
                    Your Account and Documents are under Review.
                </div>
                <div class="pl">
                    <div class="ploader" style="margin: 0 auto">
                        <img src="media/icon/logo.png">
                        <div class="shadow"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- taskbar -->
        <div class="taskbar">
            <div class="app-task">
                <div class="atask">
                    <img id="menu-icon" src="media/icon/logo.png">
                    <div id="my-program" class="myprogram">
                        <ul>
                            <li><button>&nbsp;Profile</button></li>
                            <li><button>&nbsp;Discussion</button></li>
                            <?php
                            $user_email = $_SESSION['email'];
                            $institute_check = "SELECT * FROM userc WHERE user_email = '$user_email'";
                            $run_check = pg_query($dbcon, $institute_check);
                            if(pg_num_rows($run_check)>0)
                            {
                            ?>
                            <li><button>&nbsp;New User</button></li>
                            <?php
                            }
                            $institute_check_ss = "SELECT * FROM userss WHERE user_email = '$user_email'";
                            $run_check_ss = pg_query($dbcon, $institute_check_ss);
                            if(pg_num_rows($run_check_ss)>0)
                            {
                            ?>
                            <li><button>&nbsp;Notification</button></li>
                            <?php
                            }?>
                            <li><button>&nbsp;Notice</button></li>
                            <li><button>&nbsp;First Project</button></li>
                            <li><button>&nbsp;Minor Project</button></li>
                            <li><button>&nbsp;Major Project</button></li>
                        </ul>
                    </div>
                </div>
                <div class="search-task">
                    <form>
                        <input type="search" placeholder="Search...">
                    </form>
                </div>
                <div class="others">
                    <?php
                    $user_email = $_SESSION['email'];
                    $institute_check = "SELECT * FROM userc WHERE user_email = '$user_email'";
                    $run_check = pg_query($dbcon, $institute_check);
                    if(pg_num_rows($run_check)>0)
                    {?>
                    <div class="o1">
                    <i class="fa fa-globe" title="Notification"></i>
                    </div>
                    <?php }
                    $institute_check_ss = "SELECT * FROM userss WHERE user_email = '$user_email'";
                    $run_check_ss = pg_query($dbcon, $institute_check_ss);
                    if(pg_num_rows($run_check_ss)>0)
                    { ?>
                    <div class="o1">
                        <i class="fa fa-users" title="User Control"></i>
                    </div>
                    <?php } ?>
                    <div class="o1">
                        <i class="fa fa-sticky-note" title="Notice"></i>
                    </div>
                </div>
                <div class="right-task">
                    <div class="date-task"><?php echo date("D d/m/y h:i A") ?></div>
                    <div class="logout-task"><i class="fa fa-power-off" onclick="logout()"></i></div>
                </div>
            </div>
            <script>
            function logout()
            {
                window.open('logout.php','_self');
            }
            </script>
        </div>
    </div>
</body>
<script src="static/js/home.js"></script>
<script src="static/js/program.js"></script>
<script src="static/js/preloader.js"></script>