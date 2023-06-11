<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:../pages/login.php");
}
require_once '../pages/header.php';
?>

<section>
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown notification-ui show">
                            <a class="nav-link dropdown-toggle notification-ui_icon" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="unread-notification"></span>
                            </a>
                            <div class="dropdown-menu notification-ui_dd show" aria-labelledby="navbarDropdown">
                                <div class="notification-ui_dd-header">
                                    <h3 class="text-center">Notification</h3>
                                    
                                </div>
                                <div class="notification-ui_dd-content">
                                    <a href="#!" class="notification-list notification-list--unread text-dark">
                                        <div class="notification-list_img">

                                        </div>
                                </div>
                                <?php
                                require_once '../models/ses.php';
                                require_once '../project/notifcation.php';
                                require_once '../control/connection.php';
                                require_once '../models/comment.php';
                                $c = new Comments;
                                $db = new Database;
                                $n = new Notifcation;
                                $id = $_SESSION['id'];

                                ?>
                                <div class="notification-list_detail">
                                    
                                          <?php
                                               $n->comment();
                                           
                                          
                                          ?>


                                  
                                </div>
                                
                                 <div class="card">
                                    <?php
                                 $stmt = $db->connect();
                                $rows = $stmt->query("SELECT * from notification  order by id desc limit 10");
                               
                                foreach ($rows as $row) {
                                    if ($row['type'] == 'like') {
                                       
                                    }
                                    if ($row['type'] == 'comment') {
                                        
                                            echo $row['username'] . " is comment on your post " . $row['noti_content'];
 
                                        
                                    }
                                    if ($row['type'] == 'follow') {
                                        echo $row['username'] . " is starting follow you ";
                                   }
                                 } 
                                 ?>

                                 </div>
                                 
                                 <?php
                              







                                ?>





                            </div>
                            <p><small></small></p>
                            </a>

                    </ul>
                </div>
            </div>
        </nav>
        
        <?php $c->show_comment($id); ?>
        <?php $n->show_notification();?>
</section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>