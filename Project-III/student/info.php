<?php
$display_team = "SELECT * FROM project3 WHERE email = '$email' OR mem1_email = '$email' OR mem2_email = '$email'";
$run_display = mysqli_query($conn,$display_team);
while($row=mysqli_fetch_array($run_display))
{
  $id_no = $row[0];
  $leadn = $row[2];
  $lead = $row[1];
  $mem1 = $row[4];
  $mem2 = $row[6];
  $proposal = $row[7];
}
 ?>

<div class="center">
    <table style="width:100%; padding:15px;">
    <h1>About your Project:</h1>
    <?php
    if($proposal=='Rejected')
    {
    ?>
    <i style="color:red;">Your Project has been <?php echo $proposal?>. Please submit your document again.</i>
  <?php }?>
    <tr  ><td>Name(s) :</td><td><?php echo "$leadn";?><br>
    <?php
    if($mem1!='none')
    { 
      echo "$mem1";
    }
    else
    {
    }?><br>
    <?php
    if($mem2!='none')
    { 
      echo "$mem2";
    }
    else
    {
    }?></td></tr>
    <form method="POST" enctype="multipart/form-data">
    <tr>
      <input type="text" name="id_number" value="<?php echo $id_no ?>" readonly style="display:none;">
      <td>Title :</td>
      <td><input type="text" placeholder="Project Title" name="titlepro" style="width:100%" required></td>
    </tr>
    <tr>
      <td>Programming Language :</td>
      <td><input type="text" placeholder="Language Used" name="language" style="width:100%" required></td>
    </tr>
    <tr>
      <td>Document :<br><i style="color:red">*pdf file required</i></td>
      <td><input type="file" style="background:rgb(218, 39, 47); color:aliceblue" id="filepro" name="filepro"></td>
    </tr>
  </table>
    <center><input type="submit" name="prosubmit" value="Submit"></center>
  </form>
</div>

<?php
  include('../database_conn.php');

  if(isset($_POST['prosubmit']))
  {
    $title = $_POST['titlepro'];
    $lang = $_POST['language'];
    $id = $_POST['id_number'];
    $p_type = "Project-III";
    $def_type = "proposal";

    $file = $_FILES['filepro']['tmp_name'];
    $upload_file = addslashes(file_get_contents($file));
    $location = 'uploads/' . $id . '_' .$p_type. '_' . $def_type . '_' . basename($_FILES['filepro']['name']);

    $insert_document = "INSERT INTO documents (title, lang, project_no, project_type, def_type,location) VALUES ('$title', '$lang', '$id_no', '$p_type','$def_type' ,'$location')";
    if(mysqli_query($conn,$insert_document))
    {
      copy($_FILES['filepro']['tmp_name'], 'uploads/' . $id . '_' . $p_type . '_' . $def_type . '_' .basename($_FILES['filepro']['name']));
      $sql = "UPDATE project3 SET proposal = 'pending...' WHERE id = '$id_no'";
      $run_sql = mysqli_query($conn,$sql);

      $email_student = $_SESSION['email'];
      $find_college = "SELECT * FROM users WHERE user_email='$email_student'";
      $run_find = mysqli_query($conn,$find_college);
      while($row = mysqli_fetch_array($run_find))
      {
        $coll_name = $row[5]; 
      }

      $find_coord = "SELECT * FROM admin WHERE college='$coll_name'";
      $run_find_c = mysqli_query($conn,$find_coord);
      while($row = mysqli_fetch_array($run_find_c))
      {
        $member = $row[2]; 
      }

      $msg = "Team no #$id has submitted proposal for Project-III.";
      $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$member','$msg','Project-III','stall','$email_student')";
      if(mysqli_query($conn,$add_note))
      {}
      echo"<script>window.open('../Project-III','_self');</script>";
    }
  }
?>
