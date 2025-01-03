<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Toko Buku Heaven6</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, textarea, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
        .nav-link {
            text-align: center;
            margin-top: 20px;
        }
        .nav-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .nav-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Buku</h1>
        <form action="tambah_buku.php" method="POST">
            <input type="text" name="judul_buku" placeholder="Judul Buku" required>
            <input type="text" name="penulis" placeholder="Penulis" required>
            <input type="text" name="kategori" placeholder="Kategori" required>
            <input type="number" name="harga_buku" placeholder="Harga Buku" min="0" step="0.01" required>
            <textarea name="deskripsi" placeholder="Deskripsi" rows="4" required></textarea>
            <button type="submit">Tambah Buku</button>
        </form>
        <div class="nav-link">
            <a href="index.php">Kembali ke Halaman Utama</a>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'db.php';

        // Mengambil data dari form
        $judul_buku = htmlspecialchars(trim($_POST['judul_buku']));
        $penulis = htmlspecialchars(trim($_POST['penulis']));
        $kategori = htmlspecialchars(trim($_POST['kategori']));
        $harga_buku = filter_var($_POST['harga_buku'], FILTER_VALIDATE_FLOAT);
        $deskripsi = htmlspecialchars(trim($_POST['deskripsi']));

        // Validasi data input
        if ($judul_buku && $penulis && $kategori && $harga_buku && $deskripsi && $harga_buku > 0) {
            try {
                // Siapkan statement SQL untuk mencegah SQL Injection
                $stmt = $pdo->prepare("INSERT INTO buku (judul_buku, penulis, kategori, harga_buku, deskripsi) VALUES (?, ?, ?, ?, ?)");

                // Eksekusi statement dengan data yang diinputkan
                $stmt->execute([$judul_buku, $penulis, $kategori, $harga_buku, $deskripsi]);

                // Tampilkan pesan sukses
                echo "<script>alert('Buku berhasil ditambahkan!'); window.location.href = 'index.php';</script>";
            } catch (PDOException $e) {
                // Tampilkan pesan kesalahan jika query gagal
                echo "<script>alert('Terjadi kesalahan: " . addslashes($e->getMessage()) . "');</script>";
            }
        } else {
            // Tampilkan pesan kesalahan jika input tidak valid
            echo "<script>alert('Harap isi semua data dengan benar!');</script>";
        }
    }
    ?>
</body>
</html>
