<?php
session_start();
if(!$_SESSION)
{
?>
<title>Pariyojana Admin</title>
<link rel="icon" href="/media/icon/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <div class="login-container">
        <div class="login-admin">
            <img src="../media/icon/logo.png">
            <h1>Pariyojana Administration</h1>
            <form method="POST">
                <input type="text" placeholder="Username" name="user">
                <input type="password" placeholder="Password" name="pass">
                <button type="submit" name="admin_submit">Submit</button>
            </form>
            <div id="adminw">Incorrect Username or Password</div>
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

    if($user_name=="admin" && $pass_word=="nimda")
    {
        echo "<script>window.open('/admin','_self')</script>";
        $_SESSION['user'] = $user_name;
    }
    else
    {
        echo "<script>
        document.getElementById('adminw').style.display = 'block';
        </script>";
    }
}
?>
