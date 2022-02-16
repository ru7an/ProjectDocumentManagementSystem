<div>
<a class="al" href="accepted_list.php" style="float: right; background:rgb(218,39,47); color:aliceblue; text-decoration:none; padding:5px; margin: 5px;">Accepted List <p class="fa fa-graduation-cap"></p></a>
<table style="width:100%; margin:10px;">
  <tr>
    <td><b>Team</b></td>
    <td><b>View<b></td>
  </tr>
<?php
  $sql_college = "SELECT * FROM admin WHERE user_email='$email'";
  $run = mysqli_query($conn,$sql_college);
  while($row=mysqli_fetch_array($run))
  {
    $college =$row[4];
  }

  $sql = "SELECT * FROM project1 WHERE college = '$college' AND proposal = 'pending...' OR final = 'pending...' OR sup_email='none' ORDER BY id DESC";
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

    $team_inform = "SELECT * FROM documents WHERE project_no = '$id_no' AND project_type = 'Project-I'";
    $run_sql = mysqli_query($conn,$team_inform);
    if(mysqli_num_rows($run_sql)>0)
    {
?>
    <tr>
      <td><?php echo"$mem_name1"; if($mem_name2!='none'){echo",$mem_name2";} if($mem_name3!='none'){echo",$mem_name3";} ?></td>
      <td><a href="documentview.php?id=<?php echo $id_no?>" style="background:rgb(218,39,47); color:aliceblue; text-decoration:none; padding:5px;">SELECT</a></td>
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
   <td></td>
   <tr>
 <?php
}
?>
</table>
</div>
</div>
