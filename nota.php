<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "angkringan");

// Cek koneksi
if (!$koneksi) { die("Koneksi Gagal: " . mysqli_connect_error()); }

// Ambil data
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal = date("Y-m-d H:i:s");
$total = 22000; // Contoh statis dari gambar Anda

// 1. Simpan Pelanggan
$simpan_pelanggan = $koneksi->query("INSERT INTO pelanggan (nama_pelanggan, no_hp, alamat) VALUES ('$nama', '-', '$alamat')");

if ($simpan_pelanggan) {
    $id_pelanggan_baru = $koneksi->insert_id;

    // 2. Simpan Transaksi (Pastikan id_pegawai 1 sudah ada di tabel pegawai)
    $query_transaksi = "INSERT INTO transaksi (tanggal, id_pelanggan, id_pegawai, total) 
                        VALUES ('$tanggal', '$id_pelanggan_baru', 1, '$total')";
    
    if ($koneksi->query($query_transaksi)) {
        unset($_SESSION['keranjang']);
        echo "<script>alert('BERHASIL! Data sudah masuk, kerja bagus!.'); location='uaslogin.php';</script>";
    } else {
        // JIKA GAGAL, AKAN MUNCUL PESAN ERROR DI SINI
        echo "Gagal simpan transaksi: " . $koneksi->error;
    }
} else {
    echo "Gagal simpan pelanggan: " . $koneksi->error;
}
?>