<?php
// includes/config.php
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bus_id = $_POST['bus_id'];
    $passenger_name = $_POST['passenger_name'];
    $seat_number = $_POST['seat_number'];

    // Simpan pemesanan ke database
    $query = "INSERT INTO bookings (bus_id, passenger_name, seat_number) VALUES ('$bus_id', '$passenger_name', '$seat_number')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pemesanan berhasil!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, coba lagi!'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Checkout Pemesanan</h1>
        <form action="checkout.php" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <input type="hidden" name="bus_id" value="<?php echo $_GET['bus_id']; ?>">
            <label class="block text-sm font-semibold">Nama Penumpang</label>
            <input type="text" name="passenger_name" class="w-full p-2 border rounded mb-4" required>
            <label class="block text-sm font-semibold">Nomor Kursi</label>
            <input type="number" name="seat_number" class="w-full p-2 border rounded mb-4" required>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>
