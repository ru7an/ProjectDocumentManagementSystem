<link rel="stylesheet" href="home/css/home.css">
<?php
$check = "SELECT * FROM admin WHERE user_email='$email'";
$run = mysqli_query($conn,$check);
if(mysqli_num_rows($run))
{
    include 'menu.php'; 
    include 'content.php';
}
else
{
    $check = "SELECT * FROM users WHERE user_email='$email' AND verify = 'Yes'";
    $run = mysqli_query($conn,$check);
    if(mysqli_num_rows($run))
    {
        include 'menu.php'; 
        include 'content.php';
    }
    else
    {
        ?>
        <div class="format">
        <center>
            <h2>Please Wait!</h2>
            <h4>Your Account is being reviewed by your college Co-ordinator.</h4>
            <h5>Please have patience.</h5>
            <span class="fa fa-gear fa-spin" style="font-size:50px; color: rgb(218, 39, 47); margin:20px;"></span>
        </center>
        </div>
        <?php
    }
}
?>
 