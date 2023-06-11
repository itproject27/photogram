<?php 
require_once '../pages/header.php';
require_once '../models/story.php';
require_once '../models/ses.php';
$id = $_SESSION['id'];
?>
<div style="align-items: center;">
        <?php   $st = new Story;
                $st->viewStory($id);
                     ?>

                     </div>