<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Cari Tiket Bus</h1>
        <form action="search.php" method="GET" class="bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold">Kota Asal</label>
                    <input type="text" name="origin" class="w-full p-2 border rounded" placeholder="Masukkan kota asal" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Kota Tujuan</label>
                    <input type="text" name="destination" class="w-full p-2 border rounded" placeholder="Masukkan kota tujuan" required>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-semibold">Tanggal Keberangkatan</label>
                    <input type="date" name="departure_date" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Jumlah Penumpang</label>
                    <input type="number" name="passengers" class="w-full p-2 border rounded" min="1" required>
                </div>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Cari Tiket</button>
            </div>
        </form>
    </div>
</body>
</html>
