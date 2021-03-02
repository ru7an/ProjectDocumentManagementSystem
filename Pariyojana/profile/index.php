<html>
<head>
  <title>Pariyojana</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="logo.png">

<link rel="stylesheet" href="../layout/css/topmenu.css">
<link rel="stylesheet" href="../layout/css/menu.css">
<link rel="stylesheet" href="../layout/css/logopresent.css">
<link rel="stylesheet" href="../register/css/newproject.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include '../layout/topbar.php'; ?>
<?php include '../layout/logopresent.php'; ?>
<?php include 'menu.php';?>
<div class="center-b">
  <h1>Profile</h1>
<?php
  include('../database_conn.php');
  $admin_now = $_SESSION['email'];
  $get_admin = "SELECT * FROM admin WHERE user_email='$admin_now'";
  $run_ga = mysqli_query($conn,$get_admin);
  while($row=mysqli_fetch_array($run_ga))
  {
    $name = $row[1];
    $email = $row[2];
    $college = $row[4];
  }
  if(mysqli_num_rows($run_ga))
  {
    ?>
    <table>
      <tr>
        <td>Name:</td>
        <td><?php echo"$name" ?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?php echo"$email" ?></td>
      </tr>
      <tr>
        <td>College:</td>
        <td><?php echo"$college" ?></td>
      </tr>
    </table>
    <?php
 
}
else
 {
  $user_now = $_SESSION['email'];
   $get_admin = "SELECT * FROM users WHERE user_email='$user_now'";
   $run_ga = mysqli_query($conn,$get_admin);
   if(mysqli_num_rows($run_ga))
   {
     while($row=mysqli_fetch_array($run_ga))
     {
       $name = $row[1];
       $email = $row[2];
       $password = $row[3];
       $college = $row[5];
     }
     ?>
     <table>      
     <tr>
        <td>Name:</td>
        <td><?php echo"$name" ?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?php echo"$email" ?></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><?php 
        $n = strlen(base64_decode($password));
        for($i=0;$i<$n;$i++)
        {
          echo"*";
        } ?></td>
      </tr>
      <tr>
        <td>College:</td>
        <td><?php echo"$college" ?></td>
      </tr>
    </table>
<?php    }
   }
 ?>
 </div>