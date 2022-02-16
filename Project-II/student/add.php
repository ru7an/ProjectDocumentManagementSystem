<?php

$email = $_SESSION['email'];
$check_email="SELECT * FROM users WHERE user_email = '$email'";
$check=mysqli_query($conn,$check_email);
while($row=mysqli_fetch_array($check))
{
  $em_fname = $row[1];
  $college = $row[5];
}
?>
<i style="color:red; padding:10px; display:block;">*Add your teammates carefully. The following process is irreversable and the team cannot be collapsed.</i>
  
<div class="f-left">
  <b>Build Your Team</b>
</div>
<div class="f-right">
<form method="POST">
  <input type="text" name="emname" style="display:none;" value="<?php echo "$em_fname"; ?>" readonly>
  <input type="text" name="college" style="display:none;" value="<?php echo "$college";?>" readonly>          
  <button type="submit" name="sendnoneteam" style="padding:5px; width:80px; background:rgb(218, 39, 47); color:aliceblue; border:none;">Next <i class="fa fa-angle-double-right"></i></button>
</form>
</div>
</div>
        <?php

  $email=$_SESSION['email'];
  include('../database_conn.php');
    $get_college = "SELECT * FROM users WHERE user_email='$email'";
    $get_run = mysqli_query($conn,$get_college);
    while($row=mysqli_fetch_array($get_run))
    {
      $college_name = $row[5];
    }
  $user_email = $_SESSION['email'];
  $suggest = "SELECT * FROM users WHERE role='student' AND college='$college_name' AND user_email != '$user_email' AND verify='Yes'";
$run_suggest=mysqli_query($conn,$suggest);
while($row=mysqli_fetch_array($run_suggest))
{
  $fname=$row[1];
  $email_user1=$row[2];
?>
 <center>
  <table style="width: 60%">
    <?php
      $check_email="SELECT * FROM project2 WHERE email='$email_user1' OR mem1_email='$email_user1' OR mem2_email='$email_user1'";
      $check=mysqli_query($conn,$check_email);
      if(mysqli_num_rows($check)>0)
      {
        continue;
      }
      else
      {
    ?>
    
      <form method="POST">
          <tr>
            <td><div style="margin:auto"><i class="fa fa-user-circle-o" style="font-size:40px;"></i><br>
            student</div>
          </td>
            <td><input type="text" name="member_name" value="<?php echo "$fname"; ?>" readonly style=" padding:0px; border:none;">
          <input type="text" name="member_email" value="<?php echo "$email_user1"; ?>" readonly style="padding:0px; color:grey; border:none;">
            <?php

            $email = $_SESSION['email'];
            $check_email="SELECT * FROM users WHERE user_email = '$email'";
            $check=mysqli_query($conn,$check_email);
            while($row=mysqli_fetch_array($check))
            {
              $em_fname = $row[1];
              $college = $row[5];
            }
            ?>
            <input type="text" name="emname" style="display:none;" value="<?php echo "$em_fname"; ?>" readonly>
            <input type="text" name="college" style="display:none;" value="<?php echo "$college";?>" readonly>
            </td><td><button type="submit" id="add_user" name="p1_add" style="padding:5px; width:80px; background:rgb(218, 39, 47); color:aliceblue; border:none;">Add <i class="fa fa-users"></i>+</button></td>
          </tr>
    </form>
<?php
      }
}
?>
</table>
</center>
</div>

<?php
if(isset($_POST['p1_add']))
{
  $name_mem = $_POST['member_name'];
  $member =$_POST['member_email'];
  $email = $_SESSION['email'];
  $em_name = $_POST['emname'];
  $coll = $_POST['college'];

  $check_email="SELECT * FROM project2 WHERE email='$email'";
  $check=mysqli_query($conn,$check_email);

  while($row=mysqli_fetch_array($check))
  {
    $mem1=$row[3];
    $mem2=$row[5];
  }
  if(mysqli_num_rows($check)>0)
  {
    if ($mem1 == "")
    {
      $update_team="UPDATE project2 SET mem1_email = '$member', mem1_name = '$name_mem' WHERE email='$email'";
      if(mysqli_query($conn,$update_team))
      {
        $msg = "$em_name has added you to his team.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$member','$msg','Project-II','stall','$email')";
        if(mysqli_query($conn,$add_note))
        {}
        echo "<script>window.open('../Project-II','_self')</script>";
      }
    }
    elseif ($mem1!="" && $mem2=="")
    {
      $update_team="UPDATE project2 SET mem2_email = '$member', mem2_name = '$name_mem' WHERE email='$email'";
      if(mysqli_query($conn,$update_team))
      {
        $msg = "$em_name has added you to his team.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$member','$msg','Project-II','stall','$email')";
        if(mysqli_query($conn,$add_note))
        {}
        echo "<script>window.open('../Project-II','_self')</script>";
      }
    }
    else
    {
      echo"<script>alert('Your Team is full.')</script>";
    }
  }
  else
  {
    $create_team = "INSERT INTO project2 (email, email_name, mem1_email, mem1_name, mem2_email, mem2_name, proposal,mid , final,sup_email, sup_name,college) VALUES ('$email', '$em_name', '$member', '$name_mem', '', '','none', 'none', 'none', 'none', 'none','$college')";
    if(mysqli_query($conn,$create_team))
    {
      $msg = "$em_name has added you to his team.";
      $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$member','$msg','Project-II','stall','$email')";
      if(mysqli_query($conn,$add_note))
      {}
      echo "<script>window.open('../Project-II','_self')</script>";
    }
  }
}
?>

<?php
if(isset($_POST['sendnoneteam']))
{
  $name_mem = "none";
  $member ="none";
  $email = $_SESSION['email'];
  $em_name = $_POST['emname'];
  $coll = $_POST['college'];

  $check_email="SELECT * FROM project2 WHERE email='$email'";
  $check=mysqli_query($conn,$check_email);

  while($row=mysqli_fetch_array($check))
  {
    $mem1=$row[3];
    $mem2=$row[5];
  }
  if(mysqli_num_rows($check)>0)
  {
    if ($mem1 == "")
    {
      $update_team="UPDATE project2 SET mem1_email = 'none', mem1_name = 'none' WHERE email='$email'";
      if(mysqli_query($conn,$update_team))
      {
        echo "<script>window.open('../Project-II','_self')</script>";
      }
    }
    elseif ($mem1!="" && $mem2=="")
    {
      $update_team="UPDATE project2 SET mem2_email = 'none', mem2_name = 'none' WHERE email='$email'";
      if(mysqli_query($conn,$update_team))
      {
        echo "<script>window.open('../Project-II','_self')</script>";
      }
    }
    else
    {
      echo"<script>alert('Your Team is full.')</script>";
    }
  }
  else
  {
    $create_team = "INSERT INTO project2 (email, email_name, mem1_email, mem1_name, mem2_email, mem2_name, proposal,mid , final,sup_email, sup_name,college) VALUES ('$email', '$em_name', '$member', '$name_mem', 'none', 'none','none', 'none', 'none', 'none', 'none','$college')";
    if(mysqli_query($conn,$create_team))
    {
      echo "<script>window.open('../Project-II','_self')</script>";
    }
  }
}
?>