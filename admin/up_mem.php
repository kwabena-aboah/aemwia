<?php
$stdid = $_GET['ref'];

include 'check_login.php';
$fname = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$gender = $_POST['gender'];

include '../includes/config.php';
$sql = "SELECT * FROM user_info where email='$email' and user_id != '$stdid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['full_name'];
       header("location:update_user_info.php?ref=$stdid&msg=Email $email is used by $fullname22");
    }
} else {
    include '../includes/config.php';
$sql = "UPDATE user_info SET full_name='$fname', gender='$gender', email='$email', address='$address' WHERE user_id='$stdid'";

if ($conn->query($sql) === TRUE) {
   header("location:update_user_info.php?ref=$stdid");
} else {
$error = $conn->error;
     header("location:update_user_info.php?ref=$stdid&error=$error");
}

$conn->close();
}
$conn->close();




?>