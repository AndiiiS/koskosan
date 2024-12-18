<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
echo "Selamat datang, " . $_SESSION['username'];


if (!isAdmin()) {
    redirect('/login.php');
}

echo "Welcome, Admin!";
?>
<a href="manage_users.php">Manage Users</a>
<a href="manage_rooms.php">Manage Rooms</a>
