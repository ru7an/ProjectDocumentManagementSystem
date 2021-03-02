<div class="reg2_page" id="reg2">
<center>
    <button onclick="reg1click()" style="border:none; background:rgb(218, 39, 47); color:aliceblue; padding:5px; border-radius:2px;">Register Student/Supervisor?</button>
    <form method="POST">
        <input type="text" name="fname" placeholder="Full Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="pass" placeholder="Enter Password" required>
        <input type="password" name="rpass" placeholder="Confirm Password" required>
        <input type="text" name="college" placeholder="Institute Name" required>
        <table style="width: 30%">
        <tr><td>
        <label class="container1">
          You represent this institute as a administrator.
          <input type="checkbox" required>
          <span class="checkmark1"></span>
        </label>
        </td></tr>
        </table>
        <input class="register" type="submit" name="fsubmit" value="Register">
    </form>
</center>
</div>
<script>
      function reg1click()
      {
        document.getElementById("reg2").style.display = "none";
        document.getElementById("reg1").style.display = "block";
      }
    </script>
<?php
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
        echo"<script>window.open('../','_self')</script>";
      }
    }
  }
}
}
 ?>