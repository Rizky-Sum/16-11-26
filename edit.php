<?php 
include "koneksi.php";

$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id");
$data = mysqli_fetch_assoc($ambil);

if (isset($_POST['update'])) {
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status_stok = $_POST['status_stok'];
    $kategori = $_POST['kategori'];

    $sql = "UPDATE produk SET 
            kode_produk='$kode_produk', 
            nama_produk='$nama_produk', 
            harga='$harga', 
            deskripsi='$deskripsi', 
            status_stok='$status_stok', 
            kategori_produk='$kategori' 
            WHERE id=$id";
    $sudah = mysqli_query($koneksi, $sql);

    if ($sudah) {
        header("Location: index.php?pesan=Data berhasil diubah");
        exit();
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk </h2>
    <form method="POST" action="">
        <label for="kode_produk">Kode Produk:</label><br>
        <input type="text" name="kode_produk" id="kode_produk" value="<?php echo $data['kode_produk']; ?>"><br><br>

        <label for="nama_produk">Nama Produk:</label><br>
        <input type="text" name="nama_produk" id="nama_produk" value="<?php echo $data['nama_produk']; ?>"><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" name="harga" id="harga" value="<?php echo $data['harga']; ?>"><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi" id="deskripsi" ><?php echo $data['deskripsi']; ?></textarea><br><br>

        <label for="status_stok">Status Stok:</label><br>
        <input type="radio" name="status_stok" value="Tersedia" id="status_stok" <?php if ($data['status_stok'] == 'Tersedia') echo 'checked' ?>> Tersedia
        <input type="radio" name="status_stok" value="Habis" id="status_stok" <?php if ($data['status_stok'] == 'Habis') echo 'checked' ?>> Habis<br><br>

        <label for="kategori">Kategori:</label><br>
        <select name="kategori" id="kategori">
            <option value="Seragam" <?php if ($data['kategori_produk'] == 'Seragam') echo 'selected'; ?>>Seragam</option>
            <option value="Atribut" <?php if ($data['kategori_produk'] == 'Atribut') echo 'selected'; ?>>Atribut</option>
            <option value="Makanan" <?php if ($data['kategori_produk'] == 'Makanan') echo 'selected'; ?>>Makanan</option>
            <option value="Minuman" <?php if ($data['kategori_produk'] == 'Minuman') echo 'selected'; ?>>Minuman</option>
            <option value="Alat_Tulis" <?php if ($data['kategori_produk'] == 'Alat_Tulis') echo 'selected'; ?>>Alat_Tulis</option>
            <option value="Jasa_Cetak" <?php if ($data['kategori_produk'] == 'Jasa_Cetak') echo 'selected'; ?>>Jasa_Cetak</option>
        </select><br><br>

        <button type="submit" name="update" value="Update">Update</button>
        <a href="index.php">Batal</a>
    </form>
    
</body>
</html>