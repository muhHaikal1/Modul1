<?php
// Koneksi ke database
include 'db.php'; // Pastikan file ini ada dan berisi koneksi ke database `penyewaan_jasa`

// Query untuk mengambil data buku
$sql = $query = "SELECT id, judul_buku, kategori, harga, gambar FROM buku";

$stmt = $pdo->query($sql); // Menggunakan PDO untuk query
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Buku</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
      rel="stylesheet"
    />
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="CSS/style.css" />
  </head>

  <body>
    <header>
      <nav class="navbar">
        <a href="#" class="navbar-logo">Toko Buku</a>
        <div class="navbar-nav">
          <a href="#home">Home</a>
          <a href="#about">About Us</a>
          <a href="#services">Books</a>
          <a href="#contact">Contact</a>
        </div>
        <div class="navbar-icons">
          <a href="#" id="search"><i data-feather="search"></i></a>
          <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
          <a href="#" id="hb-menu"><i data-feather="menu"></i></a>
        </div>
      </nav>
    </header>

    <section class="utama" id="home">
      <main class="primary">
        <h1>Solusi Mudah untuk Mendapatkan Buku Favorit Anda</h1>
        <p>
          Toko Buku menyediakan berbagai macam buku <br />
          Dengan kualitas terbaik dan harga terjangkau, kami hadir untuk
          memenuhi kebutuhan membaca Anda.
        </p>
      </main>
    </section>

    <section id="about" class="about">
      <h2>About Us</h2>
      <div class="row">
        <div class="cover-img">
          <img src="Assets/coverAbout2.jpg" alt="Cover About" />
        </div>
        <div class="content">
          <h3>Kenapa Memilih Toko Buku?</h3>
          <p>
            Kami adalah solusi terbaik untuk kebutuhan bacaan Anda. Kami menyediakan
            buku-buku terbaik yang cepat, mudah, dan terpercaya.
          </p>
        </div>
      </div>
    </section>

    <section id="services" class="menu">
      <h2>Koleksi Buku Kami</h2>
      <p>
        Temukan berbagai macam buku di toko kami.
      </p>

      <div class="product-list">
        <?php
        // Loop melalui data buku dan tampilkan
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="product">
            <!-- Menampilkan gambar buku -->
            <img src="<?php echo $row['gambar']; ?>" alt="<?php echo htmlspecialchars($row['judul_buku']); ?>" />
            <p class="category"><?php echo htmlspecialchars($row['kategori']); ?></p>
            <p class="product-name"><?php echo htmlspecialchars($row['judul_buku']); ?></p> <!-- Mengganti nama_buku dengan judul_buku -->
            <p class="price">Rp. <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </section>

    <section id="contact" class="contact-section">
      <div class="container">
        <div class="contact-wrapper">
          <div class="contact-map">
            <iframe
              src="https://www.google.com/maps/embed?...&zoom=15"
              width="600"
              height="515"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
          <div class="contact-form">
            <h2>Contact Us</h2>
            <form action="process_contact.php" method="post"> <!-- Pastikan file ini ada -->
              <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required />
              </div>
              <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required />
              </div>
              <div class="input-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required />
              </div>
              <div class="input-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
              </div>
              <button type="submit" class="submit-btn">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-container">
        <div class="footer-about">
          <h3>About Toko Buku</h3>
          <p>
            Solusi terpercaya untuk mendapatkan buku favorit Anda. Temukan
            kemudahan bersama Toko Buku!
          </p>
        </div>
        <div class="footer-links">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Books</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#privacy">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h3>Contact Us</h3>
          <p><i data-feather="map-pin"></i> 123 Library Street, Jakarta, Indonesia</p>
          <p><i data-feather="phone"></i> +62 123 4567 890</p>
          <p><i data-feather="mail"></i> support@tokobuku.com</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2024 Toko Buku. All rights reserved.</p>
      </div>
    </footer>

    <script>
      feather.replace();
    </script>
    <script src="JS/script.js"></script>
  </body>
</html>
