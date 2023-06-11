
<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
    echo "<title>comment</title>";
    require_once '../pages/header.php';
    include '../models/comment.php';
    require_once '../models/ses.php';
    $id = $_SESSION['id'];
    $db = new Database;
    $c= new Comments;
    for($i=1 ; $i < $db->count('comments')+2;$i++){
        $c->show_comment($i);
      }

    $c->setData();
  
?>
<form action="comment_contant.php" method="post">
                            <input type="hidden" name="post_id" value="1">
                            <input type="text" placeholder="add a comment....." name="comment" style="width: 80%; border-radius: 2%;"/>
                            <input type="submit" name="submit" value="comment" style="width: 10%; border-radius: 2%;">
                        </form>
   
    
   
