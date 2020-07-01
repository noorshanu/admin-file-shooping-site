<?php

$server_name ="localhost";
$username = "root";
$password ="";
$db_name= "adminpanel";

$connection = mysqli_connect($server_name,$username,$password);

$dbconfig = mysqli_select_db($connection,$db_name);
if($dbconfig)
{
    //echo "database Connected";
}
else
{
    echo "database not connected";
}
?>