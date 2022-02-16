<?php 

include 'database_conn.php';
session_start();
if(!$_SESSION)
{
  header('Location: /');
}
?>
<html>
<link rel="icon" href="logo.png">
<link rel="stylesheet" href="../layout/css/topmenu.css">
<link rel="stylesheet" href="../layout/css/menu.css">
<link rel="stylesheet" href="../layout/css/logopresent.css">
<link rel="stylesheet" href="../register/css/newproject.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    table tr td
    {
        padding: 10px;
    }
    table tr td input
    {
        text-align: center;
        height:25px;
    }

    button
    {
        background-color: rgb(218, 39, 47);
        color: white;
    }
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
<table>
  <tr>
    <th></th>
    <th>Users</th>
    <th>Email</th>
    <th>Add?</th>
  </tr>
<?php
  $email = $_SESSION['email'];
  $sql_college = "SELECT * FROM admin WHERE user_email='$email'";
  $run = mysqli_query($conn,$sql_college);
  while($row=mysqli_fetch_array($run))
  {
    $college =$row[4];
  }

  $sql = "SELECT * FROM users WHERE college = '$college' AND verify = 'No'";
  $run = mysqli_query($conn,$sql);

  if(mysqli_num_rows($run)>0)
  {
  while($row=mysqli_fetch_array($run))
  {
    $id_no=$row[0];
    $f_name =$row[1];
    $new_user_email = $row[2];
    $role = $row[4];
?>
    <tr>
      <td style="text-align:center;"><i class="fa fa-user-circle-o" style="font-size:25px"></i><br><?php echo $role ?></td>
      <td><input type="text" value="<?php echo"$f_name"?>" name="fname" style="border:none; width:80%;" readonly></td>
      <form method="post">
      <td>  <input type="text" value="<?php echo $new_user_email ?>" name="user_new" style="border:none; width:80%;" readonly></td>
      <td><button type="submit" name="add">Add+<i class="fa fa-user"></i></button></td>
    </form>
    </tr>
  <?php
}
}
else {
   ?>
 <tr>
   <td>LIST IS EMPTY
   </td>
   <td>-
   </td>
   <td>-
   </td>
   <td>-
   </td>
   <tr>
 <?php
}
?>
</table>
</div>
</div>
<?php
if(isset($_POST['add']))
{
  $new_user = $_POST['user_new'];
  $verify = "UPDATE users SET verify = 'Yes' WHERE user_email = '$new_user'";
  if(mysqli_query($conn,$verify))
  {
    echo "<meta http-equiv='refresh' content='0'>";
  }
}
?>