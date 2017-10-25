<?php

include '../includes/config.php';
$sql = "SELECT * FROM user_info  where role='member'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 $registered_student=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
    
    }
} else {
$registered_student = 0;
}
$conn->close();
?>