<?php
session_start();
include 'db.php';
include '../includes/functions.php';

if (!isLoggedIn()) {
    redirect('/login.php');
}

// Fetch available rooms
$stmt = $conn->query("SELECT * FROM rooms");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_id = $_POST['room_id'];
    $user_id = $_SESSION['user']['id'];
    $booking_date = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, room_id, booking_date) VALUES (:user_id, :room_id, :booking_date)");
    $stmt->execute([
        'user_id' => $user_id,
        'room_id' => $room_id,
        'booking_date' => $booking_date
    ]);

    $success = "Room booked successfully!";
}
?>
<h1>Book a Room</h1>
<?php if (isset($success)) echo "<p>$success</p>"; ?>

<form method="POST">
    <select name="room_id" required>
        <?php foreach ($rooms as $room): ?>
        <option value="<?= $room['id'] ?>"><?= $room['name'] ?> - <?= $room['location'] ?> - <?= $room['price'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Book Room</button>
</form>
