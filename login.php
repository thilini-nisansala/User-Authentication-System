<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script>
function showPopup(message) {
    var popup = document.getElementById("popupMessage");
    popup.innerText = message;
    popup.classList.add("show");

    // Remove the popup after 3 seconds
    setTimeout(function() {
        popup.classList.remove("show");
    }, 3000);
}
</script>


</head>
<body>
    <form action="login.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>

    <div id="popupMessage" class="popup"></div>


    <nav>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
</nav>

</body>
</html>


<?php

session_start();
$conn = new mysqli('localhost', 'root', '', 'user_system');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo "<script>showPopup('Login successful!');</script>";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}



session_start();
$_SESSION['username'] = $username;  // Store the username in the session
header("Location: dashboard.php");  // Redirect to a dashboard page

?>
