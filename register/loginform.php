<link rel="stylesheet" href="register/css/loginform.css">

<div class="center">
  <img src="../media/logo.png">
  <h1>Project Document Management System</h1>
  <p style="margin-top:10px; margin-bottom:10px; font-size:18px;">Now management of academic project document much easier.</p>
  <center>
    <form method="POST">
        <input type="text" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="pass">
        <input type="submit" value="LOGIN" name="login">
    <form>
    <div><a onclick="window.open('/register','_self')" style="font-weight:bold; font-size:17px; cursor:pointer;">Create an Account</a></div>
</center>
</div>
<?php
  include 'database_conn.php';
  if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $pass = base64_encode($_POST['pass']);

    $check = "SELECT * FROM users WHERE user_email='$email' AND user_pass='$pass'";
    $run = mysqli_query($conn,$check);

    if(mysqli_num_rows($run))
    {
      echo "<script>window.open('/','_self')</script>";
        $_SESSION['email']=$email;
    }
    else
    {
      $check = "SELECT * FROM admin WHERE user_email='$email' AND user_pass='$pass'";
      $run = mysqli_query($conn,$check);
      if(mysqli_num_rows($run))
      {
          echo "<script>window.open('/','_self')</script>";
          $_SESSION['email']=$email;
      }
      else
      {
        echo"<script>alert('Incorrect email or password')</script>";
      }
    }
  }
 ?>
