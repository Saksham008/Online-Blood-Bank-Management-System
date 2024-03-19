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
                <h1 align = "center">Stock Blood List</h1>
                
                <center><div id="form">
                    <table>
                        <tr>
                            <td><center><b><font color = "blue">Name</font></b></center></td>
                            <td><center><b><font color = "blue">Quantity</font></b></center></td>
                        </tr>
                        <tr>
                            <td><center>O+</center></td>
                            <td><center>
                                <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup = 'O+'");
                                    echo $row = $q->rowCount();
                                ?>
                            </center></td>
                        </tr>
                        <tr>
                            <td><center>AB+</center></td>
                            <td><center>
                                <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup = 'AB +'");
                                    echo $row = $q->rowCount();
                                ?>
                            </center></td>
                        </tr>
                        <tr>
                            <td><center>AB-</center></td>
                            <td><center>
                                <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup = 'AB -'");
                                    echo $row = $q->rowCount();
                                ?>
                            </center></td>
                        </tr>
                    </table>
                </div></center>
                <p align="center"><a href="Logout.php"><font color = "green">Logout</a></p>
            </div>
            <div id="footer"><h4 align="center">© Copyright 2023 Blood Bank System by Saksham Vashisth. All Rights Reserved.</h4></div>
        </div>
    </div>
</body>
</html>