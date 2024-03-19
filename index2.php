<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="s1.css">
</head>
<body style="background-color: cyan;">
    <div id="full">
        <div id="inner_full">
            <div id="header"><h2 align ="center">Rotary Blood Bank</h2></div>
            <div id="body">
                <br><br><br><br><br>
                <form action="" method="post">
                <table align="center">
                    <tr>
                        <td width="200px" height ="70px"><b>Enter Username</b></td>
                        <td width="100px" height ="70px"><input type="text" name="un" placeholder="Enter Username" style="width: 180px;height: 30px;border-radius: 10px;"></td>
                    </tr>
                    <tr>
                        <td width="200px" height ="70px"><b>Enter Password</b></td>
                        <td width="200px" height ="70px"><input type="text" name="ps" placeholder="Enter Password" style="width: 180px;height: 30px;border-radius: 10px;"></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="sub" value="Login" style="width: 70px;height: 30px;border-radius: 5px;"></td>
                    </tr>
                </table>
                </form>
                <?php
                    if(isset($_POST['sub']))
                    {
                        $un = $_POST['un'];
                        $ps = $_POST['ps'];
                        $q=$db->prepare("SELECT * FROM admin where uname='$un' && pass='$ps'");
                        $q->execute();
                        $res=$q->fetchAll(PDO::FETCH_OBJ);
                        if($res)
                        {
                            $_SESSION['un'] = $un;
                            header("Location:admin-home.php");
                        }
                        else
                        {
                            echo "<script>alert('Wrong User')</script>";
                        }
                    }
                ?>
            </div>
            <div id="footer"><h4 align="center">© Copyright 2023 Blood Bank System by Saksham Vashisth. All Rights Reserved.</h4></div>
        </div>
    </div>
</body>
</html>