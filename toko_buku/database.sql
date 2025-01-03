-- Membuat database toko_buku jika belum ada
CREATE DATABASE IF NOT EXISTS toko_buku;

-- Menggunakan database toko_buku
USE toko_buku;

-- Membuat tabel buku untuk menyimpan data buku
CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul_buku VARCHAR(255) NOT NULL,
    kategori VARCHAR(255) NOT NULL,
    harga INT NOT NULL,
    gambar VARCHAR(255) NOT NULL
);

-- Membuat tabel pelanggan untuk menyimpan data pelanggan
CREATE TABLE IF NOT EXISTS pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    no_telepon VARCHAR(20),
    alamat TEXT
);

-- Membuat tabel transaksi untuk menyimpan data transaksi pembelian
CREATE TABLE IF NOT EXISTS transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT NOT NULL,
    id_buku INT NOT NULL,
    tanggal_beli DATE NOT NULL,
    jumlah INT NOT NULL, -- Jumlah buku yang dibeli
    total_harga INT NOT NULL,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id),
    FOREIGN KEY (id_buku) REFERENCES buku(id)
);

-- Membuat tabel kontak untuk menyimpan data pesan yang dikirim oleh pelanggan
CREATE TABLE IF NOT EXISTS kontak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    no_telepon VARCHAR(20),
    pesan TEXT NOT NULL
);

-- Menambahkan data ke tabel buku
INSERT INTO buku (judul_buku, kategori, harga, gambar) VALUES
('Belajar Pemrograman PHP', 'Teknologi', 150000, 'Assets/belajar_php.jpg'),
('Pemrograman JavaScript untuk Pemula', 'Teknologi', 120000, 'Assets/js_pemula.jpg'),
('Novel Cinta di Musim Hujan', 'Fiksi', 90000, 'Assets/cinta_musim_hujan.jpg'),
('Pendidikan Karakter untuk Anak', 'Pendidikan', 100000, 'Assets/pendidikan_karakter.jpg');

-- Menambahkan data ke tabel pelanggan (contoh data pelanggan)
INSERT INTO pelanggan (nama_pelanggan, email, no_telepon, alamat) VALUES
('John Doe', 'johndoe@example.com', '081234567890', 'Jl. Merdeka No. 123, Jakarta'),
('Jane Smith', 'janesmith@example.com', '082345678901', 'Jl. Kebon Raya No. 456, Bandung');

-- Menambahkan data ke tabel transaksi (contoh transaksi)
INSERT INTO transaksi (id_pelanggan, id_buku, tanggal_beli, jumlah, total_harga) VALUES
(1, 1, '2024-12-01', 2, 300000),  -- John Doe membeli 2 buku 'Belajar Pemrograman PHP'
(2, 3, '2024-12-05', 1, 90000);  -- Jane Smith membeli 1 buku 'Novel Cinta di Musim Hujan'

-- Menambahkan data ke tabel kontak (contoh pesan)
INSERT INTO kontak (nama_pelanggan, email, no_telepon, pesan) VALUES
('Alice Green', 'alicegreen@example.com', '083456789012', 'Apakah buku Belajar Pemrograman PHP tersedia?'),
('Bob White', 'bobwhite@example.com', '084567890123', 'Boleh saya pesan buku Novel Cinta di Musim Hujan?');

-- Menambahkan kolom nama_buku ke tabel transaksi
ALTER TABLE transaksi ADD COLUMN nama_buku VARCHAR(255) NOT NULL;

-- Mengupdate kolom nama_buku dengan data dari tabel buku berdasarkan id_buku
UPDATE transaksi t
JOIN buku b ON t.id_buku = b.id
SET t.nama_buku = b.judul_buku;

CREATE TABLE produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_produk VARCHAR(255) NOT NULL,
  kategori VARCHAR(255) NOT NULL,
  harga DECIMAL(10,2) NOT NULL,
  gambar VARCHAR(255) NOT NULL
);
