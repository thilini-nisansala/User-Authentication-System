<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
    <form action="register.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
    </form>

    <div id="popupMessage" class="popup"></div>


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
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Insert user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>showPopup('Registration successful!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
