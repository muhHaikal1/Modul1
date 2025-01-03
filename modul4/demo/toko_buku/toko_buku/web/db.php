<?php
$host = 'localhost'; // Host database
$dbname = 'toko_buku'; // Nama database
$username = 'root'; // Username database
$password = ''; // Password database

try {
    // Membuat koneksi menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menangkap kesalahan koneksi
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
