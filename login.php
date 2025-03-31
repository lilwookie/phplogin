<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION['user_id'] = $row['id']; // Store user ID in session
            $_SESSION['username'] = $row['username']; //store username in session.
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            echo "<div style='text-align:center;'>Incorrect password.</div>";
        }
    } else {
        echo "<div style='text-align:center;'>User not found.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="center-container">
    <div class="form-container">
        <h2>Login</h2>

        <form method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
</div>

</body>
</html>