
<?php
// Cek apakah tombol Hitung Diskon sudah ditekan
if (isset($_POST['hitung'])) {

    // Ambil total belanja dari form
    $total = (float) $_POST['total'];

    // Periksa apakah total belanja tidak negatif
    if ($total < 0) {
        $error = "Total belanja tidak boleh negatif!";

    } else {
        // Tentukan persentase diskon berdasarkan total belanja
        if ($total >= 500000) {
            $diskon = 0.15; // Diskon 15%
        } 
        elseif ($total >= 200000) {
            $diskon = 0.10; // Diskon 10%
        } 
        elseif ($total >=50000){
            $diskon = 0.05; // Diskon 5%
        }
        else {
            $diskon = 0; // Tidak mendapat diskon
        }

        // Hitung nominal potongan harga
        $potongan = $total * $diskon;

        // Kurangi total awal dengan potongan harga
        $bayar = $total - $potongan;
    }
}
?>

<!-- Form untuk memasukkan total belanja -->
<form method="post">
    Total belanja:
    <input type="number" name="total" min="0" required>

    <button type="submit" name="hitung">Hitung Diskon</button>
</form>

<?php
// Tampilkan rincian jika perhitungan berhasil
if (isset($bayar)) {
    echo "Total awal: Rp " .
        number_format($total, 0, ',', '.') . "<br>";

    echo "Potongan: Rp " .
        number_format($potongan, 0, ',', '.') . "<br>";

    echo "Total bayar: Rp " .
        number_format($bayar, 0, ',', '.');
}

// Tampilkan pesan kesalahan jika ada
if (isset($error)) {
    echo $error;
}
?>
