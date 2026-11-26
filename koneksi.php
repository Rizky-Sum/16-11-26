<?php
mysqli_report(MYSQLI_REPORT_OFF);

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "koperasi"
);

if (!$koneksi) {
    die("Koneksi database gagal.");
}
?>