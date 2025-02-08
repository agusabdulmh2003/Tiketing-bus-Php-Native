<?php
// includes/config.php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user database
$pass = ""; // Kosongkan jika tidak ada password
$db = "bus_ticketing"; // Nama database

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Buat tabel database jika belum ada
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin') DEFAULT 'admin'
);";
mysqli_query($conn, $query);

$query = "CREATE TABLE IF NOT EXISTS buses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    company VARCHAR(100),
    class ENUM('economy','business','executive'),
    facilities TEXT,
    seats INT,
    price DECIMAL(10,2)
);";
mysqli_query($conn, $query);

$query = "CREATE TABLE IF NOT EXISTS bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bus_id INT,
    passenger_name VARCHAR(100),
    seat_number INT,
    booking_date DATETIME DEFAULT CURRENT_TIMESTAMP
);";
mysqli_query($conn, $query);
?>
