<html>
<link rel="stylesheet" href="../layout/css/topmenu.css">
<link rel="stylesheet" href="../layout/css/menu.css">
<link rel="stylesheet" href="../layout/css/logopresent.css">
<link rel="stylesheet" href="../register/css/newproject.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include '../layout/topbar.php'; ?>
<?php include '../layout/logopresent.php'; ?>
<?php include 'menu.php';?>
<?php

if(!$_SESSION['email'])
{
  header('Location: ../../Pariyojana');
}
 ?>
<html>
<head>
  <title>Pariyojana</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="center-b"><h2>Project-III</h2>
<a style="text-decoration:none; color:rgb(218,39,47); float: right;" href="../Project-III"><p class="fa fa-chevron-circle-left">BACK</p></a>
<center>
<table>
  <tr>
    <th style="text-align:left;">Team</th>
    <th style="text-align:left;">View</th>
  </tr>
<?php
  include('../database_conn.php');
  $email = $_SESSION['email'];
  $sql_college = "SELECT * FROM admin WHERE user_email='$email'";
  $run = mysqli_query($conn,$sql_college);
  while($row=mysqli_fetch_array($run))
  {
    $college =$row[4];
  }

  $sql = "SELECT * FROM project3 WHERE college = '$college' AND proposal = 'Accepted' ORDER BY id DESC";
  $run = mysqli_query($conn,$sql);

  if(mysqli_num_rows($run)>0)
  {
  while($row=mysqli_fetch_array($run))
  {
    $id_no=$row[0];
    $mem1_email =$row[1];
    $mem_name1 = $row[2];
    $mem_name2 = $row[4];
    $mem_name3 = $row[6];

    $team_inform = "SELECT * FROM documents WHERE project_no = '$id_no' AND project_type = 'Project-III'";
    $run_sql = mysqli_query($conn,$team_inform);
    if(mysqli_num_rows($run_sql)>0)
    {
?>
    <tr>
      <td><?php echo"$mem_name1"; if($mem_name2=='none'){}else{echo",$mem_name2";} if($mem_name3=='none'){}else{",$mem_name3";} ?></td>
      <td><a href="documentview.php?id=<?php echo $id_no?>" style="background:rgb(218,39,47); color:wheat; text-decoration:none; padding:5px;">SELECT</a></td>
    </tr>
  <?php
}
}
}
else {
   ?>
 <tr>
   <td><b style="color:grey;">NOT AVAILABLE</b>
   </td>
   <td>
   </td>
   <tr>
 <?php
}
?>
</table>
</center>
</div>
