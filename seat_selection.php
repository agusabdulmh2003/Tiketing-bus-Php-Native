<?php
// includes/config.php harus disertakan untuk koneksi database
require 'includes/config.php';

if (!isset($_GET['bus_id'])) {
    die("Bus tidak ditemukan.");
}
$bus_id = intval($_GET['bus_id']);

// Ambil informasi bus
$query = "SELECT * FROM buses WHERE id = $bus_id";
$result = mysqli_query($conn, $query);
$bus = mysqli_fetch_assoc($result);
if (!$bus) {
    die("Bus tidak ditemukan.");
}

// Ambil kursi yang sudah dipesan
$query = "SELECT seat_number FROM bookings WHERE bus_id = $bus_id";
$result = mysqli_query($conn, $query);
$booked_seats = [];
while ($row = mysqli_fetch_assoc($result)) {
    $booked_seats[] = $row['seat_number'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kursi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .seat { width: 40px; height: 40px; margin: 5px; display: inline-block; text-align: center; line-height: 40px; }
        .available { background-color: green; color: white; cursor: pointer; }
        .booked { background-color: red; color: white; cursor: not-allowed; }
        .selected { background-color: blue; color: white; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Pilih Kursi untuk <?php echo htmlspecialchars($bus['company']); ?></h1>
        <div class="grid grid-cols-4 gap-2 justify-center">
            <?php for ($i = 1; $i <= $bus['seats']; $i++): ?>
                <?php $status = in_array($i, $booked_seats) ? 'booked' : 'available'; ?>
                <div class="seat <?php echo $status; ?>" data-seat="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </div>
            <?php endfor; ?>
        </div>
        <form action="checkout.php" method="POST" class="mt-4">
            <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">
            <input type="hidden" id="seat_number" name="seat_number" value="">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Pesan</button>
        </form>
    </div>
    <script>
        document.querySelectorAll('.available').forEach(seat => {
            seat.addEventListener('click', function() {
                document.querySelectorAll('.seat').forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('seat_number').value = this.dataset.seat;
            });
        });
    </script>
</body>
</html>