<?php

$host = 'localhost'; $username = 'root'; $password = 'kwabena13';

$database = 'aemwia';

$connect = mysql_connect($host, $username, $password);

$db = mysql_select_db($database);

if(isset($_POST['e-mail'])){

	$email = $_POST['e-mail'];

	mysql_query("INSERT into newsletter (email) values(',$email')");

	echo "<p>Thank you for Joining Our Cause</p>";
	echo "<a href='index.php'>Home</a>";
	// header('Location: index.php');
	// 	exit;

}


?>