<?php
include 'check_login.php';
$stdid = $_GET['ref'];

include '../includes/config.php';

$sql = "DELETE FROM posts where id='$stdid'";

if ($conn->query($sql) === TRUE) {
    header("location:posts.php?db1");
} else {
    header("location:posts.php?db0");
}

$conn->close();

?>