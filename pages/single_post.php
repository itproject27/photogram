<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
include_once("header.php");

?>

<!-------section----->
<section class="main single-post-container">
    <div class="wrapper">
        
        <div class="left-col">

            <!-------post------>

            <div class="post">
                <div class="info">
                    <div class="user">
                        <div class="profile-pic">
                            <img src="../assets/images/photo2.jpeg" alt="">

                        </div>
                        <p class="username">username</p>
                    </div>
                </div>
                <img src="../assets/images/photo3.jpeg" class="post-image">
                <div class="post-contant">
                     <div class="reaction-wrapper nav-items" >
                            <i class="icon fas fa-heart"></i>
                            <i class="icon fas fa-comment"></i>
                            <i class="icon fas fa-share-alt"></i>
                        </div>
                    <p class="likes">2,154 likes</p>
                    <p class="discription"><span>username</span>this is a post by usermane</p>
                    <p class="post-time">2023/05/08</p>
                </div>
                <div class="comment-wrapper">
                    <img src="../assets/images/50.webp" class="icon">
                    <input type="text" class="comment-box" placeholder="Add a comment">
                    <button class="comment-btn">comment</button>
                </div>
            </div>

        </div>

        <div class="right-col">
            <!----profile card----->
            <div class="profile-card">
                <div class="profile-pic">
                    <img src="../assets/images/50.webp" alt="">
                </div>
                <div>
                    <p class="usermane">usermane</p>
                    <p class="sub-text">sub-text</p>
                </div>
                <button class="logout-btn">logout</button>
            </div>
            <!----suggestion card----->
            <p class="suggestion-text"> suggestion for you </p>
            <div class="suggestion-card">
                <div class="suggestion-pic">
                    <img src="../assets/images/images.jpeg" alt="">
                </div>
                <div>
                    <p class="usermane">usermane</p>
                    <p class="sub-text">sub-text</p>
                </div>
                <button class="folow-btn">follow</button>
            </div>


        </div>
    </div>

</section>

<!----------script------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"> </script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>