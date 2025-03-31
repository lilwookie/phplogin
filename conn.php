<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$username = "victor";
$pass = "Vicky@123";
$db = "test";

// Correct function name: mysqli_connect()
$conn = mysqli_connect($server, $username, $pass, $db);

if (!$conn) {
    die("Failed to connect to " . $db . ": " . mysqli_connect_error());
}

// echo "Connected successfully";
?>