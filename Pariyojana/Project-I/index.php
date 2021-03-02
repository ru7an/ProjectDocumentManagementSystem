<html>
<link rel="icon" href="logo.png">
<link rel="stylesheet" href="../layout/css/topmenu.css">
<link rel="stylesheet" href="../layout/css/menu.css">
<link rel="stylesheet" href="../register/css/newproject.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Project-I</title>

<?php include 'topbar.php'; ?>
<?php include '../layout/logopresent.php'; ?>
<?php include 'menu.php';?>
<div class="center-b"><h2>Project-I</h2>
  <?php
  include('../database_conn.php');

  $email=$_SESSION['email'];
  $check_role="SELECT * FROM users WHERE user_email='$email'";
  $run_check = mysqli_query($conn,$check_role);
  if(mysqli_num_rows($run_check)>0)
  {
    while($row=mysqli_fetch_array($run_check))
    {
      $role=$row[4];
    }

    if($role=='student')
    {
      $check = "SELECT * FROM project1 WHERE email='$email' OR mem1_email='$email' OR mem2_email='$email'";
      $run = mysqli_query($conn,$check);

      if(mysqli_num_rows($run))
      {
        $check1=mysqli_query($conn,$check);

        while($row=mysqli_fetch_array($check1))
        {
          $id_no=$row[0];
          $lead=$row[1];
          $mem1=$row[3];
          $mem2=$row[5];
        }
        if($mem1!="" AND $mem2!="")
        {
          $check = "SELECT * FROM documents WHERE project_no='$id_no' AND project_type = 'Project-I'";
          $check_doc=mysqli_query($conn,$check);
          if(mysqli_num_rows($check_doc)>0)
          {
            include('student/post.php');
          }
          else
          {
            include('student/info.php');
          }
        }
        else
        {
          
          include('student/add.php');
        }
      }
      else
      {
        include('student/add.php');
      }
    }
    else
    {
      include('supervisor/view.php');
    }
  }
  else
  {
    include('coordinator/view.php');
  }
?>
</div>
</html>