<?php
session_start();
include '../includes/db.php';
include '../includes/functions.php';

if (!isAdmin()) {
    redirect('/login.php');
}

// Fetch bookings
$stmt = $conn->query("SELECT bookings.id, users.name AS user_name, rooms.name AS room_name, booking_date 
    FROM bookings
    JOIN users ON bookings.user_id = users.id
    JOIN rooms ON bookings.room_id = rooms.id");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Reports</title>
</head>
<body>
    <h1>Booking Reports</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Room</th>
            <th>Date</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?= $booking['id'] ?></td>
            <td><?= $booking['user_name'] ?></td>
            <td><?= $booking['room_name'] ?></td>
            <td><?= $booking['booking_date'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
