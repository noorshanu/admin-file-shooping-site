<?php
session_start();
include('database/dbconfig.php');
if($dbconfig)
{
   // echo "database connected";
}
else
{
 header("location:database/dbconfig.php");
}


if(!$_SESSION['username']){
    header('location:login.php');
}



?>