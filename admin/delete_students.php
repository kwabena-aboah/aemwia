<?php
include 'check_login.php';

include '../includes/config.php';

$sql = "DELETE FROM user_info WHERE role='member'";

if ($conn->query($sql) === TRUE) {
    header("location:./?db2");
} else {
       header("location:./?db3");
}

$conn->close();

?>