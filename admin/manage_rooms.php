<?php
session_start();
include '../includes/db.php';
include '../includes/functions.php';

if (!isAdmin()) {
    redirect('/login.php');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_room'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];

        // Upload image
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/room_images/$image");

        $stmt = $conn->prepare("INSERT INTO rooms (name, location, price, description, image) VALUES (:name, :location, :price, :description, :image)");
        $stmt->execute([
            'name' => $name,
            'location' => $location,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ]);
        $success = "Room added successfully!";
    } elseif (isset($_POST['delete_room'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM rooms WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $success = "Room deleted successfully!";
    }
}

// Fetch rooms
$stmt = $conn->query("SELECT * FROM rooms");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Manage Rooms</h1>

<?php if (isset($success)) echo "<p>$success</p>"; ?>

<h2>Add Room</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Room Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="number" name="price" placeholder="Price" required>
    <textarea name="description" placeholder="Description"></textarea>
    <input type="file" name="image" required>
    <button type="submit" name="add_room">Add Room</button>
</form>

<h2>Existing Rooms</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?php foreach ($rooms as $room): ?>
    <tr>
        <td><?= $room['name'] ?></td>
        <td><?= $room['location'] ?></td>
        <td><?= $room['price'] ?></td>
        <td><?= $room['description'] ?></td>
        <td>
            <form method="POST" style="display:inline-block">
                <input type="hidden" name="id" value="<?= $room['id'] ?>">
                <button type="submit" name="delete_room">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
