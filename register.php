<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>


<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'user_system');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Insert user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
