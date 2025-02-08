<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['origin']) && isset($_GET['destination']) && isset($_GET['departure_date'])) {
    $origin = $_GET['origin'];
    $destination = $_GET['destination'];
    $departure_date = $_GET['departure_date'];

    $query = "SELECT * FROM buses WHERE id IN (SELECT bus_id FROM routes WHERE origin='$origin' AND destination='$destination')";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-6 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Hasil Pencarian</h2>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="p-4 border rounded-lg mb-4">
                <h3 class="text-lg font-semibold"><?php echo $row['company']; ?></h3>
                <p>Kelas: <?php echo ucfirst($row['class']); ?></p>
                <p>Harga: Rp <?php echo number_format($row['price'], 2, ',', '.'); ?></p>
                <p>Fasilitas: <?php echo $row['facilities']; ?></p>
                <a href="seat_selection.php?bus_id=<?php echo $row['id']; ?>" class="mt-2 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Pilih Kursi</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
<?php } ?>
