
<?php
// Cek apakah tombol Cek sudah ditekan
if (isset($_POST['cek'])) {

    // Ambil angka yang dimasukkan pengguna
    $angka = $_POST['angka'];

    // Pastikan input merupakan bilangan bulat yang valid
    if (filter_var($angka, FILTER_VALIDATE_INT) !== false) {

        // % menghitung sisa pembagian; ternary memilih hasilnya
        $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";

    } else {
        // Jalankan jika input bukan bilangan bulat
        $hasil = "Masukkan bilangan bulat yang valid!";
    }
}
?>

<!-- Form untuk memasukkan angka -->
<form method="post">
    Masukkan angka:
    <input type="number" name="angka" step="1" required>

    <!-- Kirim angka untuk diperiksa PHP -->
    <button type="submit" name="cek">Cek</button>
</form>

<?php
// Tampilkan hasil setelah tombol ditekan
if (isset($hasil)) {
    echo $hasil;
}
?>
