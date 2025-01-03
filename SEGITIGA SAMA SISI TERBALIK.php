<?php
$n = 5; // Jumlah baris
for ($i = $n; $i >= 1; $i--) {
    // Cetak spasi
    for ($j = $n; $j > $i; $j--) {
        echo "&nbsp;&nbsp;";
    }
    // Cetak bintang
    for ($j = 1; $j <= (2 * $i - 1); $j++) {
        echo "*";
    }
    echo "<br>";
}
?>
