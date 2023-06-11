<?php
include_once("../control/connection.php");
include_once("../models/users.php");
class Comments
{
    public $id;
    public $comment_date;
    public $created_by_user_id;
    public $replied_by_user_id;
    public $post_id;
    public $comment_content;


    public function setData( )
    {
        $host = 'localhost';
        $db_name = 'instagram';
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

                if(isset($_POST['submit']) && isset($_POST['comment'])){
                    if(!empty($_POST['comment'])){ 
                    
                $comm = new Comments;
                $created_by_user_id = $_SESSION['id'];
                $comm->comment_content = $_POST["comment"];
                $comm->id = $_SESSION['id'];
            $add_data=$conn->prepare("INSERT INTO comments(comment_content, created_by_user_id , post_id)
                                       VALUES('$comm->comment_content', '$created_by_user_id', '$comm->id '  )");
            $add_data->execute();
       
    }}
}



public function show_comment($user_id)
{
    $comment_value="";
    $u = new User;
    $conn = mysqli_connect("localhost","root","","instagram");
    if($conn)
        {       
            $result=$conn->query("SELECT * from comments where created_by_user_id = '$user_id' ORDER BY comment_date DESC ");
                          if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
             <div class="card">
            <p class="user_name"><?php echo $u->getUsernameById($user_id) ;?></p>
            <p class="comment_value" ><?php echo $row['comment_content'];?></p>
        </div>
      <?php    }
        }
        
}
}

public function getCommentCount($post_id)
    {
        $host = 'localhost';
        $db_name = 'instagram';
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $stmt = $conn->prepare("SELECT COUNT(*) FROM comments ");

        $stmt->execute();
        $result = $stmt->fetchColumn();

        $conn = null;

        return  $result;
    }

    public function show_first_comment()
    {
        $comment_value="";
        $database = mysqli_connect("localhost","root","","instagram");
        if($database)
        {
            $quere=mysqli_query($database,'SELECT * from comments');
            $comment_value= mysqli_fetch_array($quere);
            ?>
            <div class="comment_section">
            <p class="user_name"><?php echo "zezo" ;?></p>
            <p class="comment_value" ><?php echo $comment_value['comment_content']?></p>
        </div>
    <?php    
            }
        else 
            {
                echo "connection filed";
            } 
        }
    }
?>