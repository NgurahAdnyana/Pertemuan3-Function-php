
<?php
// Periksa apakah tombol Hitung sudah ditekan
if (isset($_POST['hitung'])) {

    // Ambil berat badan dalam kilogram dan tinggi dalam cm
    $berat = (float) $_POST['berat'];
    $tinggi = (float) $_POST['tinggi'];

    // Pastikan nilai berat dan tinggi valid
    if ($berat <= 0 || $tinggi <= 0) {
        $error = "Berat dan tinggi harus lebih dari nol!";
    } else {

        // Ubah tinggi dari cm menjadi meter
        $tinggiMeter = $tinggi / 100;

        // Hitung BMI: berat dibagi tinggi kuadrat
        $bmi = $berat / ($tinggiMeter * $tinggiMeter);

        // Tentukan kategori berdasarkan BMI
        if ($bmi < 18.5) {
            $kategori = "Kurus";
        } elseif ($bmi < 25) {
            $kategori = "Normal";
        } elseif ($bmi < 30) {
            $kategori = "Gemuk";
        } else {
            $kategori = "Obesitas";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator BMI</title>
</head>
<body>

    <h2>Indeks Massa Tubuh (BMI)</h2>

    <!-- Form untuk memasukkan data pengguna -->
    <form method="post">
        <label>Berat badan (kg):</label>
        <input type="number" name="berat" min="0.1"
               step="any" required>
        <br><br>

        <label>Tinggi badan (cm):</label>
        <input type="number" name="tinggi" min="1"
               step="any" required>
        <br><br>

        <button type="submit" name="hitung">Hitung BMI</button>
    </form>

    <?php if (isset($bmi)) { ?>
        <!-- Tabel untuk menampilkan hasil perhitungan -->
        <h3>Hasil Perhitungan</h3>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Berat</th>
                <th>Tinggi</th>
                <th>Nilai BMI</th>
                <th>Kategori</th>
            </tr>
            <tr>
                <td><?= $berat ?> kg</td>
                <td><?= $tinggi ?> cm</td>
                <td><?= number_format($bmi, 2, ',', '.') ?></td>
                <td><?= $kategori ?></td>
            </tr>
        </table>
    <?php } ?>

    <?php
    // Tampilkan pesan jika input tidak valid
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>

</body>
</html>
