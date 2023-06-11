<?php
require_once '../models/users.php';
require_once '../control/connection.php';
require_once '../control/profiles.php';
require_once '../models/comment.php';

class Posts
{

    public $id;
    public $image;
    public $post_date;
    public $user_id;
    public $caption;
    public $like_count;


    private $db;

    public function construct()
    {
        $host = 'localhost';
        $db_name = 'mydatabase';
        $username = 'myusername';
        $password = 'mypassword';
        $this->db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    }

    function add_post()
    {
        $status = $statusMsg = '';
        if (isset($_POST["submit"]) && isset($_POST["caption"])) {
            $status = 'error';
            if (!empty($_FILES["image"]["name"]) && !empty($_POST["caption"])) {
                $db = new Database;
                $conn = $db->connect();
                $user_id = $_SESSION['id'];
                $this->caption = $_POST["caption"];


                $fileName = basename($_FILES["image"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));


                    $insert = $conn->query("INSERT into post (image, post_date , user_id , caption  )
                                            VALUES ('$imgContent', NOW(), $user_id , '$this->caption ') ");

                    if ($insert) {
                        $status = 'success';
                        $statusMsg = "File uploaded successfully.";
                        header("location:profile.php");
                    } else {
                        $statusMsg = "File upload failed, please try again.";
                    }
                } else {
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            } else {
                $statusMsg = 'Please select an image file to upload.';
            }
        }
        echo $statusMsg;
    }


    function count_posts($id)
    {
        $host = 'localhost';
        $db_name = 'instagram';
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        $stmt = $conn->prepare("SELECT COUNT(*) FROM post WHERE user_id = :user_id");

        $stmt->bindParam(':user_id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        $conn = null;

        return  $result;
    }


    public function viewPostsByUser($user_id)
    {
        $db = new Database;
        $db = $db->connect();
        $p = new Profile;
        $u = new User;
        $c = new Comments;
        $result = $db->query("SELECT * FROM post WHERE user_id = $user_id ORDER BY post_date DESC");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
?>
                <div class="card-img">
                    <?php $p->displayProfileImage($user_id); ?>
                    <h6 class="card-subtitle text-muted"><?php echo $u->getUsernameById($user_id); ?></h6>
                </div>
                <div class="gallery" style="width: 100%; padding-bottom: 1rem;">
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['image']); ?>" style="wigth:100%" />
                    <div class="card-img" style="display: flex; align-items: center">
                        <h6 class="card-subtitle text-muted"><?php echo $row['caption']; ?></h6>
                    </div>
                    <div class="like-comment-share" style="display: flex;">
                        <i class="icon fas fa-comment" style="color: #000;"></i>
                        <p class="comment" style="color: #000;"> <?php echo $c->getCommentCount($row['id']); ?> comment</p>
                       
                    </div>
                    <div class="postfootee-content">
                        <p class="time" style="color: #000; margin-left: -8rem; "><?php echo '<br>' . $this->getPostDate($row['post_date']); ?></p>
                    </div>
                </div>
                <div class="add-comment">
                    <div class="left-side">
                        <form action="" method="post">
                            <input type="hidden" name="post_id" value="">
                            <a href="../pages/comment_contant.php">
                                <input type="text" placeholder="add a comment....." name="comment" style="width: 100%; border-radius: 2%;" /></a>

                        </form>
                        
                    </div>
                </div>

<?php
            }
        } else {
            echo '<p class="status error">No posts found for this user.</p>';
        }
    }



    private function getPostDate($post_date)
    {
        $date = new DateTime($post_date);
        return $date->format('F j, Y \a\t g:i a');
    }

}




?>