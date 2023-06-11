<?php
require_once '../control/connection.php';
require_once '../models/users.php';
require_once '../control/profiles.php';
class Story
{
    public $id;
    public $comment_date;
    public $story_content;
    public $user_id;
    public $replied_user_id;


    function add_story()
    {

        if (isset($_POST["submit"])) {
            $status = 'error';
            if (!empty($_FILES["image"]["name"])) {
                $db = new Database;
                $conn = $db->connect();
                $user_id = $_SESSION['id'];

                $fileName = basename($_FILES["image"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));
                    $insert = $conn->query("INSERT into story (story_content,user_id )
                                    VALUES ('$imgContent','$user_id')");

                    if ($insert) {
                        $status = 'success';
                        $statusMsg = "File uploaded successfully.";
                        header("location:index.php");
                    } else {
                        $statusMsg = "File upload failed, please try again.";
                    }
                }
            }
        }
    }

    function viewStory($user_id)
    {
        $db = new Database;
        $db = $db->connect();
        $p = new Profile;
        $u = new User;
        $result = $db->query("SELECT * FROM story WHERE user_id = $user_id ");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
?>
                <div class="card-img" style="display:flex;">
                    <?php $p->displayProfileImage($user_id); ?>
                    <h6 class="card-subtitle text-muted"><?php echo $u->getUsernameById($user_id); ?></h6>
                </div>
                <div class="gallery" style="width: 100%; padding-bottom: 1rem; align-items: center;">
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['story_content']); ?>" style="wigth:100%" />
<?php
            }
        } else {
            echo '<p class="status error">No posts found for this user.</p>';
        }
    }



}

