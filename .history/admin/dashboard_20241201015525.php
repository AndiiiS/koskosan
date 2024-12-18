<?php
session_start();
include '../includes/db.php';
include '../includes/functions.php';

if (!isAdmin()) {
    redirect('/login.php');
}

echo "Welcome, Admin!";
?>
<a href="manage_users.php">Manage Users</a>
<a href="manage_rooms.php">Manage Rooms</a>
