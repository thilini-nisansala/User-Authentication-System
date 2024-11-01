<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <form action="login.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>

    <nav>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
</nav>

</body>
</html>


<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'user_system');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
            // You can start a session here and redirect to a dashboard page
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>


session_start();
$_SESSION['username'] = $username;  // Store the username in the session
header("Location: dashboard.php");  // Redirect to a dashboard page

