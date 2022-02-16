</div>
</div>
</div>
<div style="background:rgb(218,39,47); margin:auto; width:30%; border-radius: 5px; padding:10px; text-align:left">
<h4 style="color:white;">Comment Section:</h4>
<?php
$user_now = $_SESSION['email'];
$get_name = "SELECT * FROM users WHERE user_email = '$user_now'";
$run_gn = mysqli_query($conn,$get_name);
while($row=mysqli_fetch_array($run_gn))
{
  $fname_user=$row[1];
}
?>
<?php
$disp_cmt="SELECT * FROM comment WHERE project_no = '$id_no' AND project_type = 'Project-III'";
$disp=mysqli_query($conn,$disp_cmt);
while($row=mysqli_fetch_array($disp))
{
  $commentor=$row[2];
  $comment=$row[5];
  $role = $row[6];
?>
  <table style="text-align: center; color: white; margin: 10px; padding: 10px; border:1px solid black; border-radius:5px;">
  <tr><td><i class="fa fa-user-circle-o"></i><br><b><?php echo"$commentor";?> </b><br><?php echo"$role"; ?></td>
  <td><?php echo ": $comment";?></td>
  </tr>
</table>
<?php
}
if($final=='Accepted')
{}
  else {

?>
<center>
<form method="POST" class="comment-content">
<input type="text" name="c_user" value="<?php echo "$fname_user"; ?>" readonly style="display:none"/>
<input type="text" placeholder="Comment..." name="comment" style="width:400px; display:block;">
<button type="submit" name="com_post" style="color:rgb(218, 39, 47); background: white; padding:5px; border:none; margin: 5px;">COMMENT</button>
</form>
</div>
  </center>
<?php
if(isset($_POST['com_post']))
{
  $email = $_SESSION['email'];
$user=$_POST['c_user'];
$comment = $_POST['comment'];

$sql="INSERT INTO comment(email,user_name,project_no,project_type,comment,role)VALUES('$user_now', '$user','$id_no', 'Project-III', '$comment','Student')";
if(mysqli_query($conn,$sql))
{
  $find_project = "SELECT * FROM project3 WHERE id='$id_no'";
  $run_find = mysqli_query($conn,$find_project);
  while($row = mysqli_fetch_array($run_find))
  {
    $email1 = $row[1];
    $name1 = $row[2];
    $email2 = $row[3];
    $name2 = $row[4];
    $email3 = $row[5];
    $name3 = $row[6];
    $superv = $row[11]; 
  }
  
  $msg = "$user has commented on his Project-III.";
  $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$superv','$msg','Project-III','stall','$email')";
  if(mysqli_query($conn,$add_note))
  {}

  if($name1!=$user)
      {
        $msg = "$user has commented on your Project-III.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email1','$msg','Project-III','stall','$email')";
        if(mysqli_query($conn,$add_note))
        {}
      }

  if($email2!='none')
      {
        if($name2!=$user)
        {
          $msg = "$user has commented on your Project-III.";
          $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email2','$msg','Project-III','stall','$email')";
          if(mysqli_query($conn,$add_note))
          {}
        }
      }

      if($email3!='none')
      {
        if($name3!=$user)
        {
          $msg = "$user has commented on your Project-III.";
          $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email3','$msg','Project-III','stall','$email')";
          if(mysqli_query($conn,$add_note))
          {}
        }
      }
  echo "<meta http-equiv='refresh' content='0'>";;
}
}
}
?>
