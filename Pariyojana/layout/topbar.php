<link rel="stylesheet" href="layout/css/topmenu.css">
<style>
.notification {
  position: relative;
  display: inline-block;
  background-color: rgb(218, 39, 47);
  border: none;
  color: white;
  font-size: 20px;
  border-radius: 12px;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 2px 8px;
  border-radius: 50%;
  font-size: 15px;
  background-color: blue;
  color: white;
}

.notification:hover{
    color: black;
}
  .addnewcss
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

.addcontainer
{
  padding: 16px;
}

.addbox
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

.addbox-content
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

.addcontainer input[type="submit"]
{
    background-color: rgb(218, 39, 47);
    color: white;
    border: none;
    padding: 6px;
    margin-bottom: 10px;
}

.addcontainer input[type='submit']:hover
{
  opacity:0.7;
  cursor: pointer;
}

.radio_b
{
  padding: 10px;
  margin: 10px;
}
@media only screen and (max-width: 600px) {
.header{
  width:100%;
}
}</style>
<body>
    <div class="header">
        <div class="h-left">Developer: &copy Rusan Vaidya</div>
        <?php
        session_start();
        include 'database_conn.php';
        if(!$_SESSION)
        {

            ?>
            <div class="h-right"><a href="register">Register</a></div>
            <?php    
        }
        else
        {        
            $email = $_SESSION['email'];
            $sql="SELECT * FROM users WHERE user_email='$email'";
            $run=mysqli_query($conn,$sql);
            if(mysqli_num_rows($run)>0)
            {
                while($row=mysqli_fetch_array($run))
                {
                    $user_fname=$row[1];
                    $user_lname=$row[2];
                }
            }
            else
            {
                $sql="SELECT * FROM admin WHERE user_email='$email'";
                $run=mysqli_query($conn,$sql);
            if(mysqli_num_rows($run)>0)
            {
                while($row=mysqli_fetch_array($run))
                {
                    $user_fname=$row[1];
                    $user_lname=$row[2];
                }
            }
        }
        ?>  
            <div class="h-right">
            <?php
                $email = $_SESSION['email'];
                $new_user = "SELECT * FROM admin WHERE user_email = '$email'";
                $run_sql = mysqli_query($conn,$new_user);
                while($row = mysqli_fetch_array($run_sql))
                {
                    $college_name = $row[4];
                }
    if(mysqli_num_rows($run_sql)>0)
    {
      $new_user = "SELECT * FROM users WHERE college ='$college_name' AND verify = 'No'";
      $run_sql = mysqli_query($conn,$new_user);
      $num = mysqli_num_rows($run_sql);
      if($num>0)
      {
        ?>
        <a href="newusers" class="notification"><i class="fa fa-users"></i><span class="badge"><?php echo $num ?></span></a>
        <?php
      }
      else
      {
        ?>
        <a href="newusers" class="notification"><i class="fa fa-users"></i></a>
        <?php
      }
    }
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM notificat WHERE email_note='$email' AND status_note='stall'";
    $run_note = mysqli_query($conn,$sql);
    $n = mysqli_num_rows($run_note);
    if($n>0)
    {
    ?>
                <a onclick="document.getElementById('notnew').style.display='block';" class="notification">
                    <i class="fa fa-globe"></i>
                    <span class="badge"><?php echo "$n"?></span>
                </a>
    <?php
    }
    else 
    {
    ?>
                <a onclick="document.getElementById('notnew').style.display='block';" class="notification">
                    <i class="fa fa-globe"></i>
                </a>
  <?php }?>
                <a href="profile"><i class="fa fa-user-circle-o" title="<?php echo "$user_fname : $user_lname" ?>"></i></a>
                <a href="logout.php"><i class="fa fa-sign-out" title="<?php echo "Logout" ?>"></i></a>
            </div>
            <?php
        }
        ?>   

    </div>
  <div id="notnew" class="addbox">
      <div class="addbox-content">
        <div class="addcontainer">
          <div>
            <span onclick="document.getElementById('notnew').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>
          <h2>Notification</h2>
      <?php include 'note_new.php'?>
  </div>
  </div>
  </div>
    