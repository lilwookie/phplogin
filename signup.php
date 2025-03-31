<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) 
            VALUES ('$username', '$email', '$password_hash')";

    if (mysqli_query($conn, $sql)) {
        echo "<div style='text-align:center;'>New player added successfully!</div>"; //Center success message
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        
        exit();
    } else {
        echo "<div style='text-align:center;'>Error: " . mysqli_error($conn) . "</div>"; //Center error message
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Player</title>
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Make it take up the full viewport height */
        }

        .form-container {
            width: 300px; /* Adjust as needed */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="center-container">
    <div class="form-container">
        <h2>Create Account</h2>

        <form method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="create account"> 
            <p>Login <span><a href = "login.php">Here</a></span></p>
        </form>
    </div>
</div>

</body>
</html>