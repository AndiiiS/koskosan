<?php
session_start();
include '../includes/db.php';
include '../includes/functions.php';

if (!isLoggedIn()) {
    redirect('/login.php');
}

echo "Welcome, " . $_SESSION['user']['name'];
?>
<a href="book_room.php">Book a Room</a>
<a href="my_bookings.php">My Bookings</a>
