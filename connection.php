<?php
$db=new PDO('mysql:host=localhost; dbname=bbms', 'root','');
if($db)
{
echo "Connection To Database Successful.";
}
else
{
echo "Connection Failed.";
}
?>