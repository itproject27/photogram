<?php

session_start();
include("DBConnection.php");
include("links.php");
include('../pages/header.php');
if(isset($_GET["userId"]))
{
    $_SESSION["userId"]=$_GET["userId"];
    header("Location: chatbox.php");
}
?>

    <head>
        <title> Photogram chat </title>
        
        <link rel="icon" type="image/x-icon" href="../assets/images/imag.ico"/>
</head>
<body>
<div class="modal-dialog" style="margin-top: 5rem;">
    <div class="modal-content">
    <div class="modal-header">
        <h4 >Please select your Account</h4>
        </div>
        <div class="modal-body">
            <ol>
        <?php
        $users = mysqli_query($connect, "SELECT * FROM users")
        or die("Failed to query database");
        while($user = mysqli_fetch_assoc($users))
        {echo '<li>
           <a href="index.php?userId='.$user["id"].'">'.$user["username"].'</a>
         </li>
         '; }
        ?>
            </ol>
            <a href="registerUser.php" style="float:right ;">Register here</a>
        </div>
    </div>
</div>
</body>
</html>