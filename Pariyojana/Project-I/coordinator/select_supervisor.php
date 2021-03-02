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

/* The container */
.container2 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 17px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container2 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark2 {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container2:hover input ~ .checkmark2 {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container2 input:checked ~ .checkmark2 {
  background-color: rgb(218,39,47);
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark2:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container2 input:checked ~ .checkmark2:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container2 .checkmark2:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}

</style>
<?php
$check_email="SELECT * FROM project1 WHERE id = '$id'";
$check=mysqli_query($conn,$check_email);
if(mysqli_num_rows($check)>0)
{
  while($row=mysqli_fetch_array($check))
  {
    $id_no = $row[0];
    $proposal =$row[7];
    $mid = $row[8];
    $final = $row[9];
    $sup_email = $row[11];
    $sup_name = $row[10];
  }
  if($proposal=='pending...' || $proposal=='Rejected' || $proposal=='Re-demo')
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
      <?php echo"$lead"?><input type="number" name="mem1_marks_p" placeholder="Marks for <?php echo"$lead" ?>" required>
      <?php if($mem1!='none'){echo"$mem1"?><input type="number" placeholder="Marks for <?php echo"$mem1" ?>" name="mem2_marks_p" required><?php } else { ?><input type="number" name="mem2_marks_p" style="display:none;" value="0" required><?php } ?>
      <?php if($mem2!='none'){echo"$mem2"?><input type="number" placeholder="Marks for <?php echo"$mem2" ?>" name="mem3_marks_p" required><?php } else { ?><input type="number" name="mem3_marks_p" style="display:none;" value="0" required><?php } ?>
      <table style="width:100%; margin-bottom: 15px;">
        <tr>
          <td><i>This Project is:</i></td>
        </tr>
        <tr>
          <td>
          <label class="container2">
            Accepted
            <input type="radio" value="Accepted" name="proposal" required>
            <span class="checkmark2"></span>
          </label>
          </td>
          <td>
          <label class="container2">
            Re-Demo
            <input type="radio" value="Re-Demo" name="proposal" required>
            <span class="checkmark2"></span>
          </label>
          </td>
          <td><label class="container2">
            Rejected
            <input type="radio" value="Rejected" name="proposal" required>
            <span class="checkmark2"></span>
          </label>
        </td>
        </tr>
      </table>
        <textarea placeholder="Co-ordinator Statement" name="state" required></textarea>
        <input type="text" value="Project-I" name="project_type" readonly style="display:none;">
      <input type="submit" name="accept" value="Submit">
    </form>
  </div>
  </div>
  </div>
</center>
  <?php
  $user_here =$_SESSION['email'];
  if(isset($_POST['accept']))
  {
    $m1_marks = $_POST['mem1_marks_p'];
    $m2_marks = $_POST['mem2_marks_p'];
    $m3_marks = $_POST['mem3_marks_p'];
    $status=$_POST['proposal'];
    $statement_c = $_POST['state'];

    $sql= "UPDATE project1 SET proposal='$status', mid = 'pending...' WHERE id='$id_no'";
    if(mysqli_query($conn,$sql))
    {
      echo "<meta http-equiv='refresh' content='0'>";
    }
    if($status=='Rejected' || $status=='Re-Demo')
    {
      $sql_del = "DELETE FROM documents WHERE project_no = '$id_no' AND project_type = 'Project-I'";
        if(mysqli_query($conn,$sql_del))
        {
          //notification
          $find_project = "SELECT * FROM project1 WHERE id='$id_no'";
          $run_find = mysqli_query($conn,$find_project);
          while($row = mysqli_fetch_array($run_find))
          {
            $email1 = $row[1];
            $email2 = $row[3];
            $email3 = $row[5]; 
          }

          $msg = "Your submitted proposal for Project-I has been $status.";
          $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email1','$msg','Project-I','stall','$user_here')";
          if(mysqli_query($conn,$add_note))
          {}

          if($email2!='none')
          {
            $msg = "Your submitted proposal for Project-I has been $status.";
            $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email2','$msg','Project-I','stall','$user_here')";
            if(mysqli_query($conn,$add_note))
            {}
          }

          if($email3!='none')
          {
            $msg = "Your submitted proposal for Project-I has been $status.";
            $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email3','$msg','Project-I','stall','$user_here')";
            if(mysqli_query($conn,$add_note))
            {}
          }

          //forward
          echo "<script>window.open('../Project-I','_self')</script>";
        }
    }
    else
    {
      $sql= "INSERT INTO statement(proposal_statement, mid_statement, final_statement, project_no, project_type) VALUES ('$statement_c', '', '', '$id_no','Project-I')";
      if(mysqli_query($conn,$sql))
      {
        echo "<meta http-equiv='refresh' content='0'>";
      }
      $sql= "INSERT INTO marksheet(mem1_marks, mem2_marks, mem3_marks, project_no, project_type, def_type) VALUES ('$m1_marks', '$m2_marks', '$m3_marks', '$id_no', 'Project-I', 'proposal')";
      if(mysqli_query($conn,$sql))
      {
        echo "<meta http-equiv='refresh' content='0'>";
        //notification
        $find_project = "SELECT * FROM project1 WHERE id='$id_no'";
        $run_find = mysqli_query($conn,$find_project);
        while($row = mysqli_fetch_array($run_find))
        {
          $email1 = $row[1];
          $email2 = $row[3];
          $email3 = $row[5]; 
        }

        $msg = "Your submitted proposal for Project-I has been $status.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email1','$msg','Project-I','stall','$user_here')";
        if(mysqli_query($conn,$add_note))
        {}

        if($email2!='none')
        {
          $msg = "Your submitted proposal for Project-I has been $status.";
          $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email2','$msg','Project-I','stall','$user_here')";
          if(mysqli_query($conn,$add_note))
          {}
        }

        if($email3!='none')
        {
          $msg = "Your submitted proposal for Project-I has been $status.";
          $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email3','$msg','Project-I','stall',$user_here)";
          if(mysqli_query($conn,$add_note))
          {}
        }
      }
    }
  }
}
  else {

  if($sup_email == "none" && $sup_name == "none")
  {
?>
<h1 style="margin-top:10px">SELECT SUPERVISOR</h1>
    <table style="width:50%; border:1px solid black">
    <th colspan="2">List of supervisor</th>
  <?php
  $supv = "SELECT * FROM users WHERE role = 'supervisor'";
  $run = mysqli_query($conn,$supv);
  while($row = mysqli_fetch_array($run))
  {
      $s_fname = $row[1];
      $s_email = $row[2];
   ?>
   <form method="POST">
   <tr><td><input type="text" value="<?php echo "$s_fname" ?>" name="sup_name" style="border:none; width:90%;"></td>
       <td><input type="text" value="<?php echo $s_email ?>" name="sup_email" style="display:none"></td>
        <td><input type="submit" name="set_sup" value="SELECT" style="border:none; background-color:rba(218,39,47); color:aliceblue; padding:5px; border-radius:0px; font-size:15px; width:auto;"/></td>
</form>
<?php
  }
?>
</table>
</div>

<?php
if(isset($_POST['set_sup']))
{
    $sup_n = $_POST['sup_name'];
    $sup_e = $_POST['sup_email'];
    $user_here = $_SESSION['email'];
    $up_sup = "UPDATE project1 SET sup_email = '$sup_e' ,sup_name = '$sup_n' WHERE id = '$id_no'";
    if(mysqli_query($conn,$up_sup))
    {
      echo "<meta http-equiv='refresh' content='0'>";
      //notification
      $find_project = "SELECT * FROM project1 WHERE id='$id_no'";
      $run_find = mysqli_query($conn,$find_project);
      while($row = mysqli_fetch_array($run_find))
      {
        $email1 = $row[1];
        $email2 = $row[3];
        $email3 = $row[5]; 
      }

      $msg2 = "You are assigned to supervise a project.";
      $add_note2 = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$sup_e','$msg2','Project-I','stall','$email1')";
      if(mysqli_query($conn,$add_note2))
      {}

      $msg = "$sup_n has been assigned as your Project-I supervisor.";
      $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email1','$msg','Project-I','stall','$user_here')";
      if(mysqli_query($conn,$add_note))
      {}

      if($email2!='none')
      {
        $msg = "$sup_n has been assigned as your Project-I supervisor.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email2','$msg','Project-I','stall','$user_here')";
        if(mysqli_query($conn,$add_note))
        {}
      }

      if($email3!='none')
      {
        $msg = "$sup_n has been assigned as your Project-I supervisor.";
        $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email3','$msg','Project-I','stall','$user_here')";
        if(mysqli_query($conn,$add_note))
        {}
      }
    }
}
?>

<?php
}
else {
  if($final=='pending...' || $final=='Rejected' || $final=='Re-Demo')
  {
  ?>
  <center>
  <button class="marksheetcss" style="margin:10px;" onclick="document.getElementById('marksheet').style.display='block';">Marksheet</button>
  <div id="marksheet" class="markbox">
    <div class="markbox-content">
      <div class="container">
        <div>
          <span onclick="document.getElementById('marksheet').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <h1>Marksheet</h1>
    <form method="POST" class="marks">
    <?php echo"$lead"?><input type="number" name="mem1_marks_f" required placeholder="Marks for <?php echo"$lead"?>"> 
    <?php if($mem1!='none'){echo"$mem1"?><input type="number" name="mem2_marks_f" placeholder="Marks for <?php echo"$mem1"?>" required><?php } else { ?><input type="number" name="mem2_marks_f" style="display:none;" value="0" required><?php } ?>
    <?php if($mem2!='none'){echo"$mem2"?><input type="number" name="mem3_marks_f" placeholder="Marks for <?php echo"$mem2"?>" required><?php } else { ?><input type="number" name="mem3_marks_f" style="display:none;" value="0" required><?php } ?>
    <table style="width:100%; margin-bottom: 15px;">
        <tr>
        <td><i>This Project is:</i></td>
          <td>
          <label class="container2">
            Accept
            <input type="radio" value="Accepted" name="final" required>
            <span class="checkmark2"></span>
          </label>
          </td>
          <td>
          <label class="container2">
            Re-Demo
            <input type="radio" value="Re-Demo" name="final" required>
            <span class="checkmark2"></span>
          </label>
          </td>
          <td><label class="container2">
            Reject
            <input type="radio" value="Rejected" name="final" required>
            <span class="checkmark2"></span>
          </label>
        </td>
        </tr>
      </table>
      <textarea placeholder="Co-ordinator Statement" name="state" required></textarea>
    <input type="submit" name="f_accept" value="Submit">
  </form>
</div>
</div>
</div>
</center>
<?php
}}
if(isset($_POST['f_accept']))
{
  $m1_marks = $_POST['mem1_marks_f'];
  $m2_marks = $_POST['mem2_marks_f'];
  $m3_marks = $_POST['mem3_marks_f'];
  $status=$_POST['final'];
  $statement_c = $_POST['state'];

  $sql= "UPDATE project1 SET final='$status' WHERE id='$id_no'";
  if(mysqli_query($conn,$sql))
  {
    echo "<meta http-equiv='refresh' content='0'>";
  }

  $sql2 = "UPDATE statement SET final_statement='$statement_c' WHERE id='$id_no' AND project_type='Project-I'";
  if(mysqli_query($conn,$sql2))
  {
    echo "<meta http-equiv='refresh' content='0'>";
  }

  $sql= "INSERT INTO marksheet(mem1_marks, mem2_marks, mem3_marks, project_no, project_type, def_type) VALUES ('$m1_marks', '$m2_marks', '$m3_marks', '$id_no', 'Project-I', 'final')";
  if(mysqli_query($conn,$sql))
  {
    $find_project = "SELECT * FROM project1 WHERE id='$id_no'";
      $run_find = mysqli_query($conn,$find_project);
      while($row = mysqli_fetch_array($run_find))
      {
        $email1 = $row[1];
        $email2 = $row[3];
        $email3 = $row[5]; 
      }
      $user_here = $_SESSION['email'];
    $msg = "Your submitted final for Project-I has been $status.";
    $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email1','$msg','Project-I','stall','$user_here')";
    if(mysqli_query($conn,$add_note))
    {}

    if($email2!='none')
    {
      $msg = "Your submitted final for Project-I has been $status.";
      $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email2','$msg','Project-I','stall','$user_here')";
      if(mysqli_query($conn,$add_note))
      {}
    }

    if($email3!='none')
    {
      $msg = "Your submitted final for Project-I has been $status.";
      $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$email3','$msg','Project-I','stall',$user_here)";
      if(mysqli_query($conn,$add_note))
      {}
    }
    echo "<meta http-equiv='refresh' content='0'>";
  }

}
?>

<?php
if($proposal =='Accepted' && $mid == 'Accepted' && $final == 'Accepted')
{
 $sqlp = "SELECT * FROM marksheet WHERE project_no = '$id_no' AND def_type='proposal' AND project_type = 'Project-I'";
 $run = mysqli_query($conn,$sqlp);
 while($row=mysqli_fetch_array($run))
 {
    $mem1_p = $row[1];
    $mem2_p = $row[2];
    $mem3_p = $row[3];
  }
 ?>
 <center>
 <table>
   <tr>
     <th></th>
     <th><?php echo"$lead"?></th>
      <?php if($mem1!='none'){?><th><?php echo"$mem1"?></th><?php } ?>
      <?php if($mem2!='none'){?><th><?php echo"$mem2"?></th><?php } ?>
   </tr>
 <tr>
   <td><b>Proposal</b></td>
   <td><?php echo $mem1_p?></td>
   <?php if($mem1!='none'){?><td><?php echo $mem2_p?></td><?php }?>
   <?php if($mem2!='none'){?><td><?php echo $mem3_p?></td><?php }?>
 </tr>
 <?php
 $sqlm = "SELECT * FROM marksheet WHERE project_no = '$id_no' AND def_type='mid' AND project_type = 'Project-I'";
 $run = mysqli_query($conn,$sqlm);
 while($row=mysqli_fetch_array($run))
 {
    $mem1_m = $row[1];
    $mem2_m = $row[2];
    $mem3_m = $row[3];
  }
 ?>
 <tr>
   <td><b>Mid</b></td>
   <td><?php echo $mem1_m?></td>
   <?php if($mem1!='none'){?><td><?php echo $mem2_m?></td><?php }?>
   <?php if($mem2!='none'){?><td><?php echo $mem3_m?></td><?php }?>
 </tr>
 <?php
 $sqlf = "SELECT * FROM marksheet WHERE project_no = '$id_no' AND def_type='final' AND project_type = 'Project-I'";
 $run = mysqli_query($conn,$sqlf);
 while($row=mysqli_fetch_array($run))
 {
    $mem1_f = $row[1];
    $mem2_f = $row[2];
    $mem3_f = $row[3];
  }
 ?>
 <tr>
   <td><b>Final</b></td>
   <td><?php echo $mem1_f?></td>
   <?php if($mem1!='none'){?><td><?php echo $mem2_f?></td><?php }?>
   <?php if($mem2!='none'){?><td><?php echo $mem3_f?></td><?php }?>
 </tr>
 <tr style="background-color:grey;">
   <td><b>Total</b></td>
   <td><b><?php echo $mem1_p+$mem1_m+$mem1_f?></b></td>
   <?php if($mem1!='none'){?><td><b><?php echo $mem2_p+$mem2_m+$mem2_f?></b></td><?php }?>
   <?php if($mem2!='none'){?><td><b><?php echo $mem3_p+$mem3_m+$mem3_f?></b></td><?php }?>
 </tr>
<?php } ?>
</table>
</center>
<?php }} ?>
