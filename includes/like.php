<?php
$id = $_POST['id'];
$db = new Database;
$conn = $db->connect();
$conn->query("UPDATE post SET like_count = like_count + 1 WHERE id = $id");
$conn->close();

$like_count = $this->getLikeCount($id);
echo $like_count;
?>