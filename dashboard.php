<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit;
}
echo "Welcome, " . $_SESSION['username'];

