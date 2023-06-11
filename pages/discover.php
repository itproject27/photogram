<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
include_once("header.php");
include_once("../control/connection.php");

?>
    <!-----profile---->
    <head>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <main>
        <div class="discover.-container">
            <div class="gallery">

                <div class="gallery-item">
                    <img src="../assets/images/50.webp" class="gallery-img"  alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element">2,455</span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                                <span class="hide-gallery-element">765</span>
                                <i class="fas fa-comment"></i>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="../assets/images/images.jpeg" class="gallery-img"  alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element">2,455</span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                                <span class="hide-gallery-element">765</span>
                                <i class="fas fa-comment"></i>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="../assets/images/photo1.jpeg" class="gallery-img"  alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element">2,455</span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                                <span class="hide-gallery-element">765</span>
                                <i class="fas fa-comment"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                
                
            </div>
        </div>
    </main>


   <!------sceript--------->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        var settingWindow = document.getElementById("setting");
        var optionsBtn = document.getElementById("options_btn");
        var closeWindow = document.getElementById("close_setting");

        optionsBtn.addEventListener("click", (e)=>{
            e.preventDefault();
            settingWindow.style.display ="block";
        })

        closeWindow.addEventListener("click", (e)=> {
            e.preventDefault();
            settingWindow.style.display ="none";
        })

        Window.addEventListener("click", (e)=> {
            if(e.target == settingWindow){
            settingWindow.style.display ="none";
            }
        })

    </script>

</body>

</html>