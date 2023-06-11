<?php
session_start();
include("DBConnection.php");
include("links.php");
include('../pages/header.php');

$users = mysqli_query($connect,"SELECT * FROM users WHERE Id='".$_SESSION["userId"]."' ")
 or die("Failed to query database");
 $user= mysqli_fetch_assoc($users);
?>

    <head>
        <title>Photogram Chat</title>
        <link rel="icon" type="image/x-icon" href="../assets/images/imag.ico"/>

        <style>
             .containor-fluid{
                margin-top: 5rem ;
            }
            .row{
                font-weight: bold;
                
            }
            p{
                font-size: 16px;
            }

            .go{
                margin-left: 4%;
                padding-left: 14px;
                border-radius: 6px;
                width: 170px;
                font-size: large;
                color: white;
                font-family: Georgia, 'Times New Roman', Times, serif;
                background-color: rgb(0, 162, 255);
            }

        </style>
    </head>
    <body>
    <div class="containor-fluid">
    <div class="row">
        <div class="col-md-4">
          <p>Hi <?php echo $user["username"];?> </p>
          <input type="text" id="fromUser"value=<?php echo $user["id"];?> hidden />
          <div class="go">
          <p>Send message to:</p></div>
          <ul>
            <?php
            $msgs = mysqli_query($connect,"SELECT * FROM users")
            or die("Failed to query database");
           while( $msg= mysqli_fetch_assoc($msgs))
           {
            echo '<li><a href="?toUser='.$msg["id"].'">'.$msg["username"].'</a></li>';
           }
            ?>
            
          </ul>
          <a href="index.php"><--Back</a>
        </div>
        <div class="col-md-4">
        <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header" style="background-color: rgb(0, 162, 255); color:white">
        <h4>
            <?php
             if(isset($_GET["toUser"]))
             {
                $UserName = mysqli_query($connect,"SELECT * FROM users WHERE id='".$_GET["toUser"]."' ")
                or die("Failed to query database");
                $uName= mysqli_fetch_assoc($UserName);
               
                echo '<input type="text" value='.$_GET["toUser"].' id="toUser" hidden />';
                echo $uName["username"];
               
             }
             else{
                $UserName = mysqli_query($connect,"SELECT * FROM users ")
                or die("Failed to query database");
                $uName= mysqli_fetch_assoc($UserName);
               $_SESSION["toUser"]= $uName["id"];
                echo '<input type="text" value='.$_SESSION["toUser"].' id="toUser" hidden />';
                echo $uName["username"];
             }
            ?>
        </h4>
        </div>
        <div class="modal-body" id="msgbody" style="height:400px; overflow-y:scroll; overflow-x:hidden; background-color: #fff; ">
        <?PHP
            if(isset($_GET["toUser"]))
            $chats= mysqli_query($connect,"SELECT * FROM message where (FromUser='".$_SESSION["userId"]."' AND ToUser = '".$_GET["toUser"]."') OR (FromUser='".$_GET["toUser"]."' AND  ToUser = '".$_SESSION["userId"]."') ")
            or die("Failed to query database");
            
            else
            $chats= mysqli_query($connect,"SELECT * FROM message where (FromUser='".$_SESSION["userId"]."' AND ToUser = '".$_SESSION["toUser"]."') OR (FromUser='".$_SESSION["toUser"]."' AND  ToUser = '".$_SESSION["userId"]."') ")
            or die("Failed to query database");


         while( $chat= mysqli_fetch_assoc($chats)){
             if($chat["FromUser"]== $_SESSION["userId"])
             echo "<div style='text-align:right;'>
             <p style='background-color:#008080; word-wrap:break-word;display: inline-block;padding:5px;border-radius: 5px;color:white'>
             ".$chat["Message"]."
             </p>
             </div>";

             else
             echo "<div style='text-align:left';>
                  <p style='background-color:#B0E0E6; word-wrap:break-word; display:inline-block;
                  padding:5px; border-radius:10px; max width:70%;'>
                  ".$chat["Message"]."
                  </p>
                  </div>";
         }
            ?>
        </div>
        
        <div class="modal-footer">
            <textarea id="message" class="from-control" style="height:40px; width:80%" > </textarea>
            <button id="send" class="btn btn-primary" style="height:70%;">send</button>
        </div>
    </div>
</div>
        </div>
        <div class="col-md-4">

        </div>
        
        </div>
    </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#send").on("click",function(){
                $.ajax({
                   
                    url:"insertMessage.php",
                    method:"POST",
                    data:{
                        fromUser: $("#fromUser").val(),
                        toUser: $("#toUser").val(),
                        message: $("#message").val()
                    },
                    dataType:"text",
                    success: function(data)
                    {
                        $("Message").val("");
                    }
            });
            });

            setInterval(function(){
             $.ajax({
                url:"realTimeChat.php",
                method:"POST",
                data:{
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val()
                },
                dataType:"text",
                success:function(date)
                {
                    $("#msgBody").html(data);
                }
             });
            },700);
        });
    </script>
</html>