<?php
include 'includes/config.php'; // Sesuaikan dengan lokasi config.php

$username = "admin";
$password = "admin123"; // Gantilah dengan password yang lebih kuat
$hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hash password

// Periksa apakah user sudah ada
$query_check = "SELECT * FROM users WHERE username = '$username'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) == 0) {
    // Jika belum ada, tambahkan user
    $query_insert = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'admin')";
    
    if (mysqli_query($conn, $query_insert)) {
        echo "User admin berhasil ditambahkan. Silakan login dengan:<br>";
        echo "Username: <b>$username</b><br>";
        echo "Password: <b>$password</b>";
    } else {
        echo "Gagal menambahkan user admin: " . mysqli_error($conn);
    }
} else {
    echo "User admin sudah ada!";
}

mysqli_close($conn);
?>
