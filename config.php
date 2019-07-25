<?php
header("Access-Control-Allow-Origin: *");

session_start();

$servername = "localhost";
$username = "root";
$password = "12345678";

// Create connection
$conn =  mysqli_connect($servername, $username, $password,"minimall");
	date_default_timezone_set("Asia/Baghdad");
		mysqli_query($conn,"SET timezone ='+03:00'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>