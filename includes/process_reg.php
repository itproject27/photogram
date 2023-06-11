<?php
session_start();
require_once '../control/connection.php'; 
$db = new Database;
$conn = $db->connect();

if(isset($_POST['signup_btn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  
  
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username = mysqli_query($conn, $check_username_query);
    if(mysqli_num_rows($check_username) > 0) {
      echo "User already exists";
      exit();
    }
  
  
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $check_email = mysqli_query($conn, $check_email_query);
    if(mysqli_num_rows($check_email) > 0) {
      echo "email already exists";
      exit();
    }
  
    
    $add_user_query = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$password')";
    $add_user = mysqli_query($conn, $add_user_query);
    if($add_user) {
      echo "acount register succssfull";
      header("Location: ../pages/login.php");
    } else {
      echo "error occured";
    }
  }
?>