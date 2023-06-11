<?php
require_once '../control/connection.php'; 
$db = new Database;
$conn = $db->connect();

$user_id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT * FROM post WHERE user_id = ? ORDER BY id DESC");
$stmt->bind_param("i", $user_id);

if($stmt->execute()){
    $posts = $stmt->get_result();

}else{
    $posts = [];
}



?>