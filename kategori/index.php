<?php
include "../koneksi.php";
include "../auth.php";
require_login();

$result = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

    <h2>Kategori Produk</h2>

    <nav class="A">
        <span>Login sebagai: <b><?php echo htmlspecialchars($_SESSION['username']); ?></b></span>
        <a href="../logout.php">Logout</a>
    </nav>

    <a href="tambah.php">Tambah Kategori</a> 
    <a href="../index.php">Kembali ke Produk</a>
    <br><br>

    <?php if (isset($_GET['pesan'])) { ?>
        <p><b>Status:</b> <?php echo htmlspecialchars($_GET['pesan']); ?></p>
    <?php } ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                        <?php if ($data['gambar']) { ?>
                            <img src="../uploads/kategori/<?php echo htmlspecialchars($data['gambar']); ?>" width="70" alt="Gambar kategori">
                        <?php } else { ?>
                            Tidak ada gambar
                        <?php } ?>
                    </td>
                    <td><?php echo htmlspecialchars($data['nama_kategori']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                        <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="4" align="center">Belum ada kategori</td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
