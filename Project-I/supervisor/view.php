<link rel="stylesheet" href = "supervisor/css/view.css">
<table style="margin-top:15px;">
  <tr>
    <th style="text-align:left;border-bottom:1px solid black;">Team</th>
    <th style="text-align:left;border-bottom:1px solid black;">View</th>
  </tr>
  <tr></tr>
  <tr></tr>
  <?php
  $email = $_SESSION['email'];
  $sql="SELECT * FROM project1 WHERE sup_email='$email'";
  $run = mysqli_query($conn,$sql);
  if(mysqli_num_rows($run)>0)
{
  while($row=mysqli_fetch_array($run))
  {
    $id = $row[0];
    $mem1_email =$row[1];
    $mem_name1 = $row[2];
    $mem_name2 = $row[4];
    $mem_name3 = $row[6];

    $team_inform = "SELECT * FROM documents WHERE project_no = '$id' AND project_type = 'Project-I'";
    $run_sql = mysqli_query($conn,$team_inform);
    if(mysqli_num_rows($run_sql)>0)
    {
?>
    <tr>
    <td><?php echo"$mem_name1"; if($mem_name2!='none'){echo",$mem_name2";} if($mem_name3!='none'){echo",$mem_name3";} ?></td>
      <td><a href="documentview.php?id=<?php echo $id?>" style="background:rgb(218, 37, 49); color:white; text-decoration:none; padding:5px;">SELECT</button></a>
    </tr>
  </table>
  <?php
}
}}
else
{
 ?><tr>
   <td><b style="color:grey;">NOT AVAILABLE</b>
   </td>
   <tr>
 <?php
}
?>
</table>
</div>
