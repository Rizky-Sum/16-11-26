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
        <label for="kode_produk">Kode Produk:</label>
        <input type="text" name="kode_produk" id="kode_produk" required><br><br>

        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama_produk" id="nama_produk" required><br><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" required><br><br>

        <label for="deskrepsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskrepsi" required></textarea><br><br>

        <label for="status_stok">Status Stok:</label>
        <input type="radio" name="status_stok" id="status_stok" value="Tersedia" > Tersedia
        <input type="radio" name="status_stok" id="status_stok" value="Habis" > Habis<br><br>

        <label for="kategori">Kategori:</label>
        <select name="kategori" id="kategori" required>
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