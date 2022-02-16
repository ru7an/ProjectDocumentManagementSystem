<style>
table{
    width:100%;
}
table tr td button{
    width:100%;
    text-decoration: none;
    color: black;
    padding: 5px;
    margin: 5px;
    border: none;
}

table tr td button:hover{
    background: lightgrey;
}

table tr td .stall
{
    background: grey;
    color: black;
    padding: 5px;
    border: none;
}

table tr td .stall:hover{
    background: lightgrey;
}
</style>
<table>
    <?php
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM notificat WHERE email_note='$email' ORDER BY id DESC ";
    $run = mysqli_query($conn,$sql);
  
    if(mysqli_num_rows($run)>0)
    {
    while($row=mysqli_fetch_array($run))
    {
        $id_note = $row[0];
        $notify = $row[2];
        $project_type= $row[3];
        $stat = $row[4];
        $sender = $row[5];
    ?>
    <tr>
        <?php
        if($stat=='stall')
        {
        ?>
        <td>
        <form method="POST">
        <input type="text" value="<?php echo $project_type?>" name="pt" readonly style="display:none;">        
            <input type="text" value="<?php echo $sender?>" name="sender" readonly style="display:none;">
            <input type="text" value="<?php echo $id_note?>" name="read_id" readonly style="display:none;">
            <button class="stall" type="submit" name="read"><i class="fa fa-envelope"></i> <?php echo "$notify"?></button></td>
        </form>
        </td>
        <?php
        }
        else
        {
        ?>
        <td>
        <form method="POST">
            <input type="text" value="<?php echo $project_type?>" name="pt" readonly style="display:none;">        
            <input type="text" value="<?php echo $sender?>" name="sender" readonly style="display:none;">
            <input type="text" value="<?php echo $id_note?>" name="read_id" readonly style="display:none;">
            <button type="submit" name="read_after"><i class="fa fa-envelope"></i> <?php echo "$notify"?></button></td>
        </form>
        </td>
        <?php
        }
        ?>
    </tr>
    <?php
    }
    if(isset($_POST['read']))
    {
    $read_id =$_POST['read_id'];
    $sender = $_POST['sender'];
    $pt = $_POST['pt'];
    $not_read = "UPDATE notificat SET status_note = 'read' WHERE email_note = '$email' AND id = '$read_id'";
    if(mysqli_query($conn,$not_read))
    {
        $email_user = $_SESSION['email'];
        $sql_find = "SELECT * FROM users WHERE user_email='$email_user' AND role='student'";
        $run_sql_find = mysqli_query($conn,$sql_find);
        if(mysqli_num_rows($run_sql_find)>0)
        {
            echo "<script>window.open('$pt','_self')</script>";
        }
        else
        {
            $email = $_SESSION['email'];
    $sql = "SELECT * FROM notificat WHERE email_note='$email' ORDER BY id DESC ";
    $run = mysqli_query($conn,$sql);
  
    if(mysqli_num_rows($run)>0)
    {
            $sql_finder = "SELECT * FROM project1 WHERE email='$sender' OR mem1_email='$sender' OR mem2_email='$sender'";
            $run_sql_finder = mysqli_query($conn,$sql_finder);
            while($row = mysqli_fetch_array($run_sql_finder))
            {
                $id_no = $row[0];
                echo "<script>window.open('$pt/documentview.php?id=$id_no','_self')</script>";
        }
    }
    }
}}
if(isset($_POST['read_after']))
{
$read_id =$_POST['read_id'];
$sender = $_POST['sender'];
$email = $_SESSION['email'];
$pt = $_POST['pt'];

$sql = "SELECT * FROM notificat WHERE email_note='$email' ORDER BY id DESC ";
$run = mysqli_query($conn,$sql);

if(mysqli_num_rows($run)>0)
{
    $email_user = $_SESSION['email'];
        $sql_find = "SELECT * FROM users WHERE user_email='$email_user' AND role='student'";
        $run_sql_find = mysqli_query($conn,$sql_find);
        if(mysqli_num_rows($run_sql_find)>0)
        {
            echo "<script>window.open('$pt','_self')</script>";
        }
        else
        {
    if($pt=='Project-I')
    {
        $sql_finder = "SELECT * FROM project1 WHERE email='$sender' OR mem1_email='$sender' OR mem2_email='$sender'";
        $run_sql_finder = mysqli_query($conn,$sql_finder);
        while($row = mysqli_fetch_array($run_sql_finder))
        {
            $id_no = $row[0];
            echo "<script>window.open('$pt/documentview.php?id=$id_no','_self')</script>";
        }
    }
    if($pt=='Project-II')
    {
            $sql_finder = "SELECT * FROM project2 WHERE email='$sender' OR mem1_email='$sender' OR mem2_email='$sender'";
            $run_sql_finder = mysqli_query($conn,$sql_finder);
            while($row = mysqli_fetch_array($run_sql_finder))
            {
                $id_no = $row[0];
                echo "<script>window.open('$pt/documentview.php?id=$id_no','_self')</script>";
            }
    }
    if($pt=='Project-III')
    {
            $sql_finder = "SELECT * FROM project3 WHERE email='$sender' OR mem1_email='$sender' OR mem2_email='$sender'";
            $run_sql_finder = mysqli_query($conn,$sql_finder);
            while($row = mysqli_fetch_array($run_sql_finder))
            {
                $id_no = $row[0];
                echo "<script>window.open('$pt/documentview.php?id=$id_no','_self')</script>";
            }
    }   
}
}
}
}
    ?>
</table>