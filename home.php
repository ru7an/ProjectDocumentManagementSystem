<link rel="stylesheet" href="static/css/home.css">
<link rel="stylesheet" href="static/css/window.css">
<link rel="stylesheet" href="static/css/taskbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preload" as="font" href="static/fonts/BebasNeue-Regular.ttf">

<style>
    @font-face {
        font-family: "Bebas Neue";
        src: url("static/fonts/BebasNeue-Regular.ttf") format("truetype");
    }
</style>

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
                while($row=pg_fetch_array($run_check))
                {                  
                    $ur_name = $row[1];
                    $ur_email = $row[2];
                    $college_name = $row[4];
                    $college_logo = $row[5];
                    $college_docx = $row[6];
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
                    <div class="greetings">&nbsp;Welcome&nbsp;</div>
                    <h1 class="ur_name"><?php echo $ur_name ?></h1>
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
                            <li><button onclick="open_profile()">&nbsp;Profile</button></li>
                            <li><button onclick="open_chat()">&nbsp;Discussion</button></li>
                            <li><button onclick="open_notice()">&nbsp;Notice</button></li>
                            <?php
                            $user_email = $_SESSION['email'];
                            $institute_check = "SELECT * FROM userc WHERE user_email = '$user_email'";
                            $run_check = pg_query($dbcon, $institute_check);
                            if(pg_num_rows($run_check)>0)
                            {
                            ?>
                            <li><button onclick="open_uctrl()">&nbsp;New User</button></li>
                            <?php
                            }
                            $institute_check_ss = "SELECT * FROM userss WHERE user_email = '$user_email'";
                            $run_check_ss = pg_query($dbcon, $institute_check_ss);
                            if(pg_num_rows($run_check_ss)>0)
                            {
                            ?>
                            <li><button onclick="open_notify()">&nbsp;Notification</button></li>
                            <?php
                            }?>
                            <li><button onclick="open_project(1)">&nbsp;First Project</button></li>
                            <li><button onclick="open_project(2)">&nbsp;Minor Project</button></li>
                            <li><button onclick="open_project(3)">&nbsp;Major Project</button></li>
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
                        <i class="fa fa-users" title="User Control" id="uctrl-active" onclick="open_uctrl()"></i>
                        <span></span>
                    </div>
                    <?php
                    }
                    $institute_check_ss = "SELECT * FROM userss WHERE user_email = '$user_email'";
                    $run_check_ss = pg_query($dbcon, $institute_check_ss);
                    if(pg_num_rows($run_check_ss)>0)
                    {
                    ?>
                    <div class="o1">
                        <i class="fa fa-globe" title="Notification" id="notify-active" onclick="open_notify()"></i>
                        <span></span>
                    </div>
                    <?php
                    }?>
                    <div class="o1">
                        <i class="fa fa-sticky-note" title="Notice" id="notice-active" onclick="open_notice()"></i>
                        <span></span>
                    </div>
                    <div class="o1">
                        <i class="fa fa-comment" title="Chat" id="chat-active" onclick="open_chat()"></i>
                        <span></span>
                    </div>
                    <div class="o1" id="project-window">
                        <i class="fa fa-sticky-note" title="" id="project-active" onclick="open_project()"></i>
                        <span></span>
                    </div>
                    <div class="o1" id="profile-window">
                        <i class="fa fa-user-o" title="Profile" id="profile-active" onclick="open_profile()"></i>
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

        <!-- profile -->
        <div id="profilediv">
            <div id="profiledivheader">
                Profile
                <span id="close-pd">&times;</span>
            </div>
            <div class="profile-information">
                <h1>Your Information</h1>
                <table>
                    <tr>
                        <td>NAME</td>
                        <td>: <?php echo $ur_name ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?php echo $ur_email ?></td>
                    </tr>
                    <tr>
                        <td>Instituition</td>
                        <td>: <?php echo $college_name ?></td>
                    </tr>
                    <tr>
                        <td>Document</td>
                        <td>: <a href="<?php echo $college_docx ?>">View</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Chat -->
        <div id="chatdiv">
            <div id="chatdivheader">
                Discussion
                <span id="close-cd">&times;</span>
            </div>
        </div>

        <!-- Notification -->
        <div id="notificationdiv">
        <div id="notificationdivheader">
                Notification
                <span id="close-nod">&times;</span>
            </div>
            <div class="notify-content">
                <h1>Your Notification</h1>
                <ul>
                    <li><button>Your project has been accepted</button></li>
                    <li><button>Your project has been accepted</button></li>
                    <li><button>Your project has been accepted</button></li>
                    <li><button>Your project has been accepted</button></li>
                    <li><button>Your project has been accepted</button></li>
                </ul>
            </div>
        </div>

        <!-- Notice -->
        <div id="noticediv">
        <div id="noticedivheader">
                Notice
                <span id="close-nd">&times;</span>
            </div>
        </div>

        <!-- User Control -->
        <div id="uctrldiv">
            <div id="uctrldivheader">
                User Control
                <span id="close-ud">&times;</span>
            </div>
            <div class="uctrl-content">
                <table>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th colspan="2">Access</th>
                    </tr>
                <?php
                  $email = $_SESSION['email'];
                  $sql_college = "SELECT * FROM userc WHERE user_email='$email'";
                  $run = pg_query($dbcon,$sql_college);
                  while($row=pg_fetch_array($run))
                  {
                    $college =$row[4];
                  }
                
                  $sql = "SELECT * FROM userss WHERE college = '$college' AND verify = 'No'";
                  $run = pg_query($dbcon,$sql);
                
                  if(pg_num_rows($run)>0)
                  {
                  while($row=pg_fetch_array($run))
                  {
                    $id_no=$row[0];
                    $f_name =$row[1];
                    $new_user_email = $row[2];
                    $role = $row[4];
                ?>
                    <tr>
                        <td><?php echo $f_name ?></td>
                        <td><?php echo $new_user_email ?></td>
                        <td><?php echo $role ?></td>
                        <td><button class="accept">Accept</button></td>
                        <td><button class="reject">Reject</button></td>
                    </tr>
                    <?php
                    }
                 } ?>
                </table>
            </div>
        </div>

        <!-- Project -->
        <div id="projectdiv">
            <div id="projectdivheader">
                Project
                <span id="close-prd">&times;</span>
            </div>
        </div>
    </div>
</body>
<script src="static/js/home.js"></script>
<script src="static/js/program.js"></script>
<script src="static/js/preloader.js"></script>