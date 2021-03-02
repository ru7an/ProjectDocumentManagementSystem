<html>
<link rel="icon" href="logo.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php 
    include 'layout/topbar.php';
    include 'database_conn.php';
    include 'layout/logopresent.php';
  ?>
  <?php
    if(!$_SESSION)
    {
  ?>
      <head>
      <title>Pariyojana - Login</title>
      </head>
      <?php

      include 'register/loginform.php';
    }
    else
    {
      ?>
      <head>
      <?php
        include 'database_conn.php';
        $email = $_SESSION['email'];
        $sql="SELECT * FROM users WHERE user_email='$email'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0)
        {
          while($row=mysqli_fetch_array($run))
          {
            $user_fname=$row[1];
            $user_lname=$row[2];
          }
        }
        else
        {
          $sql="SELECT * FROM admin WHERE user_email='$email'";
          $run=mysqli_query($conn,$sql);
          if(mysqli_num_rows($run)>0)
          {
            while($row=mysqli_fetch_array($run))
            {
              $user_fname=$row[1];
            }
          }
        }
        ?>
        <title>Pariyojana : <?php echo"$user_fname"?></title>
      </head>
      <?php
      include 'home/home.php';
    }
  ?>
      </div>
  </body>
</html>