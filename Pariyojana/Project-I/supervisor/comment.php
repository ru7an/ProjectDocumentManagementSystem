<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
  .marksheetcss
{
    background-color: rgb(218, 39, 47);
    color: white;
    border: none;
    padding: 6px;
}

.createaccountcss:hover
{
  opacity: 0.8;
  cursor: pointer;
}

.cancelbtn
{
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.container
{
  padding: 16px;
}

.markbox
{
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}

.marks input[type="number"]
{
    width:100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    display: block;
}

.marks textarea
{
  width:50%;
  height: 30%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  display: block;
  resize: none;
}

.marks i
{
  display: block;
  color: red;
}

.markbox-content
{
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 30%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

.check
{
  width:100%;
  display: inline-block;
}
@-webkit-keyframes animatezoom
{
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom
{
  from {transform: scale(0)}
  to {transform: scale(1)}
}

.close
{
  float:right;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover, .close:focus
{
  color: red;
  cursor: pointer;
}

.container input[type="submit"]
{
    background-color: rgb(218, 39, 47);
    color: white;
    border: none;
    padding: 6px;
    margin-bottom: 10px;
}

.container input[type='submit']:hover
{
  opacity:0.7;
  cursor: pointer;
}

.radio_b
{
  padding: 10px;
  margin: 10px;
}

/* The container */
.container1 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container1 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark1 {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark1 {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container1 input:checked ~ .checkmark1 {
  background-color: rgb(218,39,47);
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark1:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container1 input:checked ~ .checkmark1:after {
  display: block;
}

/* Style the checkmark/indicator */
.container1 .checkmark1:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

</style>
<?php
if($mid=='pending...' || $mid=='Rejected')
{
  ?>
  <button class="marksheetcss" onclick="document.getElementById('marksheet').style.display='block';">Marksheet</button>
  <div id="marksheet" class="markbox">
    <div class="markbox-content">
      <div class="container">
        <div>
          <span onclick="document.getElementById('marksheet').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <h1>Marksheet</h1>
    <form method="POST" class="marks">
    <?php echo"$lead"?><input type="number" name="mem1_marks_mid" placeholder="Marks for <?php echo"$lead" ?>">
    <?php if($mem1!='none'){echo"$mem1"?><input type="number" placeholder="Marks for <?php echo"$mem1" ?>" name="mem2_marks_mid" required><?php } else { ?><input type="number" name="mem2_marks_mid" style="display:none;" value="0" required><?php } ?>
      <?php if($mem2!='none'){echo"$mem2"?><input type="number" placeholder="Marks for <?php echo"$mem2" ?>" name="mem3_marks_mid" required><?php } else { ?><input type="number" name="mem3_marks_mid" style="display:none;" value="0" required><?php } ?>
        <table style="width:80%">
          <tr>
            <td>
            <label class="container1">
              <i>These students can now appear in final defense*</i>
              <input type="checkbox" value="Accepted" name="mid" required>
              <span class="checkmark1"></span>
            </label>
            </td>
          </tr>
        </table>
    <textarea placeholder="Supervisor Statement" name="state"></textarea>
  <input type="submit" name="m_accept" value="Submit">
  </form>
  <?php
}
  if(isset($_POST['m_accept']))
  {
    $m1_marks = $_POST['mem1_marks_mid'];
    $m2_marks = $_POST['mem2_marks_mid'];
    $m3_marks = $_POST['mem3_marks_mid'];
    $p_type = 'Project-I';
    $status=$_POST['mid'];
    $statement_c = $_POST['state'];

    $sql= "UPDATE project1 SET mid='$status' WHERE id='$id'";
    if(mysqli_query($conn,$sql))
    {
      echo "<meta http-equiv='refresh' content='0'>";;
    }

    $sql2 = "UPDATE statement SET mid_statement='$statement_c' WHERE project_no='$id' AND project_type = 'Project-I'";
    if(mysqli_query($conn,$sql2))
    {
      echo "<meta http-equiv='refresh' content='0'>";;
    }

    $sql= "INSERT INTO marksheet(mem1_marks, mem2_marks, mem3_marks, project_no, project_type, def_type) VALUES ('$m1_marks', '$m2_marks', '$m3_marks', '$id', '$p_type', 'mid')";
    if(mysqli_query($conn,$sql))
    {
      //notification
      $find_project = "SELECT * FROM project1 WHERE id='$id'";
      $run_find = mysqli_query($conn,$find_project);
      while($row = mysqli_fetch_array($run_find))
      {
        $email1 = $row[1];
        $email2 = $row[3];
        $email3 = $row[5]; 
      }
      $user_here = $_SESSION['email'];
      $msg = "Your mid for Project-I has been $status.";
      $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email1','$msg','Project-I','stall','$user_here')";
      if(mysqli_query($conn,$add_note))
      {}

      if($email2!='none')
      {
        $msg = "Your mid for Project-I has been $status.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email2','$msg','Project-I','stall','$user_here')";
        if(mysqli_query($conn,$add_note))
        {}
      }

      if($email3!='none')
      {
        $msg = "Your mid for Project-I has been $status.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email3','$msg','Project-I','stall',$user_here)";
        if(mysqli_query($conn,$add_note))
        {}
      }
      echo "<meta http-equiv='refresh' content='0'>";;
    }

  }
  ?>
</div>
</div>
</div>
</div><div style="background:rgb(218,39,47); margin:auto; margin-top:10px; width:30%; border-radius: 5px; padding:10px; text-align:left">
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
$disp_cmt="SELECT * FROM comment WHERE project_no = '$id' AND project_type = 'Project-I'";
$disp=mysqli_query($conn,$disp_cmt);
while($row=mysqli_fetch_array($disp))
{
  $commentor=$row[2];
  $comment=$row[5];
  $role = $row[6];
?>
<link rel="stylesheet" href="supervisor/css/comment.css">
  <table style="text-align: center; color: white; padding: 10px; border:1px solid black; border-radius:5px;">
  <tr><td><i class="fa fa-user-circle-o"></i><br><b><?php echo"$commentor";?> </b><br><?php echo"$role"; ?></td>
  <td><?php echo ": $comment";?></td>
  </tr>
</table>
<br>
<?php
}
?>
<br>
<form method="POST" class="comment-content">
<input type="text" name="c_user" value="<?php echo "$fname_user"; ?>" readonly style="display:none"/>
<input type="text" placeholder="Comment..." name="comment" style="width:400px; display:block;">
<button type="submit" name="com_post" style="color:rgb(218, 39, 47); background: white; padding:5px; border:none; margin: 5px;">COMMENT</button>
</form>
</div>
<?php
if(isset($_POST['com_post']))
{
  $user_here = $_SESSION['email'];
$user=$_POST['c_user'];
$comment = $_POST['comment'];

$sql="INSERT INTO comment(email,user_name,project_no,project_type,comment,role)VALUES('$user_now', '$user','$id', 'Project-I', '$comment','Supervisor')";
if(mysqli_query($conn,$sql))
{
  $find_project = "SELECT * FROM project1 WHERE id='$id'";
  $run_find = mysqli_query($conn,$find_project);
  while($row = mysqli_fetch_array($run_find))
  {
    $email1 = $row[1];
    $email2 = $row[3];
    $email3 = $row[5]; 
  }

  $msg = "$user has commented on your Project-I.";
  $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email1','$msg','Project-I','stall','$user_here')";
  if(mysqli_query($conn,$add_note))
  {}

  if($email2!='none')
      {
        $msg = "$user has commented on your Project-I.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email2','$msg','Project-I','stall','$user_here')";
        if(mysqli_query($conn,$add_note))
        {}
      }

      if($email3!='none')
      {
        $msg = "$user has commented on your Project-I.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email3','$msg','Project-I','stall','$user_here')";
        if(mysqli_query($conn,$add_note))
        {}
      }
  echo "<meta http-equiv='refresh' content='0'>";;
}
}
?>
