<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
include_once("header.php");
require_once '../control/profiles.php';
include_once '../control/connection.php';
require_once '../models/post.php';
require_once '../models/users.php';
$db = new Database;
$conn = $db->connect();
$pr = new Profile;
$po = new Posts;
$u = new User;

$id = $_SESSION['id'];
?>

<head>
    <link rel="stylesheet" href="../../project/assets/css/style.css">
    <style>
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
<!-----profile---->
<header class="header">
    <div class="profile-container">


        <div class="profile">
            <div class="profile-img">
                <a href="edit_profile.php">
                    <?php
                    
                    $pr->displayProfileImage($id); ?>
                </a>
            </div>
            <div class="info">
                <h1 class="profile-user-name">
                    <?php
                   echo $u->getUsernameById($id);
                    ?>
                </h1>

                <form action="" method="get" style="display: inline-block;">

                    <button class="edit-btn">
                        <a href="account.php" style="text-decoration: none; color:black;">
                            Edit profile
                        </a>
                    </button>

                </form>

                <button class="profile-btn setting-btn" id="options_btn" aria-label="profile settings">
                    <i class="fas fa-cog"></i>
                </button>

                <div class="setting" id="setting">
                    <div class="setting_window">
                        <span class="close_setting" id="close_setting">&times;</span>
                        <a href="account.php">Edit profile</a>
                        <a href="create_post.php">Create post</a>
                        <a href="../includes/logout.php">Log out</a>
                    </div>
                </div>
            </div>
            <div class="stats">
                <ul>
                    <li> <span class="stat-count">
                            <?php

                            echo  $po->count_posts($id);
                            ?>
                        </span><br>Posts</li>
                    <li><span class="stat-count">
                            <?php
                           $db->get('followers');
                            ?>
                        </span><br>followers</li>
                    <li><span class="stat-count">
                            <?php
                            $db->get('followings');
                            ?>
                        </span><br>following</li>
                </ul>
            </div>
        </div>
    </div>
</header>


<section class="camera_container">
    <div class="camera">
        <div class="camera_image">
            <div class="mb-3 col-md-6" style="width: 100%;">
                <a href="create_post.php" style="text-decoration: none;">
                    <input class="form-control" type="text" id="post" name="post" value="add post" autofocus />
                </a>
            </div>
            <!-- posts -->

            <div class="col-md-6 col-lg-4 mb-3" style="width: 100%;">
                <div class="card h-100" style="width: 100%;">

                    <?php $po->viewPostsByUser($id); ?>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- posts -->


    </div>

    </div>
    </div>
    </div>
</section>
</div>
<!------sceript--------->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    var settingWindow = document.getElementById("setting");
    var optionsBtn = document.getElementById("options_btn");
    var closeWindow = document.getElementById("close_setting");

    optionsBtn.addEventListener("click", (e) => {
        e.preventDefault();
        settingWindow.style.display = "block";
    })

    closeWindow.addEventListener("click", (e) => {
        e.preventDefault();
        settingWindow.style.display = "none";
    })

    Window.addEventListener("click", (e) => {
        if (e.target == settingWindow) {
            settingWindow.style.display = "none";
        }
    })
</script>

</body>

</html>