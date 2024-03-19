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
                <h1 align = "center">Exchange Blood Registration</h1>
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
                        <td width="200px" height="50px">Enter E-Mail</td>
                        <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail"></td>
                    </tr>
                    <tr>
                        <td width="200px" height="50px">Enter Mobile No</td>
                        <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile Number"></td>
                    </tr>
                    <tr>
                    <td width="200px" height="50px">Select Blood Group</td>
                        <td width="200px" height="50px">
                            <select name="bgroup">
                                <option>O+</option>
                                <option>AB +<option>
                                <option>AB -</option>
                            </select>
                        </td>
                        <td width="200px" height="50px">Exchange Blood Group</td>
                        <td width="200px" height="50px">
                            <select name="exbgroup">
                                <option>O+</option>
                                <option>AB +<option>
                                <option>AB -</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sub" value="Save"></td>
                    </tr>
                    </table>
                    </form>
                    <?php
                        if(isset($_POST['sub']))
                        {
                            //front end data input//
                            $name = $_POST['name'];
                            $fname = $_POST['fname'];
                            $address = $_POST['address'];
                            $city = $_POST['city'];
                            $age = $_POST['age'];
                            $bgroup = $_POST['bgroup'];
                            $email = $_POST['email'];
                            $mno = $_POST['mno'];
                            $exbgroup = $_POST['exbgroup'];

                            //Select and Insert
                            $q = "SELECT * FROM donor_registration WHERE bgroup = '$bgroup'";
                            $st = $db->query($q);
                            $num_row = $st->fetch();
                            $id = $num_row['id'];
                            $name = $num_row['name'];
                            $b1 = $num_row['bgroup'];
                            $mno = $num_row['mno'];
                            $q1 = "INSERT INTO out_stoke_b (bname, name, mno) VALUES (?, ?, ?)";
                            $st1 = $db->prepare($q1);
                            $st1->execute([$b1, $name, $mno]);

                            //Delete code
                            $q2 = "DELETE FROM donor_registration WHERE id = :id";
                            $st2 = $db->prepare($q2);
                            $st2->bindValue(':id', $id, PDO::PARAM_INT);
                            $st2->execute();

                            //Exchange Info Insert
                            $q = $db->prepare("INSERT INTO exchange_b (name,fname,address,city,age,bgroup,email,mno,exbgroup) VALUES (:name,:fname,:address,:city,:age,:bgroup,:email,:mno,:exbgroup)");

                            $q->bindValue(':name', $name);
                            $q->bindValue(':fname', $fname);
                            $q->bindValue(':address', $address);
                            $q->bindValue(':city', $city);
                            $q->bindValue(':age', $age);
                            $q->bindValue(':bgroup', $bgroup);
                            $q->bindValue(':email', $email); 
                            $q->bindValue(':mno', $mno);
                            $q->bindValue(':exbgroup', $exbgroup);
                            if ($q->execute()) 
                            {
                                echo "<script>alert('Donor Registration Successful')</script>";
                            } 
                            else
                            {
                                echo "<script>alert('Donor Registration Not Successful')</script>";
                            }
                        }
                    ?>
                </div></center>
                <p align="center"><a href="Logout.php"><font color = "green">Logout</a></p>
            </div>
            <div id="footer"><h4 align="center">© Copyright 2023 Blood Bank System by Saksham Vashisth. All Rights Reserved.</h4></div>
        </div>
    </div>
</body>
</html>