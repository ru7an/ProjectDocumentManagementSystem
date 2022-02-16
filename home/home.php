<style>
    .format
    {
        position: absolute;
        top: 50%;
        left: 50%;
        transform:translate(-50%,-50%);
    }
    .format center
    {
        margin-bottom: 50px;
    }
    .center, .center-content {
        width: 800px;
        margin: 0 auto;
        text-align: center;
        font-family: Cinzel, serif;
}

.center img {
    width: 150px;
    height: 150px;
    padding: 20px;
}

</style>
<?php
$check = "SELECT * FROM admin WHERE user_email='$email'";
$run = mysqli_query($conn,$check);
if(mysqli_num_rows($run))
{
    include 'topbar.php';
    ?>
    <div class="center">
        <img src="../media/logo.png">
        <h1>Project Document Management System</h1>
    </div>
    <?php
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
        include 'topbar.php';
        ?>
        <div class="format">
            <center>
                <h2>Please Wait!</h2>
                <h4>Your Account is being reviewed by your college Co-ordinator.</h4>
                <h5>Please have patience.</h5>
            </center>
            <div>
                <div class="pl">
                    <div class="ploader" style="margin: 0 auto;">
                        <img src="media/logo.png">
                        <div class="shadow"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
 