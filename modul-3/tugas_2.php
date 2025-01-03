<?php

/**
 * Fungsi untuk mencetak bilangan bulat dari 1 hingga n dengan ketentuan tertentu.
 *
 * @param int $n Bilangan bulat positif.
 */
function cetak_bilangan($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "Pemrograman Website 2024<br>";
        } elseif ($i % 5 == 0) {
            echo "2024<br>";
        } elseif ($i % 4 == 0 && $i % 6 != 0) {
            echo "Pemrograman<br>";
        } elseif ($i % 6 == 0 && $i % 4 != 0) {
            echo "Website<br>";
        } else {
            echo $i . "<br>";
        }
    }
}

// Contoh penggunaan fungsi
cetak_bilangan(24);

?>
