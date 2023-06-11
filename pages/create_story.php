<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
include_once("header.php");
require_once '../control/connection.php'; 
require_once '../models/story.php'; 
 
$st = new Story;
$st->add_story();




?>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<!-----profile---->
                
        <div class="camera_image" >
        
            <img style="width: 50%;" src="../assets/images/images.jpeg" alt="">
            
                    <form action="create_story.php" method="post" enctype="multipart/form-data" class="camera_form">
                    <div class="form_group">
                        <input type="file"  name="image" class="form_control" placeholder="file.." required />
                    </div>
                   
                <div class="form_group">
                <input type="submit" name="submit" value="Story" class="upload_btn">
                </div>
            </form>
                </div>
            </div>
                </div>









<!------sceript--------->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>