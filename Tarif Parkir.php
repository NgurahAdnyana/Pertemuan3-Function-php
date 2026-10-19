
<?php
// Cek apakah tombol Hitung Tarif sudah ditekan
if (isset($_POST['hitung'])) {

    // Ambil jenis kendaraan dan lama parkir
    $jenis = $_POST['jenis'];
    $lamaJam = filter_var(
        $_POST['lamaJam'],
        FILTER_VALIDATE_INT
    );

    // Pastikan jenis kendaraan dan durasi valid
    if (!in_array($jenis, ['Motor', 'Mobil']) ||
        $lamaJam === false || $lamaJam < 1) {

        $error = "Data parkir tidak valid!";

    } else {
        // Tentukan tarif berdasarkan jenis kendaraan
        if ($jenis == "Motor") {
            $awal = 2000;     // Tarif 2 jam pertama
            $tambahan = 1000; // Tarif tiap jam berikutnya
        } else {
            $awal = 5000;     // Tarif 2 jam pertama
            $tambahan = 3000; // Tarif tiap jam berikutnya
        }

        // Hitung biaya setelah 2 jam pertama
        $jamTambahan = max(0, $lamaJam - 2);

        // Hitung total tarif parkir
        $total = $awal + ($jamTambahan * $tambahan);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <!-- Membuat tampilan menyesuaikan ukuran layar -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <!-- Memuat Tailwind CSS untuk desain kartu -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Tarif Parkir</title>
</head>

<body class="bg-gray-100 p-8">

<!-- Kartu putih untuk membungkus form dan hasil -->
<div class="max-w-sm mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4">Tarif Parkir</h2>

    <!-- Form untuk memilih kendaraan dan durasi parkir -->
    <form method="post">

        <label>Jenis kendaraan:</label>

        <!-- Select menyediakan pilihan kendaraan -->
        <select name="jenis" class="border p-2 w-full mb-3">
            <option value="Motor">Motor</option>
            <option value="Mobil">Mobil</option>
        </select>

        <label>Lama parkir (jam):</label>

        <input type="number" name="lamaJam" min="1"
               step="1" class="border p-2 w-full mb-3"
               required>

        <button type="submit" name="hitung"
                class="bg-blue-600 text-white p-2 rounded w-full">
            Hitung Tarif
        </button>
    </form>

    <?php
    // Tampilkan rincian jika perhitungan berhasil
    if (isset($total)) {
    ?>
        <div class="mt-4">
            <p>Kendaraan:
                <?= htmlspecialchars($jenis) ?>
            </p>

            <p>Lama parkir: <?= $lamaJam ?> jam</p>

            <!-- Tampilkan total dengan format Rupiah -->
            <p class="text-2xl font-bold text-blue-600">
                Rp <?= number_format($total, 0, ',', '.') ?>
            </p>
        </div>
    <?php
    }

    // Tampilkan pesan jika input tidak valid
    if (isset($error)) {
        echo htmlspecialchars($error);
    }
    ?>
</div>

</body>
</html>
