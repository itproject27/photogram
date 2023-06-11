<?php

$msg="";
if(isset($_post["upload"])){
    $target= "images/".basename($_FILES['image']['name']);
    $db= mysqli_connect("localhost","root","","photos");

    $image = $_FILES['image']['name'];
    $text= $_post['text'];

    $sql = "INSERT INTO  images(image, text) VALUES ('$image' , '$text')";
    mysqli_query($db, $sql);
    if(move_uploaded_file($_FILES ['image']['tmp_name'],$target)){
       $msg="Post upload";

    }
    else{
        $msg="there was a problem uploading images";
    }
}


?>


<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/x-icon" href="../assets/images/imag.ico"/>
    <style>
        #content {
            width: 50%;
            margin: 20px auto;
            border: 1px solid lightskyblue;
        }

        form {
            width: 50%;
            margin: 20px auto;
        }

        form div {
            margin-top: 5px;
        }

        #imge_div {
            width: 80%;
            padding: 5px;
            margin: 15px auto;
            border: 1px solid lightblue;
        }

        #img_div:after {
            content: "";
            display: block;
            clear: both;
        }

        img {
            float: left;
            margin: 5px;
            width: 300px;
            height: 140px;
        }
    </style>
</head>

<body>
    <div id="content">
        <?php
        $db = mysqli_connect("localhost","root","","photos");
        $sql ="SELECT*FROM images";
        $result =mysqli_query($db , $sql);
        while($row = mysqli_fetch_array($result)){
            echo "< div id ='img_div'>";
            echo " < img src='images" .$row['image']."'>";
            echo "<p>".$row['text']."</p>";
            echo "</div>";
        }
        ?>
        <form method="post" action="post.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Say something about this post...">

                    </textarea>
            </div>
            <div>
                <input type="submit" name="upload" value="Upload Image">

            </div>

        </form>

    </div>
</body>

</html>