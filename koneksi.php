<?php
$conn = mysqli_connect("localhost", "root", "", "angkringan");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>