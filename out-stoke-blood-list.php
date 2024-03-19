<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor Registration</title>
    <link rel="stylesheet" type="text/css" href="s1.css">
    <style type="text/css">
        td{
            width: 200px;
            height: 40px;
        }
    </style>
</head>
<body style="background-color: cyan;">
    <div id="full">
        <div id="inner_full">
            <div id="header"><h2 align ="center"><a href="admin-home.php" style = "text-decoration: none; color: blue;">Rotary Blood Bank</a></h2></div>
            <div id="body">
                <br>
                <?php
                    $un = $_SESSION['un'];
                    if(!$un)
                    {
                        header("Location:index2.php");
                    }
                ?>
                <h1 align = "center">Out Stoke Blood List</h1>
                
                <center><div id="form">
                    <table>
                        <tr>
                            <td><center><b><font color = "blue">Name</font></b></center></td>
                            <td><center><b><font color = "blue">Mobile Number</b></font></center></td>
                            <td><center><b><font color = "blue">Blood Group</font></b></center></td>
                        </tr>
                        <?php
                            $q = $db->query("SELECT * FROM out_stoke_b");
                            while($r1 = $q->fetch(PDO::FETCH_OBJ))
                            {
                                ?>
                                    <tr>
                                        <td><center><?= $r1->name;?></center></td>
                                        <td><center><?= $r1->mno;?></center></td>
                                        <td><center><?= $r1->bname;?></center></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </table>
                </div></center>
                <p align="center"><a href="Logout.php"><font color = "green">Logout</a></p>
            </div>
            <div id="footer"><h4 align="center">© Copyright 2023 Blood Bank System by Saksham Vashisth. All Rights Reserved.</h4></div>
        </div>
    </div>
</body>
</html>