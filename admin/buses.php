<?php
// buses.php
include '../includes/config.php';
include '../includes/functions.php';

// Ambil daftar bus dari database
$query = "SELECT * FROM buses";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Daftar Bus</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-300">
                    <th class="border px-4 py-2">Nama Perusahaan</th>
                    <th class="border px-4 py-2">Kelas</th>
                    <th class="border px-4 py-2">Fasilitas</th>
                    <th class="border px-4 py-2">Jumlah Kursi</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($bus = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $bus['company']; ?></td>
                        <td class="border px-4 py-2"><?php echo ucfirst($bus['class']); ?></td>
                        <td class="border px-4 py-2"><?php echo $bus['facilities']; ?></td>
                        <td class="border px-4 py-2"><?php echo $bus['seats']; ?></td>
                        <td class="border px-4 py-2">Rp <?php echo number_format($bus['price'], 2, ',', '.'); ?></td>
                        <td class="border px-4 py-2">
                            <a href="seat_selection.php?bus_id=<?php echo $bus['id']; ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Pesan</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
