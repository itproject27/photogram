<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
include_once "header.php";
?>

    <head>
      
    
      <script type="text/javascript" src="../assets/js/camfilter.js"></script>
      <script type="text/javascript" src="../assets/js/webcam.js"></script>
      <script defer src="../assets/js/project1.js"></script>
</head>
    </head>
    <body>
    <header class="header">
        <div class="profile-container">
      <div class="ma">
      <video id="webcm" autoplay playsinlne width="800" height="600"></video>
   <canvas id="canvas"></canvas>
   
   
    <button  class="btn"  style=" padding:10px;
    background-color:  rgb(0, 162, 255);"> <a download onclick="takePhoto()" >snap</a> </button>
   <button class="btn" style="padding:10px;
    background-color:  rgb(0, 162, 255);"> <a  href="project.php" style=" text-decoration: none; color:#000 ">Add filter</a> </button>
 
      </div>
        </div>
    </header>



    <script>
     const webCamElement=document.getElementById("webcm");
     const canvasElement=document.getElementById("canvas");
     const webcam =new Webcam(webCamElement,"user",canvasElement);
       webcam.start();
       function takePhoto(){
        let picture= webcam.snap();
        document.querySelector("a").href=picture;
       }
      
        
       
      
    </script>

    </body>
    </html>