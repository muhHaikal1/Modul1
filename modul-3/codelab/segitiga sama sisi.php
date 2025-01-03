<?php
$n = 5; // Jumlah baris
for ($i = 1; $i <= $n; $i++) {
    // Cetak spasi
    for ($j = $i; $j < $n; $j++) {
        echo "&nbsp;&nbsp;";
    }
    // Cetak bintang
    for ($j = 1; $j <= (2 * $i - 1); $j++) {
        echo "*";
    }
    echo "<br>";
}
?>
