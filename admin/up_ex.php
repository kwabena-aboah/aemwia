<?php
$id = $_GET['ref'];
$postpage = $_GET['page'];

$post = $_POST['post'];
$commentNo = $_POST['comment_number'];


include '../includes/config.php';

$sql = "UPDATE posts SET title='$post', num_comments='$commentNo' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
header("location:posts.php?page=$postpage");
} else {
header("location:posts.php?page=$postpage");
}

$conn->close();

?>