<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Access session variables
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p>Your user ID is: <?php echo $user_id; ?></p>
    <a href="logout.php">Logout</a>

</body>
</html>