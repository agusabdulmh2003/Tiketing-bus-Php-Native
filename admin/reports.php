<?php
// reports.php (Laporan Pemesanan)
include '../includes/config.php';
include '../includes/functions.php';
adminOnly();

$query = "SELECT bookings.id, buses.company, bookings.passenger_name, bookings.seat_number, bookings.booking_date
          FROM bookings
          JOIN buses ON bookings.bus_id = buses.id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Laporan Pemesanan Tiket</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-300">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Perusahaan</th>
                    <th class="border px-4 py-2">Nama Penumpang</th>
                    <th class="border px-4 py-2">Nomor Kursi</th>
                    <th class="border px-4 py-2">Tanggal Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $row['id']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['company']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['passenger_name']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['seat_number']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['booking_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
