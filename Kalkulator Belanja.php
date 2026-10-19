
<?php
// Menentukan data barang
$namaBarang = "Buku";
$harga = 18000;
$jumlah = 3;

// Menghitung total harga menggunakan operator * bisa disebut kali (x)
$total = $harga * $jumlah;
?>
<!-- pembuatan tabel -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Belanja</title>
</head>
<body>

    <h2>Kalkulator Belanja</h2>

    <!-- Tabel untuk menampilkan rincian belanja -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>

        <tr>
            <td><?= $namaBarang ?></td>
            <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
            <td><?= $jumlah ?></td>
            <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>

</body>
</html>
