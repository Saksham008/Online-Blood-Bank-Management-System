<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor Registration</title>
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
                <h1 align = "center">Donor Registration</h1>
                
                <center><div id="form">
                    <form action="" method="post">
                    <table>
                    <tr>
                        <td width="200px" height="50px">Enter Name</td>
                        <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                        <td width="200px" height="50px">Enter Father's Name</td>
                        <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father Name">
                        </td>
                    </tr>
                    <tr>
                        <td width="200px" height="50px">Enter Address</td>
                        <td width="200px" height="50px"><textarea name="address"></textarea></td>
                        <td width="200px" height="50px">Enter City</td>
                        <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
                    </tr>
                    <tr>
                        <td width="200px" height="50px">Enter Age</td> 
                        <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></td>
                        <td width="200px" height="50px">Select Blood Group</td>
                        <td width="200px" height="50px">
                            <select name="bgroup">
                                <option>O+</option>
                                <option>AB +<option>
                                <option>AB -</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px" height="50px">Enter E-Mail</td>
                        <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail"></td>
                        <td width="200px" height="50px">Enter Mobile No</td>
                        <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile Number"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sub" value="Save"></td>
                    </tr>
                    </table>
                    </form>
                    <?php
                        if(isset($_POST['sub']))
                        {
                            $name = $_POST['name'];
                            $fname = $_POST['fname'];
                            $address = $_POST['address'];
                            $city = $_POST['city'];
                            $age = $_POST['age'];
                            $bgroup = $_POST['bgroup'];
                            $email = $_POST['email'];
                            $mno = $_POST['mno'];
                            $q = $db->prepare("INSERT INTO donor_registration(name,fname,address,city,age,bgroup,email,mno) VALUES (:name,:fname,:address,:city,:age,:bgroup,:email,:mno)");

                            $q->bindValue(':name', $name);
                            $q->bindValue(':fname', $fname);
                            $q->bindValue(':address', $address);
                            $q->bindValue(':city', $city);
                            $q->bindValue(':age', $age);
                            $q->bindValue(':bgroup', $bgroup);
                            $q->bindValue(':email', $email); 
                            $q->bindValue(':mno', $mno);

                            if ($q->execute()) {
                                echo "<script>alert('Donor Registration Successful')</script>";
                            } else {
                                echo "<script>alert('Donor Registration Not Successful')</script>";
                            }
                        }
                    ?>
                </div></center>
                <p align="center"><a href="Logout.php"><font color = "green">Logout</a></p>
            </div>
            <div id="footer">
            <h4 align="center">© Copyright 2023 Blood Bank System by Saksham Vashisth. All Rights Reserved.</h4></div>
        </div>
    </div>
</body>
</html>