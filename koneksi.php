<?php
$koneksi = mysqli_connect("localhost", "root", "", "utsarif");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
