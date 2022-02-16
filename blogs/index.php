<?php 

include 'database_conn.php';
session_start();
if(!$_SESSION)
{
  header('Location: /');
}
?>
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
<style>
      .center, .center-content {
        width: 800px;
        margin: 0 auto;
        text-align: center;
        font-family: Cinzel, serif;
}

.center img {
    width: 100px;
    height: 100px;
    padding: 20px;
}
</style>
<?php include '../layout/topbar.php'; ?>
<div class="center">
  <img src="../media/logo.png">
  <h1>Project Document Management System</h1>
</div>
<?php include 'menu.php';?>
<div class="center-b">
  <h1>Blogs</h1>
<?php
  include('../database_conn.php');
  $admin_now = $_SESSION['email'];
  $get_admin = "SELECT * FROM admin WHERE user_email='$admin_now'";
  $run_ga = mysqli_query($conn,$get_admin);
  while($row=mysqli_fetch_array($run_ga))
  {
    $ad_id=$row[0];
    $role = 'Co-ordinator';
    $college=$row[4];
    $ad_name = $row[1];
  }
  if(mysqli_num_rows($run_ga))
  {
 ?>
 <form method="POST">
  <table class="note_this_css">
    <input type="number" readonly style="display:none;" value="<?php echo"$ad_id"?>" name="id_admin"/>
    <input type="text" readonly style="display:none;" value="<?php echo"$college"?>" name="college"/>
    <tr><td>Blog : </td><td><textarea placeholder="Write here!" style="width:500px; height:150px; resize:none;" name="message"></textarea></td></tr>
    <tr><td><input type="submit" name="note_this" value="Publish" style="padding:5px; width:100px;"></td></tr>
  </table>
</form>
<?php
if(isset($_POST['note_this']))
{
  $ad_id = $_POST['id_admin'];
  $college = $_POST['college'];
  $message = $_POST['message'];
  $sql_publish="INSERT INTO blogs(admin_no,college,blog,role,user_name)VALUES('$ad_id', '$college', '$message', '$role', '$ad_name')";
  if(mysqli_query($conn,$sql_publish))
  {
    header("Refresh:0");
  }
}
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
       $college = $row[5];
     }
   }
 }
 $get_head = "SELECT * FROM blogs WHERE college='$college' ORDER BY id DESC";
 $run_gh = mysqli_query($conn,$get_head);
 while($row=mysqli_fetch_array($run_gh))
 {
   $id = $row[0];
   $blog=$row[3];
 ?>
 <ul>
   <li><a style="text-decoration:none;" class="headline" href="blog_no.php?id=<?php echo"$id" ?>"><?php echo"$blog"; ?></a></li>
   </ul>
 <?php }?>
 </div>