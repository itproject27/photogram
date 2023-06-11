<?php
session_start();
include("DBConnection.php");

$fromUser= $_post["fromUser"];
$toUser= $_post["toUser"];

$output="";

$chats= mysqli_query($connect,"SELECT * FROM message where (FromUser='".$fromUser."' AND ToUser = '".$toUser."') OR (FromUser='".$toUser."' AND ToUser = '".$fromUser."') ")
        or die("Failed to query database");
        while( $chat= mysqli_fetch_assoc($chats)){
            if($chat["FromUser"]== $fromUser)
            $output="<div style='text-align:right;'>
            <p style='background-color:#008080; word-wrap:break-word;display: inline-block;padding:5px;border-radius: 5px;color:white'>
            ".$chat["Message"]."
            </p>
            </div>";

            else
            $output ="<div style='text-align:left';>
                 <p style='background-color:#B0E0E6; word-wrap:break-word; display:inline-block;
                 padding:5px; border-radius:10px; max width:70%;'>
                 ".$chat["Message"]."
                 </p>
                 </div>";
        }
          echo $output;
?>