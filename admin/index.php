<?php
session_start();
if(!$_SESSION)
{
?>
    <link rel="stylesheet" href="static/css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <div class="login-container">
        <div class="login-admin">
            <img src="../media/logo.png">
            <h1>Pariyojana Administration</h1>
            <form method="POST">
                <input type="text" placeholder="Username" name="user">
                <input type="password" placeholder="Password" name="pass">
                <button type="submit" name="admin_submit">Submit</button>
            </form>
        </div>
</div>
<?php
}
else
{
    include 'admin.php';
}
if(isset($_POST['admin_submit']))
{
    $user_name = $_POST['user'];
    $pass_word = $_POST['pass'];

    if($user_name=="admin" && $pass_word=="admin")
    {
        echo "<script>window.open('/admin','_self')</script>";
        $_SESSION['user'] = $user_name;
    }
}
?>
