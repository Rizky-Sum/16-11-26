-- =====================================================
-- MIGRASI: untuk database "koperasi" yang SUDAH ADA
-- (tabel produk masih memakai kolom kategori_produk)
-- Jalankan sekali saja lewat phpMyAdmin tab SQL.
-- Kalau mau mulai dari nol, cukup import schema.sql.
-- =====================================================

-- 1. Buat tabel kategori

-- 2. Pindahkan kategori yang sudah dipakai produk ke tabel kategori

-- 3. Tambah kolom kategori_id di produk

-- 4. Isi kategori_id sesuai nama kategori lam

-- 5. Cek dulu: query ini harus menghasilkan 0 baris
--    SELECT * FROM produk WHERE kategori_id IS NULL;

-- 6. Kunci relasi, lalu buang kolom lama


-- yang saya pakai di mysql infinite free
USE if0_43372565_koperasi;

CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL UNIQUE,
    gambar VARCHAR(100) DEFAULT NULL
);

INSERT IGNORE INTO kategori (nama_kategori)
SELECT DISTINCT kategori_produk FROM produk WHERE kategori_produk <> '';

ALTER TABLE produk ADD COLUMN kategori_id INT NULL AFTER status_stok;

UPDATE produk p
JOIN kategori k ON k.nama_kategori = p.kategori_produk
SET p.kategori_id = k.id;

ALTER TABLE produk MODIFY kategori_id INT NOT NULL;
ALTER TABLE produk
    ADD CONSTRAINT fk_produk_kategori
    FOREIGN KEY (kategori_id) REFERENCES kategori(id)
    ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE produk DROP COLUMN kategori_produk;

-- 7. Tambah tabel login dan akun admin awal
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password)
VALUES ('admin', '$2y$10$BLEl38GolhqHYwL1.OgVl.pcGEJTaz2ULPgvMqwv/9BAdVlRPNpOC')
ON DUPLICATE KEY UPDATE username = VALUES(username);