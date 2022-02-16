<style>
  .document{
  background:rgb(218,39,47);
  color:aliceblue;
  padding: 5px;
  text-decoration: none;
  }

  .fdocumnet
{
    background-color: rgb(218, 39, 47);
    color: black;
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

.docx
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

.marks i
{
  display: block;
  color: red;
}

.docx-content
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

</style>
<?php
    $team_info = "SELECT * FROM project2 WHERE email = '$email' OR mem1_email = '$email' OR mem2_email ='$email'";
    $run_sql = mysqli_query($conn,$team_info);
    while($row = mysqli_fetch_array($run_sql))
    {
      $id_no =$row[0];
      $lead_email = $row[1];
      $lead = $row[2];
      $mem1 = $row[4];
      $mem2 = $row[6];
      $proposal = $row[7];
      $mid = $row[8];
      $final = $row[9];
      $sup_n = $row[10];
      $sup_e = $row[11];
    }
?>
<div>
    <?php
    $team_inform = "SELECT * FROM documents WHERE project_no = '$id_no' AND project_type = 'Project-II'";
    $run_sql = mysqli_query($conn,$team_inform);
    while($row = mysqli_fetch_array($run_sql))
    {
      $title = $row[1];
      $lang = $row[2];
    }
     ?>
  <div>
    <center>
    <h1><?php echo"$title"?></h1>
    <table>
      <tr>
        <td><label>Team : </label></td>
        <td><?php echo"$lead"; if($mem1!='none'){echo",$mem1";} if($mem2!='none'){echo",$mem2";}?></td>
    </tr>
    <tr>
      <td><label>Programming Language/Platform : </label></td>
      <td><?php echo "$lang"; ?>
  </tr>
  <?php
  if($sup_n=='none')
  {
  }
  else
  {
  ?>
  <tr>
    <td><label>Supervisor:</label></td>
    <td><?php echo"$sup_n" ?></td>
  </tr>
  <?php
  }
  if($proposal=='none')
  {
  }
  else
  {
  ?>
  <tr>
    <td><label>Proposal : </label></td>
    <td><?php
    if($proposal=='Accepted')
    {
      ?>
      <b style="color:green"><?php echo "$proposal"; ?></b>
      <?php
    }
    elseif ($proposal=='none' || $proposal=='pending...')
    {
      ?><b style="color:blue"><?php echo "$proposal"; ?></b>
      <?php
    }
    else
    {
      ?><b style="color:red"><?php echo "$proposal"; ?></b>
      <?php
    }  ?></td>
</tr>
<?php }?>
<?php
    $ret_stat = "SELECT * FROM statement WHERE project_no ='$id_no' AND project_type = 'Project-II'";
    $run_stat = mysqli_query($conn,$ret_stat);
      while($row = mysqli_fetch_array($run_stat))
      {
        $p_stat = $row[1];
        $m_stat = $row[2];
        $f_stat = $row[3];
      }
      if(mysqli_num_rows($run_stat)>0)
      {
        ?>
      <tr>
        <td><label>Proposal Statement : </label></td>
        <td>

          <?php echo "$p_stat";  }?>
        </td>
        </tr>
<tr>
  <?php
  if($sup_n=="none")
  {
  }
  else
  {
  if($mid=='none')
  {}
  else
  {  ?>
  <td><label>Mid : </label></td>
  <td>
    <?php
    if($mid=='Accepted')
    {
      ?>
      <b style="color:green"><?php echo "$mid"; ?></b>
      <?php
    }
    elseif ($mid=='none' || $mid=='pending...')
    {
      ?><b style="color:blue"><?php echo "$mid"; ?></b>
      <?php
    }
    else
    {
      ?><b style="color:red"><?php echo "$mid"; ?></b>
      <?php
    }  ?>
  </td>
</tr>
<?php
            if($m_stat!='')
            {
              ?>
            <tr>
              <td><label>Mid Statement(by Supervisor) : </label></td>
              <td>
                <?php echo "$m_stat"; }?>
              </tr>
<tr>

  <?php
  if($final=='none')
  {}
    else
    {
      ?>
  <td><label>Final : </label></td>
  <td>
    <?php
    if($final=='Accepted')
    {
      ?>
      <b style="color:green"><?php echo "$final"; ?></b>
      <?php
    }
    elseif ($final=='none' || $final='pending...')
    {
      ?>
      <b style="color:blue"><?php echo "$final"; ?></b>
      <?php
    }
    else
    {
      ?><b style="color:red"><?php echo "$final"; ?></b>
    <?php
  }  ?>
  </td>
</tr>
<?php
if($f_stat!='')
              {
                ?>
              <tr>
                <td><label>Final Statement : </label></td>
                <td>
                  <?php echo "$f_stat"; }?>
                </tr>
  <tr>
    <td><label>Supervisor : </label></td>
    <td><?php echo "$sup_n"; ?></td>
</tr>
<?php
}}}
?>
</table>
<?php
  $query = "SELECT * FROM documents WHERE project_no = '$id_no' and def_type = 'proposal' AND project_type = 'Project-II'";
  $run_sql = mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($run_sql))
  {
    $path =$row[6];
  }
 ?>
 <div style="margin:10px;">
<a class="document" href="<?php echo $path ?>">Proposal Document</a>
<?php

if($final == 'pending...' || $final == 'Accepted')
{
  $query = "SELECT * FROM documents WHERE project_no = '$id_no' and def_type = 'final' AND project_type = 'Project-II'";
  $run_sql = mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($run_sql))
  {
    $f_path =$row[6];
  }
    ?>
    <a class="document" href="<?php echo $f_path ?>">Final Document</a>
 
    <?php
}
else
{
  if($proposal == 'Accepted' && $mid == 'Accepted')
  {
    if($final =='none' || $final == 'Re-Demo' || $final =='Rejected')
    {
  ?>
  <button style=" background:rgb(218,39,47); color:aliceblue; border:none; padding: 6px; text-decoration: none; margin:10px;" onclick="document.getElementById('fdocument').style.display='block';">Submit Final Document</button>
  <div id="fdocument" class="docx">
    <div class="docx-content">
      <div class="container">
        <div>
          <span onclick="document.getElementById('fdocument').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <h3 style="color:black;">Submit Final Document</h3>
    <form method="POST" class="marks" enctype="multipart/form-data">
      <input type="text" value="<?php echo $title ?>" name="titlepro" readonly style="display:none">
      <input type="text" value="<?php echo $lang ?>" name = "language" readonly style="display:none">
      <input type="number" value="<?php echo $id_no ?>" name ="project_no" readonly style="display:none">
      <p style="color:black;">Document :<input type="file" id="fileprof" name="fileprof" style="background:rgb(218,39,47); color:aliceblue; border:none; padding: 6px; text-decoration: none;"><i>*pdf file required</i></p>
      <input type="submit" name="profsubmit" value="Submit">
  </form>
</div>
</div>
</div>
  <?php
}
}
}
?>
</center>
<?php
if($sup_e=="none" && $sup_n=="none")
{
}
else
{
 include('comment.php');
}
?>

<?php
  include('../database_conn.php');

  if(isset($_POST['profsubmit']))
  {
    $title = $_POST['titlepro'];
    $lang = $_POST['language'];
    $id = $_POST['project_no'];
    $p_type = "Project-II";
    $def_type = "final";

    $file = $_FILES['fileprof']['tmp_name'];
    $upload_file = addslashes(file_get_contents($file));
    $location = 'uploads/' . $id . '_' .$p_type. '_' . $def_type . '_' . basename($_FILES['fileprof']['name']);

    $insert_document = "INSERT INTO documents (title, lang, project_no, project_type, def_type, location) VALUES ('$title', '$lang', '$id_no', '$p_type','$def_type','$location')";    
    if(mysqli_query($conn,$insert_document))
    {
      copy($_FILES['fileprof']['tmp_name'], 'uploads/' . $id . '_' . $p_type . '_' . $def_type . '_' .basename($_FILES['fileprof']['name']));
      $sql = "UPDATE project2 SET final = 'pending...' WHERE id = '$id_no'";
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

      $msg = "Team no #$id has submitted final document for Project-II.";
      $add_note = "INSERT INTO notificat (email_note,notify,project_type,status_note,sender) VALUES ('$member','$msg','Project-II','stall','$email_student')";
      if(mysqli_query($conn,$add_note))
      {}

      echo"<script>window.open('../Project-II','_self');</script>";
    }
  }
?>
</div>