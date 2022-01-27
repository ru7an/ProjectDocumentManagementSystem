<link rel="stylesheet" href="static/css/login.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<body onload="preloader()">
    <div id="main">
        <div class="login-main">
            <div class="login-container">
                <div class="login-element">
                    <div class="logo">
                        <img src="media/icon/logo.png">
                        <p>Now management of academic project document much easier.</p>
                    </div>
                    <div class="login-f">
                        <form method="POST">
                            <input type="email" placeholder="Email" name="login_email">
                            <input type="password" placeholder="Password" name="login_pass">
                            <button type="submit" name="login">Login</button>
                        </form>
                        <div id="login-failed">Incorrect email or password</div>                        
                    </div>
                    <div class="sign-up">
                        No registered Yet? <button id="signup">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="animated-img">
                    <img src="media/design/Laptop Animated.gif">
                </div>
            </div>
            <div id="role-bg">
                <div class="signup-container">
                    <div class="head">
                        <p>Select Your Role</p>
                        <span id="close_role">&times;</span>
                    </div>
                    <div class="roles">
                        <button id="coordinator">Co-ordinator</button>
                        <button id="supervisor">Supervisor</button>
                        <button id="student">Student</button>
                    </div>
                </div>
            </div>

            <div id="signup-co-bg">
                <div class="signup-container">
                    <div class="head">
                        <p>Register Your Institution</p>
                        <span id="close_co">&times;</span>
                    </div>
                    <div class="roles">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="text" name="fname" placeholder="Full Name" required>
                            <input type="text" name="email" placeholder="Email" required>
                            <input type="password" name="pass" placeholder="Enter Password" required>
                            <input type="password" name="rpass" placeholder="Confirm Password" required>
                            <input type="text" name="college" placeholder="Institute Name" required>
                            <label>Institute Document : <input type="file" name="filedocx" id="filedocx" required></label>
                            <label>Institute Trademark : <input type="file" name="filelogo" id="filelogo" required></label>
                            <label class="container1">
                            You represent this institute as a administrator.
                            <input type="checkbox" required>
                            <span class="checkmark1" required></span>
                            </label>
                            <input type="submit" name="register" value="Register">
                        </form>
                    </div>
                </div>
            </div>
            <div id="signup-bg">
                <div class="signup-container">
                    <div class="head">
                        <p>Register as&nbsp;<p id="registeras"></p></p>
                        <span id="close_sign">&times;</span>
                    </div>
                    <div class="roles">
                        <form method="POST">
                            <input type="text" name="fname" placeholder="Full Name" required>
                            <input type="text" name="email" placeholder="Email" required>
                            <input type="password" name="pass" placeholder="Enter Password" required>
                            <input type="password" name="rpass" placeholder="Confirm Password" required>
                            <select name="college" required>
                            <option disabled selected>Institute/College</option>
                            <?php    
                                include 'db.php';
                                $get_college = "SELECT * FROM userc WHERE verify = 'Yes';";
                                $get_run = pg_query($dbcon,$get_college);
                                while($row=pg_fetch_array($get_run))
                                {
                                    $college_name = $row[4];
                            ?>
                            <option><?php echo $college_name ?></option>
                            <?php } ?>
                            </select>
                                <input type="text" name="role" id="role-s-s" placeholder="Role" required>
                            <input type="submit" name="submit" value="Create Account">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-a">
                <a href="">Terms</a>
                <a href="">Policy</a>
                <a href="">FAQs</a>
                <a href="">Help</a>
            </div>
            <div class="developer">
                Powered By <a href="https://rusanvaidya.com.np">Rusan Vaidya</a>
            </div>
        </div>
        <div id="register-error">
        <div class="error-modal">
            <div class="error-header">
                <p>Error Occured !</p>
                <span onclick="document.getElementById('register-error').style.display='none'">&times;</span>
            </div>
            <div class="error-msg">
                <div id="e-m">This institute is already registered.</div>
                <button onclick="document.getElementById('register-error').style.display='none'">Close</button>
            </div>
        </div>
    </div>
</body>

<!-- login -->
<?php
  if(isset($_POST['login']))
  {
    $email = $_POST['login_email'];
    $pass = base64_encode($_POST['login_pass']);

    $check = "SELECT * FROM userss WHERE user_email='$email' AND user_pass='$pass';";
    $run = pg_query($dbcon, $check);
    if(pg_num_rows($run))
    {
        echo "<script>window.open('/','_self')</script>";
        $_SESSION['email']=$email;
    }
    else
    {
      $check = "SELECT * FROM userc WHERE user_email='$email' AND user_pass='$pass';";
      $run = pg_query($dbcon,$check);
      if(pg_num_rows($run))
      {
        echo "<script>window.open('/','_self');</script>";
        $_SESSION['email']=$email;
      }
      else
      {
        echo"<script>document.getElementById('login-failed').style.display = 'block';</script>";
      }
    }
  }
 ?>

<!-- signup -->
<?php
    if(isset($_POST['register']))
    {
        $user_fname=$_POST['fname'];
        $user_email = $_POST['email'];
        $user_pass = base64_encode($_POST['pass']);
        $user_rpass = base64_encode($_POST['rpass']);
        $college = $_POST['college'];
        $dir = "college/$college/";
        $logo = $_FILES['filelogo']['tmp_name'];
        $location_logo = $dir.basename($_FILES['filelogo']['name']);
        
        $document = $_FILES['filedocx']['tmp_name'];
        $location_document = $dir.basename($_FILES['filedocx']['name']);
            
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL))
        {
            $email_check = `SELECT * FROM "public"."userc" WHERE user_email='$user_email'`;
            $run = pg_query($dbcon, $email_check);
            if(pg_num_rows($run)>0)
            {
                $email_check_nested = `SELECT * FROM "public"."userss" WHERE user_email='$user_email'`;
                $run_nested = pg_query($dbcon, $email_check_nested);
                if(pg_num_rows($run_nested)>0)
                {
                    echo"<script>
                    document.getElementById('e-m').innerHTML='Account from email:$user_email already in exist.Please try different email.';
                    document.getElementById('register-error').style.display='block';</script>";
                }
            }
            else
            {
                $institute_check = "SELECT * FROM userc WHERE college='$college'";
                $run_check = pg_query($dbcon, $institute_check);
                if(pg_num_rows($run_check)>0)
                {
                    echo"<script>console.log('This Institute is already in exist.')</script>";
                }
                else
                {
                    if(mkdir($dir))
                    {            
                        $insert_query = "INSERT INTO userc (username, user_email, user_pass, college, logo, docx, verify) VALUES ('$user_fname','$user_email','$user_pass','$college', '$location_logo', '$location_document', 'No')";
                        if(pg_query($dbcon,$insert_query))
                        {
                            if(copy($_FILES['filelogo']['tmp_name'], $dir.basename($_FILES['filelogo']['name'])))
                            {
                                echo"<script>console.log('Uploaded logo')</script>";
                            }
                            else
                            {
                                echo"<script>console.log('Logo Upload Failed')</script>";
                            }
                            if(copy($_FILES['filedocx']['tmp_name'], $dir.basename($_FILES['filedocx']['name'])))
                            {
                                echo"<script>console.log('Uploaded logo')</script>";
                            }
                            else
                            {
                                echo"<script>console.log('Logo Upload Failed')</script>";
                            }
                            $_SESSION['email'] = $user_email;
                            echo"<script>window.open('/','_self')</script>";
                        }
                    }
                    elseif(file_exists($dir))
                    {
                        echo"<script>
                        document.getElementById('register-error').style.display='block';
                        </script>";
                    }
                }
            }
        }
    }

    if(isset($_POST['submit']))
    {
      $user_fname=$_POST['fname'];
      $user_email = $_POST['email'];
      $user_pass = base64_encode($_POST['pass']);
      $user_rpass = base64_encode($_POST['rpass']);
      $role=$_POST['role'];
      $college=$_POST['college'];
    
      if($user_pass!=$user_rpass)
      {
        echo"<script>alert('Password does not match')</script>";
      }
      else
      {
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL))
        {
            $email_check = "SELECT * FROM userss WHERE user_email='$user_email'";
            $run = pg_query($dbcon,$email_check);
            if(pg_num_rows($run)>0)
            {
            echo"<script>alert('Account from email:$user_email already in exist.Please try different email.')</script>";
            }
            else
            {
            $insert_query = "INSERT INTO userss (username, user_email, user_pass, role, college, verify) VALUES ('$user_fname','$user_email','$user_pass','$role','$college','No')";
            if(pg_query($dbcon,$insert_query))
            {
                $_SESSION['email']=$user_email;
                echo "<script>window.open('/','_self')</script>";
            }
            }
        }
        else {
            echo "<script>alert('Invalid email')</script>";
        }
      }
    }
 ?>
