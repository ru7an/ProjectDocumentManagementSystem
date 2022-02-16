<html>
<link rel="stylesheet" href="../layout/css/topmenu.css">
<link rel="stylesheet" href="../layout/css/menu.css">
<link rel="stylesheet" href="../layout/css/logopresent.css">
<link rel="stylesheet" href="../register/css/newproject.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include '../layout/topbar.php'; ?>
<?php include '../layout/logopresent.php'; ?>
<?php include 'menu.php';?>
<div class="center-b">
  <h1>Notice</h1>
  <?php
include('../database_conn.php');

$user_now = $_SESSION['email'];

$get_admin = "SELECT * FROM admin WHERE user_email='$user_now'";
$run_ga = mysqli_query($conn,$get_admin);
if(mysqli_num_rows($run_ga))
{
  while($row=mysqli_fetch_array($run_ga))
  {
    $ad_id=$row[0];
    $college=$row[4];
  }
}
else
{
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
$id_get = $_GET['id'];

$get_head = "SELECT * FROM notice WHERE college='$college' AND id = '$id_get'";
$run_gh = mysqli_query($conn,$get_head);
while($row=mysqli_fetch_array($run_gh))
{
  $id = $row[0];
  $heading=$row[3];
  $message = $row[4];
}
?>
<h3><?php echo"$heading";?></h3>
<p><?php echo"$message"; ?></p>
