<?php
include '../includes/db.php';

$stmt = $conn->query("SELECT * FROM rooms");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rooms as $room) {
    echo "<h2>{$room['name']}</h2>";
    echo "<p>{$room['location']}</p>";
    echo "<p>{$room['price']}</p>";
    echo "<p>{$room['description']}</p>";
    echo "<img src='../uploads/room_images/{$room['image']}' alt='Room image'>";
    echo "<a href='view_rooms.php?id={$room['id']}'>View Details</a>";
}
?>
