<?php
session_start();

// === CEK KERANJANG ===
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<link rel='stylesheet' href='tampilan.css'>";
    echo "<h2>Keranjang masih kosong!</h2>";
    echo "<a href='utsdaftarproduk.html'>Kembali Belanja</a>";
    exit;
}

// === DAFTAR PRODUK ===
$produk = [
    1 => ["nama" => "Kopi Latte", "harga" => 20000],
    2 => ["nama" => "friedchicken", "harga" => 25000],
    3 => ["nama" => "Espresso", "harga" => 15000],
    4 => ["nama" => "Americano", "harga" => 18000],
    5 => ["nama" => "Mocha", "harga" => 27000],
    6 => ["nama" => "Matcha Latte", "harga" => 28000],
    7 => ["nama" => "Caramel Macchiato", "harga" => 30000],
    8 => ["nama" => "nasi goreng", "harga" => 29000],
    9 => ["nama" => "Chocolate", "harga" => 22000],
    10 => ["nama" => "pisang keju", "harga" => 26000],
];

// === JIKA SELESAIKAN PESANAN ===
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama   = $_POST['nama'];
    $hp     = $_POST['hp'];
    $alamat = $_POST['alamat'];
    $metode = $_POST['metode'];

    // Bersihkan keranjang
    $_SESSION['cart'] = [];

    // TAMPILKAN HALAMAN SELESAI — DENGAN CSS
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Pesanan Berhasil</title>
        <link rel='stylesheet' href='tampilan.css'>
    </head>
    <body>

    <h1>Checkout Berhasil</h1>
    <h2>Terima kasih, $nama!</h2>

    <p><b>No HP:</b> $hp</p>
    <p><b>Alamat:</b> $alamat</p>
    <p><b>Metode Pembayaran:</b> $metode</p>

    <br><br>
    <a href='utsdaftarproduk.html'>Kembali ke Halaman Utama</a>

    </body>
    </html>
    ";
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="tampilan.css">

    <script>
// ========= VALIDASI FORM =========
function validasi() {
    let hp = document.getElementById("hp").value;
    let alamat = document.getElementById("alamat").value;

    // HP -> hanya angka
    if (!/^[0-9]+$/.test(hp)) {
        alert("No HP hanya boleh angka!");
        return false;
    }

    // Alamat -> hanya huruf dan spasi
    if (!/^[A-Za-z ]+$/.test(alamat)) {
        alert("Alamat hanya boleh huruf!");
        return false;
    }

    return true;
}
    </script>

</head>
<body>

<h1>Checkout</h1>

<h2>Ringkasan Pesanan</h2>

<table border="1">
    <tr>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total</th>
    </tr>

    <?php
    $grand = 0;
    foreach ($_SESSION['cart'] as $id => $jumlah) {
        $nama  = $produk[$id]["nama"];
        $harga = $produk[$id]["harga"];
        $total = $harga * $jumlah;
        $grand += $total;

        echo "
        <tr>
            <td>$nama</td>
            <td>$jumlah</td>
            <td>Rp " . number_format($harga, 0, ',', '.') . "</td>
            <td>Rp " . number_format($total, 0, ',', '.') . "</td>
        </tr>
        ";
    }
    ?>
</table>

<h2>Total Bayar: <b>Rp <?= number_format($grand, 0, ',', '.'); ?></b></h2>

<br><br>

<h2>Data Pelanggan</h2>

<form method="POST" onsubmit="return validasi()">

    Nama:<br>
    <input type="text" name="nama" required><br><br>

    No HP:<br>
    <input type="text" name="hp" id="hp" required><br><br>

    Alamat:<br>
    <textarea name="alamat" id="alamat" required></textarea><br><br>

    Metode Pembayaran:<br>
    <select name="metode" required>
        <option value="COD (Bayar di Tempat)">COD (Bayar di Tempat)</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="QRIS">QRIS</option>
        <option value="Dana">Dana</option>
        <option value="OVO">OVO</option>
        <option value="Gopay">Gopay</option>
    </select>

    <br><br>
    <button type="submit">Selesaikan Pesanan</button>

</form>

</body>
</html>
