<?php 
include "koneksi.php";

if(isset($_POST['simpan'])) {
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status_stok = $_POST['status_stok'];
    $kategori = $_POST['kategori'];

    $sql = "INSERT INTO produk (kode_produk, nama_produk, harga, deskripsi, status_stok, kategori_produk) 
            VALUES ('$kode_produk', '$nama_produk', '$harga', '$deskripsi', '$status_stok', '$kategori')";
    $simpan = mysqli_query($koneksi, $sql);

    if($simpan) {
        header("Location: index.php?pesan=Data berhasil disimpan");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST" action="">
        <label>Kode Produk:</label>
        <input type="text" name="kode_produk" required><br><br>

        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" required><br><br>

        <label>Harga:</label>
        <input type="number" name="harga" required><br><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea><br><br>

        <label>Status Stok:</label>
        <select name="status_stok" required>
            <option value="Tersedia">Tersedia</option>
            <option value="Habis">Habis</option>
        </select><br><br>

        <label>Kategori:</label>
        <select name="kategori" required>
            <option value="Seragam">Seragam</option>
            <option value="Atribut">Atribut</option>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
            <option value="Alat_Tulis">Alat_Tulis</option>
            <option value="Jasa_Cetak">Jasa_Cetak</option>
        </select><br><br>

        <input type="submit" name="simpan" value="Simpan">
    </form>
</body>
</html>