<?php
// admin/dashboard.php
include '../includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Ambil data pemesanan
$bookings_query = "SELECT b.company, bk.passenger_name, bk.seat_number, bk.booking_date 
                   FROM bookings bk JOIN buses b ON bk.bus_id = b.id ORDER BY bk.booking_date DESC";
$bookings_result = mysqli_query($conn, $bookings_query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="p-2">Nama Bus</th>
                    <th class="p-2">Penumpang</th>
                    <th class="p-2">Kursi</th>
                    <th class="p-2">Tanggal Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($bookings_result)): ?>
                    <tr class="border-b">
                        <td class="p-2 text-center"><?php echo $row['company']; ?></td>
                        <td class="p-2 text-center"><?php echo $row['passenger_name']; ?></td>
                        <td class="p-2 text-center"><?php echo $row['seat_number']; ?></td>
                        <td class="p-2 text-center"><?php echo $row['booking_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="logout.php" class="mt-4 block text-center text-red-500">Logout</a>
    </div>
</body>
</html>
