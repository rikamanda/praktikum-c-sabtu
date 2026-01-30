<?php
session_start();
// Koneksi ke database angkringan
$koneksi = mysqli_connect("localhost", "root", "", "angkringan");

// Menangkap ID menu dari tombol BELI
if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];

    // Simpan ke session keranjang
    if (isset($_SESSION['keranjang'][$id_menu])) {
        $_SESSION['keranjang'][$id_menu] += 1;
    } else {
        $_SESSION['keranjang'][$id_menu] = 1;
    }
    // Redirect agar saat di-refresh jumlah tidak bertambah terus
    echo "<script>location='uaskeranjang.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Kedai Kopi Giut</title>
    <style>
        body { background-color: #f5f5dc; font-family: 'Courier New', monospace; }
        .container { width: 85%; margin: auto; background: white; padding: 20px; border: 1px solid #4b3621; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #4b3621; color: white; padding: 12px; }
        td { text-align: center; padding: 10px; border: 1px solid #d2b48c; }
        .btn-checkout { background-color: #5d6d3e; color: white; padding: 10px 20px; text-decoration: none; font-weight: bold; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🛒 Konfirmasi Pesanan (Checkout)</h2>
        <table>
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total_belanja = 0;
                if (!empty($_SESSION['keranjang'])) {
                    foreach ($_SESSION['keranjang'] as $id_menu => $jumlah): 
                        $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                        $pecah = $ambil->fetch_assoc();
                        $subtotal = $pecah["harga"] * $jumlah;
                        $total_belanja += $subtotal;
                ?>
                <tr>
                    <td><?php echo $pecah['nama_menu']; ?></td>
                    <td>Rp <?php echo number_format($pecah['harga']); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp <?php echo number_format($subtotal); ?></td>
                </tr>
                <?php endforeach; } else { ?>
                <tr><td colspan="4">Belum ada menu yang dipilih.</td></tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">TOTAL PEMBAYARAN</th>
                    <th>Rp <?php echo number_format($total_belanja); ?></th>
                </tr>
            </tfoot>
        </table>

        <br>
        <a href="uasdaftarmenu.php" style="color: #4b3621;">← Tambah Menu Lagi</a>
        <a href="uaskonfirmasipembayaran.php" class="btn-checkout">PROSES BAYAR SEKARANG</a>
    </div>
</body>
</html>