<link rel="stylesheet" href="css/regform.css">
<link rel="stylesheet" href="css/loginform.css">
<style>

#reg1, #reg2
{
  display:none;
}

#select_role
{
  text-align: center;
  width: 300px;
  font-family: 'Fauna One', serif;
  margin: 0 auto;
}
#select_role h2
{
  margin: 10px;
}
#select_role button
{
  background-color: green;
  font-family: 'Fauna One', serif;
  width: 100%;
  padding: 10px 12px;
  margin-bottom: 20px;
  font-size: 20px;
  cursor: pointer;
  color:white;
}
#select_role button:hover
{
  background-color: rgb(9, 85, 9);
}


/* The container */
.container1 {
  display: block;
  width: 100%;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 17px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.container1 label{
  width: 100%;
}

/* Hide the browser's default checkbox */
.container1 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark1 {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark1 {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container1 input:checked ~ .checkmark1 {
  background-color: green;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark1:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container1 input:checked ~ .checkmark1:after {
  display: block;
}

/* Style the checkmark/indicator */
.container1 .checkmark1:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

/* The container */
.container2 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 17px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container2 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark2 {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container2:hover input ~ .checkmark2 {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container2 input:checked ~ .checkmark2 {
  background-color: rgb(218,39,47);
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark2:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container2 input:checked ~ .checkmark2:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container2 .checkmark2:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
<div class="center">
    <img src="../media/logo.png">
    <h1>Project Document Management System</h1>
    <div id="select_role">
      <h2>SELECT YOUR ROLE:</h2>
      <button onclick="reg2click()" style="border:none; padding:5px; border-radius:2px;">CO-ORDINATOR</button>
      <button onclick="reg1click()" style="border:none; padding:5px; border-radius:2px;">SUPERVISOR</button>
      <button onclick="reg3click()" style="border:none; padding:5px; border-radius:2px;">STUDENT</button>
    </div>
  <div class="reg1_page" id="reg1">
    <center>
      <b>Register as <p id="role_head" style="display:inline-block"></p></b>
      <form method="POST">
        <input type="text" name="fname" placeholder="Full Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="pass" placeholder="Enter Password" required>
        <input type="password" name="rpass" placeholder="Confirm Password" required>
        <select name="college" required>
          <option disabled selected>Institute/College</option>
          <?php
            include '../database_conn.php';
            $get_college = "SELECT * FROM admin";
            $get_run = mysqli_query($conn,$get_college);
            while($row=mysqli_fetch_array($get_run))
            {
              $college_name = $row[4];
           ?>
          <option><?php echo $college_name ?></option>
          <?php } ?>
        </select>
        <input type="text" name="role" id="role" required readonly style="display:none;">
        <input type="submit" name="submit" value="Create Account">
      </form>
    </center>
  </div>
  <div class="reg2_page" id="reg2">
    <center>
      <b>Register as Co-ordinator</b>
      <form method="POST">
        <input type="text" name="fname" placeholder="Full Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="pass" placeholder="Enter Password" required>
        <input type="password" name="rpass" placeholder="Confirm Password" required>
        <input type="text" name="college" placeholder="Institute Name" required>
        <label class="container1">
          You represent this institute as a administrator.
          <input type="checkbox" required>
          <span class="checkmark1"></span>
        </label>
        <input class="register" type="submit" name="fsubmit" value="Register">
      </form>
    </center>
  </div>
  <div><a onclick="window.open('/','_self')" title="Back" style="cursor:pointer;"><i class="fa fa-chevron-circle-left"></i><span style="font-weight: bold;">&nbsp;BACK TO LOGIN</span></a></div>
</div>

    <?php include 'institute.php'; ?>
    <script>
      
      function reg1click()
      {
        document.getElementById('select_role').style.display='none';
        document.getElementById("reg2").style.display = "none";
        document.getElementById("role").value = "Supervisor";
        document.getElementById("role_head").innerHTML = "Supervisor";
        document.getElementById("reg1").style.display = "block";
      }
      function reg2click()
      {
        document.getElementById('select_role').style.display='none';
        document.getElementById("reg1").style.display = "none";
        document.getElementById("reg2").style.display = "block";
      }
      function reg3click()
      {
        document.getElementById('select_role').style.display='none';
        document.getElementById("role").value = "Student";
        document.getElementById("role_head").innerHTML = "Student";
        document.getElementById("reg1").style.display = "block";
        document.getElementById("reg2").style.display = "none";
      }
    </script>
<?php
    if(isset($_POST['submit']))
{
  $user_fname=$_POST['fname'];
  $user_email = $_POST['email'];
  $user_pass = base64_encode($_POST['pass']);
  $user_rpass = base64_encode($_POST['rpass']);
  $role=$_POST['role'];
  $college=$_POST['college'];

  if(strlen($user_pass) < 8)
  {
   echo"<script>alert('Password must be 8 characters')</script>";
  }

  if($user_pass!=$user_rpass)
  {
    echo"<script>alert('Password does not match')</script>";
  }

  if (filter_var($user_email, FILTER_VALIDATE_EMAIL))
  {
    $email_check = "SELECT * FROM users WHERE user_email='$user_email'";
    $run = mysqli_query($conn,$email_check);
    if(mysqli_num_rows($run)>0)
    {
      echo"<script>alert('Account from email:$user_email already in exist.Please try different email.')</script>";
    }
    else
    {
      $insert_query = "INSERT INTO users (user_fname,user_email,user_pass,role,college,verify) VALUES ('$user_fname','$user_email','$user_pass','$role','$college','No')";
      if(mysqli_query($conn,$insert_query))
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
if(isset($_POST['fsubmit']))
{
  $user_fname=$_POST['fname'];
  $user_email = $_POST['email'];
  $user_pass = base64_encode($_POST['pass']);
  $user_rpass = base64_encode($_POST['rpass']);
  $college = $_POST['college'];

  if(strlen($user_pass) < 8)
  {
   echo"<script>alert('Password must be 8 characters')</script>";
  }

  if($user_pass!=$user_rpass)
  {
    echo"<script>alert('Password does not match')</script>";
  }

  if (filter_var($user_email, FILTER_VALIDATE_EMAIL))
  {

  $email_check = "SELECT * FROM admin WHERE user_email='$user_email'";
  $run = mysqli_query($conn,$email_check);
  if(mysqli_num_rows($run)>0)
  {
    $email_check_nested = "SELECT * FROM users WHERE user_email='$user_email'";
    $run_nested = mysqli_query($conn,$email_check_nested);
    if(mysqli_num_rows($run_nested)>0)
    {
      echo"<script>alert('Account from email:$user_email already in exist.Please try different email.')</script>";
    }
    else
    {
      echo"<script>alert('Account from email:$user_email already in exist.Please try different email.')</script>";
    }
  }
  else
  {
    $institute_check = "SELECT * FROM admin WHERE college='$college'";
    $run_check = mysqli_query($conn,$institute_check);
    if(mysqli_num_rows($run_check)>0)
    {
      echo"<script>alert('This Institute is already in exist.')</script>";
    }
    else
    {
      $insert_query = "INSERT INTO admin (user_fname,user_email,user_pass,college) VALUES ('$user_fname','$user_email','$user_pass','$college')";
      if(mysqli_query($conn,$insert_query))
      {
        $_SESSION['email']=$user_email;
        echo"<script>window.open('/','_self')</script>";
      }
    }
  }
}
}

 ?>