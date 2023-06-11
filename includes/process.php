<?php

session_start();
include_once "../control/connection.php";
$db = new Database;
$error="";
if(isset($_POST['sub'])){
  
    $email=$_POST['email'];
   $password=$_POST['password'];

    $query="SELECT * FROM users where email like  '$email' AND pass like '$password' ";
    $result=  mysqli_query($db->connect(),$query);
    if($result){
        if(mysqli_num_rows($result)>0){
          while($row=  mysqli_fetch_assoc($result)){
            $_SESSION['id']=$row['id'];
           
          }
          if($email=='admin'&&$password=='admin'){
                header("location:search.php");
            }
            else{
            header("location:index.php");
            }
            
        }
        else{
        $error.="Invalid email or password";
    }
    }
}
