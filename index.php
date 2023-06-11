<?php
include_once '../models/ses.php';
include_once '../models/users.php';
include_once("header.php");
require_once '../control/profiles.php';
include_once '../control/connection.php';
require_once '../models/comment.php';
require_once '../models/post.php';
require_once '../models/story.php';
$db = new Database;
$conn = $db->connect();
$pr = new Profile;
$u = new User;
$c = new Comments;
$po = new Posts;
if(isset($_SESSION['id']))
{
  $id = $_SESSION['id'];
}

?>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

.story{
    display: flex;
    padding: 16px;
    background-color: white;
    border: 1px solid rgba(219, 219,219, 1);
    border-radius: 3px;
}
    .comment_section {
  width: 20%;
  hyphens: 50px;
  background: #e2e2e2;
  border: none solid ;
  display: block;
  justify-content: space-between;
  align-items: center;
  border-radius: 10px;

}
.user_name{
    padding-left:10px ;
    font-size: 14px;
    font-weight: bold;
    color: #092074;
}
.comment_value{
    padding: 5px;
}


        .camera {
    display: flex;
    flex-wrap: wrap;
    padding: 3rem;
}

.camera_image {
    position: relative;
    flex: 1 0 22rem;
    margin: 1rem;
    color: #fff;
    cursor: pointer;
    text-align: center;

}

.camera_image img {
    width: 100%;
    border-radius: 2%;
    margin-right: 40px;

}
        .card {
            border: 1px solid #dbdbdb;
            border-radius: 3px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .card-img {
            display: flex;
            align-items: center;
            padding: 12px;
            height: 100px;
        }

        .card-img img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
            margin-top: 50px;
        }

        .card-subtitle {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .card-body {
            padding: 0;
        }

        .card-text {
            padding: 12px;
            font-size: 14px;
            line-height: 1.5;
        }

        .card-text a {
            color: #385185;
            font-weight: 600;
            text-decoration: none;
        }

        .card-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
            <!-- Content -->


            <div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-8 mb-4">
      <div class="card" style="height: 100px;margin-top: 10px;">
        <div class="row">
          <div class="col-md-6">
            <div class="card-img">
              <?php  
       if(isset($_SESSION['id'])){
    
    
      $id = $_SESSION['id'];?>

           <a href="create_story.php"> <?php  $pr->displayProfileImage($id) ;?> </a>
           <a href="stories.php"> <?php  
           $pr->displayProfileImage($id) ;}?> </a>
            </div>
          </div>
          <div class="col-md-6">
           
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <div class="card" style="margin-top: 30px;">

            <div class="camera_image">
            <!-- posts -->

            <div class="col-md-6 col-lg-4 mb-3" style="width: 100%;">
                

                    
            <?php 
              for($i=1 ; $i < rand(1,$db->count('post'));$i++){?>
                <?php
                $po->viewPostsByUser($i);
              }
            ?>
                
            </div>
            </div>
                
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="card" style="margin-top: 10px;">
      <div class="card-img">
        <a href="profile.php">
              <?php 
       if(isset($_SESSION['id'])){
    
    
        $id = $_SESSION['id'];
              $pr->displayProfileImage($id); }?></a>
      <h6 class="card-subtitle text-muted"><?php
     if(isset($_SESSION['id'])){
    
    
      $id = $_SESSION['id'];
      echo $u->getUsernameById($id);} ?></h6>
      </div>
          <button class="follo-btn" style="margin-left:70%;"><a href="../includes/logout.php" style="text-decoration: none; color:#000;">log out</a></button>
            
            <?php 
              for($i=1 ; $i < rand(1,$db->count('users'));$i++){
                $u->viewUsers($i);
              }
            ?>
           
    </div>
  </div>
</div>
            </div>



        <!-- posts -->

        <script>
            const followBtn = document.querySelector('#follow-btn');
const userId = followBtn.dataset.userId;

followBtn.addEventListener('click', () => {
    const action = followBtn.innerText.toLowerCase();

    fetch('/follow.php', {
        method: 'POST',
        body: JSON.stringify({ userId, action }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            followBtn.innerText = data.action;
        }
    })
    .catch(error => console.error('Error:', error));
});
        </script>
       
                <script src="app.js"></script>
	<script defer src=
"../assets/js/project1.js">
	</script>







</body>
</html>