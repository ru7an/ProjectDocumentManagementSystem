<style>
  *{
  box-sizing: border-box;
}

.column {
  float: left;
  width: 30%;
  margin: 1.5%;
  padding: 10px;
  height: 300px; 
  background: white;
  color: green;
  border-radius: 5px;
  box-shadow: 0 0 2px 2px grey;
  -webkit-animation: fadein 1s;
  animation: fadein 1s;
  text-align: left;
}
.column:hover{
  box-shadow: 0 0 5px 5px grey;
}
.column a, .column-long a
{
  color: green;
}

.column a:hover
{
  text-shadow: 0 0 10px grey, 0 0 20px grey, 0 0 30px grey, 0 0 40px black;
}

.row:after{
  content: "";
  display: table;
  clear: both;
}
.center-content
{
  width: 100%;
}

@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}

.list_here
{
  padding: 10px;
}

</style>
<div class="center-content">
<div class="row">
    <div class="column">
      <div class="list_here">
        <h2><a href="notice" style="text-decoration:none;">Notice</a></h2>
        <ul>
        <?php
            $user_now = $_SESSION['email'];
            $get_admin = "SELECT * FROM users WHERE user_email='$user_now'";
            $run_ga = mysqli_query($conn,$get_admin);
            if(mysqli_num_rows($run_ga))
            {
              while($row=mysqli_fetch_array($run_ga))
              {
                $college = $row[5];
              }
            }
            else{
            $get_admin = "SELECT * FROM admin WHERE user_email='$user_now'";
            $run_ga = mysqli_query($conn,$get_admin);
            if(mysqli_num_rows($run_ga))
            {
              while($row=mysqli_fetch_array($run_ga))
              {
                $college = $row[4];
              }
            }
            }
            $get_head = "SELECT * FROM notice WHERE college='$college' ORDER BY id DESC";
            $run_gh = mysqli_query($conn,$get_head);
            while($row=mysqli_fetch_array($run_gh))
            {
              $id = $row[0];
              $heading=$row[3];
            ?>
              <li><a href="notice/notice_no.php?id=<?php echo"$id" ?>" style="padding: 5px; text-decoration:none;"><?php echo"$heading"; ?></a></li>
            <?php }?>
        </ul>
      </div>
    </div>
  
    <div class="column">
    <div class="list_here">
      <h2><a href="guides" style="text-decoration:none">Guides</a></h2>
        <ul>
        <?php
            $user_now = $_SESSION['email'];
            $get_admin = "SELECT * FROM users WHERE user_email='$user_now'";
            $run_ga = mysqli_query($conn,$get_admin);
            if(mysqli_num_rows($run_ga))
            {
              while($row=mysqli_fetch_array($run_ga))
              {
                $college = $row[5];
              }
            }
            else{
            $get_admin = "SELECT * FROM admin WHERE user_email='$user_now'";
            $run_ga = mysqli_query($conn,$get_admin);
            if(mysqli_num_rows($run_ga))
            {
              while($row=mysqli_fetch_array($run_ga))
              {
                $college = $row[4];
              }
            }
            }
            $get_head = "SELECT * FROM guides WHERE college='$college' ORDER BY id ASC";
            $run_gh = mysqli_query($conn,$get_head);
            while($row=mysqli_fetch_array($run_gh))
            {
              $id = $row[0];
              $heading=$row[3];
            ?>
              <li><a href="guides/guide_no.php?id=<?php echo"$id" ?>" style="padding: 5px; text-decoration:none;"><?php echo"$heading"; ?></a></li>
            <?php }?>
        </ul>
    </div>
    </div>
    <div class="column">
      <div class="list_here">
      <h2><a href="blogs" style="text-decoration:none;">Blogs</a></h2>
        <ul type="none">
        <?php
            $user_now = $_SESSION['email'];
            $get_admin = "SELECT * FROM users WHERE user_email='$user_now'";
            $run_ga = mysqli_query($conn,$get_admin);
            if(mysqli_num_rows($run_ga))
            {
              while($row=mysqli_fetch_array($run_ga))
              {
                $college = $row[5];
              }
            }
            else{
            $get_admin = "SELECT * FROM admin WHERE user_email='$user_now'";
            $run_ga = mysqli_query($conn,$get_admin);
            if(mysqli_num_rows($run_ga))
            {
              while($row=mysqli_fetch_array($run_ga))
              {
                $college = $row[4];
              }
            }
            }
            $get_head = "SELECT * FROM blogs WHERE college='$college' ORDER BY id DESC";
            $run_gh = mysqli_query($conn,$get_head);
            while($row=mysqli_fetch_array($run_gh))
            {
              $id = $row[0];
              $role = $row[4];
              $heading=$row[3];
              $user_name = $row[5];
            ?>
              <li>
                <table style="padding:4px; background: white; margin:5px; border: 1px solid black; border-radius:8px; text-align:center;">
                  <tr>
                    <td><i class="fa fa-user-circle-o" style="font-size:20px;"></i><br><?php echo"$user_name" ?><br><p style="color:grey;"><?php echo"$role" ?></p></td>
                    <td><a href="blogs/blog_no.php?id=<?php echo"$id" ?>" style="padding: 5px; text-decoration:none; color:black;">: <?php echo"$heading"; ?></a></td>
                  </tr>
            </table>                
              </li>
            <?php }?>
        </ul>
    </div>
    </div></div></div>