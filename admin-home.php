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
                <h1 align = "center">Welcome User</h1><br><br>
                <ul>
                    <li><a href="donor-red.php">Donor Registration</a></li>
                    <li><a href="donor-list.php">Donor List</a></li>
                    <li><a href="stoke-blood-list.php">In Stoke Blood List</a></li>
                </ul><br><br><br><br><br>
                <ul>
                    <li><a href="out-stoke-blood-list.php">Out Stoke Bload List</a></li>
                    <li><a href="exchange-blood-registration.php">Exchange Blood Registration</a></li>
                    <li><a href="exchange-blood-list.php">Exchange Blood List</a></li>
                </ul>
                <p align="center"><a href="Logout.php"><font color="green">Logout</font></a></p>
            </div>
            <div id="footer">
                <h4 align="center">© Copyright 2023 Blood Bank System by Saksham Vashisth. All Rights Reserved.</h4>
            </div>
        </div>
    </div>
</body>
</html>
