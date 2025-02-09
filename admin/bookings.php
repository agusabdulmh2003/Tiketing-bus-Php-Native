<?php
// bookings.php
include '../includes/config.php';
include '../includes/functions.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin/login.php');
    exit();
}

$query = "SELECT bookings.id, bookings.passenger_name, bookings.seat_number, bookings.booking_date, 
                 buses.company, buses.class, buses.price 
          FROM bookings 
          JOIN buses ON bookings.bus_id = buses.id ORDER BY bookings.booking_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Daftar Booking</h1>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">Nama Penumpang</th>
                    <th class="py-2 px-4 border">Nomor Kursi</th>
                    <th class="py-2 px-4 border">Tanggal Booking</th>
                    <th class="py-2 px-4 border">Bus</th>
                    <th class="py-2 px-4 border">Kelas</th>
                    <th class="py-2 px-4 border">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr class="text-center">
                        <td class="py-2 px-4 border"><?php echo $row['passenger_name']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $row['seat_number']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $row['booking_date']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $row['company']; ?></td>
                        <td class="py-2 px-4 border"><?php echo ucfirst($row['class']); ?></td>
                        <td class="py-2 px-4 border">Rp <?php echo number_format($row['price'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
