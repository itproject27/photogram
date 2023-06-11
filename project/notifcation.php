<?php
require_once '../control/profiles.php';
class Notifcation{
private $host = 'localhost';
private $db_name = 'instagram';
private $username = 'root';
private $password = '';

function like(){
   
    $db = new PDO("mysql:host=localhost;dbname=instagram;port=3307", "root", "");
    $stmt = $db->prepare("SELECT caption,users.username from post 
        inner join users
        ON post.user_id = users.id 
        order by post.id desc limit 1");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!$rows){
    echo ' record not found';
}else{
    foreach($rows as $row){

          $stmt = $db->prepare("INSERT into notification(username ,noti_content , type) values('$row[username]','$row[caption]','like')");
          $stmt->execute();
     }

    
}
}



function comment(){

    $db = new PDO("mysql:host=localhost;dbname=instagram", "root", "");
    $comment = $db->prepare("select comments.comment_content  ,users.username from comments
               join users
                  ON comments.created_by_user_id = users.id
                order by comments.id desc limit 1 
                ");
    $comment->execute();
    $rows = $comment->fetchAll(PDO::FETCH_ASSOC);
    if(!$rows){
        echo 'users not found';
    
     }else{
        foreach($rows as $row){
          
            
            $comment= $db->prepare("INSERT into notification(username ,noti_content , type) values(' $row[username]','$row[comment_content]',' comment')");
             $comment->execute();
        }
     }
}


function follow(){
    $db = new PDO("mysql:host=localhost;dbname=instagram;port=3307", "root", "");
    $follow = $db->prepare("select users.username from follower
              inner join users
                ON follower.following_user_id = users.id
                 order by follower.following_user_id desc limit 1");

    $follow->execute();
    $rows = $follow->fetchAll(PDO::FETCH_ASSOC);
    if(!$rows){
        echo 'users not found';
    
     }else{
        foreach($rows as $row){
          
            // echo "<br>".$row['username']." is starting follow you";
            $stmt = $db->prepare("INSERT into notification(username  , type) values('$row[username]','follow')");
             $stmt->execute();
        }
     }
    
}


function show_notification() {
  $noti_value = "";
  $database = mysqli_connect("localhost", "root", "", "instagram");
  if ($database) {
      $query = mysqli_query($database, 'SELECT * FROM notification LIMIT 3');
      while ($row = mysqli_fetch_array($query)) {
          ?>
          <div class="comment_section">
              <p class="user_name"><?php echo $row['username'] ?></p>
              <p class="comment_value"><?php echo $row['noti_content'] ?></p>
          </div>
          <?php
      }
  } else {
      echo "connection failed";
  }
}
}
?>


<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./images/favicon-32x32.png"
      
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="stylee.css" />
     
    <title>Frontend Mentor | Notifications page</title>
  </head>
  </div>
    <div class="container">
    <header>
        <div class="notif_box">    
          <h2 class="title">Notifications</h2>
         
          
          
          <!-- <?php if($notif>= 0): ?>  
              <span id="notifes"></span>
          <?php endif; ?> -->
        </div>
        <p id="mark_all">Mark all as read</p>
      </header>
      <main>
     <div class = "notif_card unread">
        
     <div >
     <?php 
     $n = new Notifcation;


                // if($n->type == "post"){
                //     $n->like();
                // }
                // if($n->type =="comment"){
                //    // $n->comment();
                // }
            
                // if($n->type =="follow"){
                //     $n->follow();
                // }
        
        
        
        ?>

        
         </div> 
        </div>
         
    </div>   


         
      </main>
    </div>

    <script src="app.js"></script>
  </body>


</html>

<!--  html page        ______________________________________________ -->





