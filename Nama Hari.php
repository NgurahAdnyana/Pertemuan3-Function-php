
<?php
// Cek apakah tombol Tampilkan sudah ditekan
if (isset($_POST['cek'])) {

    // Ambil nomor hari dan periksa apakah berupa bilangan bulat
    $nomorHari = filter_var(
        $_POST['nomorHari'],
        FILTER_VALIDATE_INT
    );

    // Periksa apakah nomor berada dalam rentang 1 sampai 7
    if ($nomorHari === false ||
        $nomorHari < 1 || $nomorHari > 7) {

        $hari = "Nomor hari tidak valid";

    } else {
        // Cocokkan nomor dengan nama hari menggunakan match
        $hari = match ($nomorHari) {
            1 => "Senin",
            2 => "Selasa",
            3 => "Rabu",
            4 => "Kamis",
            5 => "Jumat",
            6 => "Sabtu",
            7 => "Minggu"
        };
    }
}
?>

<!-- Form untuk memasukkan nomor hari -->
<form method="post">
    Nomor hari:
    <input type="number" name="nomorHari" step="1" required>

    <button type="submit" name="cek">Tampilkan</button>
</form>

<?php
// Tampilkan nama hari atau pesan kesalahan
if (isset($hari)) {
    echo $hari;
}
?>
