<?php
// functions.php
session_start();

function adminOnly() {
    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
        exit();
    }
}

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 2, ',', '.');
}
?>
