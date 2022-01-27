<?php
    if(isset($_POST['logout']))
    {
        unset($_SESSION['user']);
        unset($_SESSION['pass']);

        header('Refresh: 2; URL = ../admin');
    }
?>
<link rel="stylesheet" href="static/css/view.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preload" as="font" href="../static/fonts/Oswald-VariableFont_wght.ttf">

<style>
    @font-face {
        font-family: "Oswald";
        src: url("../static/fonts/Oswald-VariableFont_wght.ttf") format("truetype");
    }
</style>
<div class="admin-view">
    <div class="admin-page">
            <div class="clogo">
                <img src="../media/icon/logo.png">
            </div>
            <div class="admin-info">
                <div class="admin-information">
                    <p>Pariyojana</p>
                    <form method="POST"><button name="logout" title="Sign Out"><i class="fa fa-power-off"></i></button></form>
                </div>
            </div>
    </div>

    <!-- new commers -->
    <div id="new_commers">
        <h1>New Registration</h1>
        <button id="scu">Show Current Users</button>
    <table>
        <tr>
            <th>S.N</th>
            <th>Trademark</th>
            <th>Institute</th>
            <th>Co-ordinator</th>
            <th>Document</th>
            <th colspan="2">Verification</th>
        </tr>
        <?php
        include '../db.php';
        $view_all_inst = "SELECT * FROM userc WHERE verify='No';";
        $get_all_inst = pg_query($dbcon,$view_all_inst);
        if(pg_num_rows($get_all_inst))
        {
            while($row=pg_fetch_array($get_all_inst))
            {
                $reg_id = $row[0];
                $col_cor = $row[1];
                $col_name = $row[4];
                $col_doc = $row[6];
                $col_logo = $row[5];
                ?>
                <tr>
                    <td><?php echo $reg_id ?></td>
                    <td><img src="../<?php echo $col_logo ?>"></td>
                    <td><?php echo $col_name ?></td>
                    <td><?php echo $col_cor ?></td>
                    <td><a href="../<?php echo $col_doc ?>">Document</a></td>
                    <td><button class="allow" name="allow">Allow</button></td>
                    <td><button class="reject" name="reject">Reject</button></td>
                </tr>

                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan="7">No New Registration Yet</td>
            </tr>
            <?php    
        }
        ?>
    </table>
    </div>

    <!-- present users -->
    <div id="present_users">
    <table>
        <h1>Registered</h1>
        <button id="snr">Show New Registration</button>
        <tr>
            <th>S.N</th>
            <th>Trademark</th>
            <th>Institute</th>
            <th>Co-ordinator</th>
            <th>Document</th>
            <th>Verification</th>
        </tr>
        <?php
        include '../db.php';
        $view_all_inst = "SELECT * FROM userc; WHERE verify='Yes';";
        $get_all_inst = pg_query($dbcon,$view_all_inst);
        if(pg_num_rows($get_all_inst))
        {
            while($row=pg_fetch_array($get_all_inst))
            {
                $reg_id = $row[0];
                $col_cor = $row[1];
                $col_name = $row[4];
                $col_doc = $row[6];
                $col_logo = $row[5];
                ?>
                <tr>
                    <td><?php echo $reg_id ?></td>
                    <td><img src="../<?php echo $col_logo ?>"></td>
                    <td><?php echo $col_name ?></td>
                    <td><?php echo $col_cor ?></td>
                    <td><a href="../<?php echo $col_doc ?>">Document</a></td>
                    <td><button class="reject" name="remove">Remove</button></td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan="7">No Registration Yet</td>
            </tr>
            <?php    
        }
        ?>
    </table>
    </div>
</div>

