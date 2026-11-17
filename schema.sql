-- =====================================
-- DATABASE MANAJEMEN KOPERASI SEKOLAH
-- =====================================

CREATE DATABASE IF NOT EXISTS koperasi;

USE koperasi;

-- =====================================
-- MEMBUAT TABEL PRODUK
-- =====================================

CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_produk VARCHAR(20) NOT NULL,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    deskripsi TEXT,
    status_stok ENUM('Tersedia', 'Habis') NOT NULL,
    kategori_produk VARCHAR(30) NOT NULL
);

-- =====================================
-- INSERT DATA PRODUK
-- =====================================

INSERT INTO produk
(kode_produk, nama_produk, harga, deskripsi, status_stok, kategori_produk)
VALUES
('0089-ATK', 'Buku Tulis', 5000, 'Buku tulis 38 lembar', 'Tersedia', 'Alat Tulis'),

('0090-ATK', 'Pensil 2B', 3000, 'Pensil untuk menulis dan menggambar', 'Tersedia', 'Alat Tulis'),

('0091-ATK', 'Pulpen Hitam', 4000, 'Pulpen tinta hitam', 'Tersedia', 'Alat Tulis'),

('0092-MKN', 'Roti Coklat', 5000, 'Roti isi coklat', 'Tersedia', 'Makanan'),

('0093-MNM', 'Air Mineral', 3000, 'Air mineral kemasan', 'Tersedia', 'Minuman'),

('0094-MNM', 'Teh Botol', 5000, 'Minuman teh kemasan', 'Habis', 'Minuman'),

('0095-SRG', 'Dasi Sekolah', 12000, 'Dasi seragam sekolah', 'Tersedia', 'Seragam & Atribut'),

('0096-SRG', 'Topi Sekolah', 15000, 'Topi identitas sekolah', 'Tersedia', 'Seragam & Atribut'),

('0097-JCT', 'Cetak Hitam Putih', 500, 'Jasa cetak dokumen hitam putih', 'Tersedia', 'Jasa Cetak'),

('0098-JCT', 'Cetak Warna', 1500, 'Jasa cetak dokumen berwarna', 'Habis', 'Jasa Cetak');