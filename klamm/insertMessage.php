<?php
session_start();
include("DBConnection.php");

$fromUser=$_POST["fromUser"];
$toUser=$_POST["toUser"];
$message=$_POST["message"];

$output="";
$sql="INSERT INTO message (FromUser,ToUser,Message)
VALUE('$fromUser','$toUser','$message')";

if($connect -> query($sql))
{
    $output="";
}
else
{
    $output="Error . Please Try Again";
}
echo $output;
?>