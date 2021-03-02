<html>
<link rel="icon" href="logo.png">
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


<?php
    include '../database_conn.php';
    $id = $_GET['id'];
    $team_info = "SELECT * FROM project1 WHERE id = '$id'";
    $run_sql = mysqli_query($conn,$team_info);
    while($row = mysqli_fetch_array($run_sql))
    {
      $lead_email = $row[1];
      $lead = $row[2];
      $mem1 = $row[4];
      $mem2 = $row[6];
      $proposal = $row[7];
      $mid = $row[8];
      $final = $row[9];
      $sup_e = $row[11];
      $sup_n = $row[10];
    }
    $team_inform = "SELECT * FROM documents WHERE project_no = '$id' AND project_type = 'Project-I'";
    $run_sql = mysqli_query($conn,$team_inform);
    while($row = mysqli_fetch_array($run_sql))
    {
      $title = $row[1];
      $lang = $row[2];
    }
     ?></td>
  </tr>
  <div class="center-b">
    <center><h1><?php echo"$title"?></h1></center>
    <table>
      <tr>
        <td><label>Team : </label></td>
        <td><?php echo"$lead"; if($mem1!='none'){echo",$mem1";} if($mem2!='none'){echo",$mem2";}?></td>
    </tr>
    <tr>
      <td><label>Project : </label></td>
      <td>
        <?php echo"Project-I"; ?>
      </td>
    </tr>
    <tr>
      <td><label>Programming Language/Platform/Description : </label></td>
      <td><?php echo "$lang"; ?>
    </tr>
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
      <?php }  ?></td>
  </tr>
    <?php
    $ret_stat = "SELECT * FROM statement WHERE project_no ='$id' AND project_type = 'Project-I'";
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
            {
              ?>
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
                <?php echo "$m_stat"; }}?>
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
                  <?php echo "$f_stat"; }}?>
                </tr>
                <tr>
                  <td><label>Supervisor : </label></td>
                  <td><?php echo "$sup_n"; }?></td>
                </tr>
                <?php

?>
</table>
<?php
  $query = "SELECT * FROM documents WHERE project_no = '$id' and def_type = 'proposal' AND project_type = 'Project-I'";
  $run_sql = mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($run_sql))
  {
    $path =$row[6];
  }
  $query = "SELECT * FROM documents WHERE project_no = '$id' and def_type = 'final' AND project_type = 'Project-I'";
  $run_sql = mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($run_sql))
  {
    $f_path =$row[6];
  }
 ?>
 <center>
<a class="document" href="<?php echo $path ?>" style="background:rgb(218,39,47); color:aliceblue; text-decoration:none; padding:5px; margin:5px;">Proposal Document</a>
<?php
if($final == 'pending...' || $final == 'Accepted')
{
  ?>
  <a class="document" href="<?php echo $f_path ?>" style="background:rgb(218,39,47); color:aliceblue; text-decoration:none; padding:5px; margin:5px;">Final Document</a>
</center><?php
}
$user = $_SESSION['email'];
$sql = "SELECT * FROM admin WHERE user_email='$user'";
$run = mysqli_query($conn,$sql);
if(mysqli_num_rows($run)>0)
{
  include('coordinator/select_supervisor.php');
}
else
{
  $sql = "SELECT * FROM users WHERE user_email='$user' AND role = 'supervisor'";
  $run = mysqli_query($conn,$sql);
  if(mysqli_num_rows($run)>0)
  {
    include('supervisor/comment.php');
  }
  else
  {
      include('student/comment.php');
  }
}
?>
</div>