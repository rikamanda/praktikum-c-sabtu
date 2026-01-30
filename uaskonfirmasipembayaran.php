<?php
session_start();
// Koneksi ke database angkringan
$koneksi = mysqli_connect("localhost", "root", "", "angkringan");

// Cek jika keranjang kosong, arahkan kembali
if (empty($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang kosong, silakan pilih menu dulu!');</script>";
    echo "<script>location='uasdaftarmenu.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pembayaran - Kedai Kopi Giut</title>
    <style>
        body { background-color: #f5f5dc; font-family: 'Courier New', monospace; }
        .container { width: 60%; margin: 30px auto; background: white; padding: 30px; border: 1px solid #4b3621; box-shadow: 5px 5px 15px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #4b3621; border-bottom: 2px solid #4b3621; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], textarea, select { width: 100%; padding: 10px; border: 1px solid #d2b48c; box-sizing: border-box; }
        .btn-selesai { background-color: #5d6d3e; color: white; padding: 12px; border: none; width: 100%; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .summary { background: #fffdf5; padding: 15px; border: 1px dashed #4b3621; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>📝 KONFIRMASI PEMBAYARAN</h2>

    <div class="summary">
        <strong>Ringkasan Pesanan:</strong>
        <ul style="list-style: none; padding: 0;">
            <?php 
            $total_bayar = 0;
            foreach ($_SESSION['keranjang'] as $id_menu => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                $data = $ambil->fetch_assoc();
                $subtotal = $data['harga'] * $jumlah;
                $total_bayar += $subtotal;
                echo "<li>- " . $data['nama_menu'] . " ($jumlah) : Rp " . number_format($subtotal) . "</li>";
            }
            ?>
        </ul>
        <hr>
        <strong>Total Yang Harus Dibayar: Rp <?php echo number_format($total_bayar); ?></strong>
    </div>

    <form action="nota.php" method="POST">
        <div class="form-group">
            <label>Nama Lengkap Pelanggan</label>
            <input type="text" name="nama" placeholder="Masukkan nama Anda..." required>
        </div>

        <div class="form-group">
            <label>Alamat Pengiriman / No. Meja</label>
            <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap atau nomor meja..." required></textarea>
        </div>

        <div class="form-group">
            <label>Metode Pembayaran</label>
            <select name="metode" required>
                <option value="">-- Pilih Pembayaran --</option>
                <option value="Tunai (Kasir)">Tunai (Bayar di Kasir)</option>
                <option value="Transfer Bank">Transfer Bank (BCA/Mandiri)</option>
                <option value="E-Wallet">E-Wallet (Dana/OVO/GoPay)</option>
            </select>
        </div>

        <button type="submit" class="btn-selesai">KONFIRMASI & SELESAIKAN PEMBAYARAN</button>
    </form>
</div>

</body>
</html>