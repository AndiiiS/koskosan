<?php
error_reporting(E_ALL); // Menampilkan semua jenis error
ini_set('display_errors', 1); // Menampilkan error ke layar

$host = 'localhost';
$dbname = 'koskosan';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
