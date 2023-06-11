<?php

session_start();

require_once '../control/connection.php'; 
$db = new Database;
$conn = $db->connect();

if(isset($_POST['upload_images_btn'])){

    $id = $_POST["id"];
    $username = $_SESSION['username'];
    $profile_image = $_SESSION['image'];
    $caption = $_SESSION['caption'];
    $hashtage =$_SESSION['hashtage'];
    $image = $_SESSION['image']['tmp_name'];
    $likes = 0;
    $date = date("Y.m.d H:i:s");


    $image_name = strval(time()) . ".jpg" ;


    $stmt = $conn->prepare("INSERT INTO post (user_id,likes,image,caption,hashtage,date,username,profile_image) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iissssss",$id,$likes,$image_name,$caption,$hashtage,$date,$username,$profile_image);

    if($stmt->execute()){
        move_uploaded_file($image,"../img" . $image_name);
        $stmt = $conn->prepare("UPDATE users SET post=post+1 WHERE id = ? ");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $_SESSION['post'] = $_SESSION['post'] + 1;
        header("Location: ../html/camera.php?success_messagePost has been created successfully&image_name". $image_name);
        exit();

    }else{
        header("Location: ../html/camera.php?error_messageerror occured,try agian");
        exit();
    }
}else{
    header("Location: ../html/camera.php?error_messageerror occured,try agian");
    
}






?>