<?php
include_once("header.php");
?>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
    <!-----profile---->
    <header class="header">
        <div class="profile-container">
            <div class="profile">
                <div class="profile-img">
                    <img src="../img/50.webp">
                </div>
                <div class="info" style="width: 35%; text-align: center; ">
                    <h1 class="profile-user-name"> username</h1>
                </div>
                <div class="stats">
                    <ul>
                        <li> <span class="stat-count">345</span><br>Posts</li>
                        <li><span class="stat-count">1345</span><br>followers</li>
                        <li><span class="stat-count">1945</span><br>following</li>
                    </ul>
                    <form action="">
                        <button type="submit" class="follow-btn" id="follow-btn" onclick="follow()">follow</button>
                    </form>
                </div>
                <div class="bio" style="text-align: center; width:100%;">
                    <p style="text-align: center;">
                        <span class="real-name"> name </span> this is a description</p>

                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="profile-container">
            <div class="gallery">
                <div class="gallery-item">
                    <img src="../img/50.webp" class="gallery-img" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element">likes</span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                                <span class="hide-gallery-element">comments</span>
                                <i class="fas fa-comment"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="../img/50.webp" class="gallery-img" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element">100</span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                                <span class="hide-gallery-element">67</span>
                                <i class="fas fa-comment"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="../img/50.webp" class="gallery-img" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element">likes</span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                                <span class="hide-gallery-element">comments</span>
                                <i class="fas fa-comment"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    

   <!------sceript--------->
<script>
    function follow() {
  const followBtn = document.getElementById('follow-btn');
  followBtn.textContent = 'Following';
  followBtn.disabled = true;
}
</script>



    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>