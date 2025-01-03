<?php
// Koneksi ke database
include 'db.php'; // Pastikan file db.php berisi koneksi database

// Set header agar responsnya dalam format JSON
header('Content-Type: application/json');

// Menangani metode request
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // GET - Menampilkan semua produk atau produk berdasarkan ID
        if (isset($_GET['id'])) {
            // Get produk berdasarkan ID
            $id = $_GET['id'];
            $sql = "SELECT * FROM produk WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            // Get semua produk
            $sql = "SELECT * FROM produk";
            $stmt = $pdo->prepare($sql);
        }
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
        break;

    case 'POST':
        // POST - Menambahkan produk baru
        $input = json_decode(file_get_contents('php://input'), true);
        $nama_produk = $input['nama_produk'] ?? '';
        $kategori = $input['kategori'] ?? '';
        $harga = $input['harga'] ?? 0;
        $gambar = $input['gambar'] ?? '';

        if (!$nama_produk || !$kategori || !$harga || !$gambar) {
            echo json_encode(["message" => "Data tidak valid"]);
            exit();
        }

        $sql = "INSERT INTO produk (nama_produk, kategori, harga, gambar) VALUES (:nama_produk, :kategori, :harga, :gambar)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nama_produk', $nama_produk);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':gambar', $gambar);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Produk berhasil ditambahkan"]);
        } else {
            echo json_encode(["message" => "Gagal menambahkan produk"]);
        }
        break;

    case 'PUT':
        // PUT - Mengupdate produk berdasarkan ID
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? '';
        $nama_produk = $input['nama_produk'] ?? '';
        $kategori = $input['kategori'] ?? '';
        $harga = $input['harga'] ?? 0;
        $gambar = $input['gambar'] ?? '';

        if (!$id || !$nama_produk || !$kategori || !$harga || !$gambar) {
            echo json_encode(["message" => "Data tidak valid"]);
            exit();
        }

        $sql = "UPDATE produk SET nama_produk = :nama_produk, kategori = :kategori, harga = :harga, gambar = :gambar WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nama_produk', $nama_produk);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':gambar', $gambar);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Produk berhasil diperbarui"]);
        } else {
            echo json_encode(["message" => "Gagal memperbarui produk"]);
        }
        break;

    case 'DELETE':
        // DELETE - Menghapus produk berdasarkan ID
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? '';

        if (!$id) {
            echo json_encode(["message" => "ID produk tidak ditemukan"]);
            exit();
        }

        $sql = "DELETE FROM produk WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Produk berhasil dihapus"]);
        } else {
            echo json_encode(["message" => "Gagal menghapus produk"]);
        }
        break;

    default:
        // Method tidak valid
        echo json_encode(["message" => "Method tidak valid"]);
        break;
}
?>
