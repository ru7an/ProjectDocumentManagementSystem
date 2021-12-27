<?php
    if(isset($_POST['logout']))
    {
        unset($_SESSION['user']);
        unset($_SESSION['pass']);

        header('Refresh: 2; URL = ../admin');
    }
?>
<div>
    <form method="POST"><button name="logout">Logout</button></form>
    <table>
        <tr>
            <td><img src="../media/ncit.jpg"></td>
            <td>Nepal College of Information Technology</td>
            <td><a href="">Document</a></td>
            <td><button>Allow Access</button></td>
        </tr>
        <tr>
            <td><img src="../media/ncit.jpg"></td>
            <td>Nepal College of Information Technology</td>
            <td><a href="">Document</a></td>
            <td><button>Allow Access</button></td>
        </tr>
        <tr>
            <td><img src="../media/ncit.jpg"></td>
            <td>Nepal College of Information Technology</td>
            <td><a href="">Document</a></td>
            <td><button>Allow Access</button></td>
        </tr>
        <tr>
            <td><img src="../media/ncit.jpg"></td>
            <td>Nepal College of Information Technology</td>
            <td><a href="">Document</a></td>
            <td><button>Allow Access</button></td>
        </tr>
    </table>
</div>