<?php
session_start();

// === DAFTAR PRODUK (SAMAKAN DENGAN HTML) ===
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

// Cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// === PROSES: TAMBAH, UPDATE, HAPUS ===
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aksi = $_POST['aksi'];
    $id = intval($_POST['id']);
    $jumlah = intval($_POST['jumlah']);

    // Tambah produk
    if ($aksi == "tambah") {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = $jumlah;
        } else {
            $_SESSION['cart'][$id] += $jumlah;
        }
    }

    // Update jumlah
    if ($aksi == "update") {
        if ($jumlah > 0) {
            $_SESSION['cart'][$id] = $jumlah;
        }
    }

    // Hapus produk
    if ($aksi == "hapus") {
        unset($_SESSION['cart'][$id]);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="tampilan.css">
</head>
<body>

<h1>Keranjang Belanja</h1>

<table border="1">
    <tr>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    <?php
    $totalBelanja = 0;

    foreach ($_SESSION['cart'] as $id => $jumlah) {
        $nama = $produk[$id]["nama"];
        $harga = $produk[$id]["harga"];
        $total = $harga * $jumlah;
        $totalBelanja += $total;

        echo "
        <tr>
            <td>$nama</td>
            <td>Rp " . number_format($harga, 0, ',', '.') . "</td>
            <td>
                <form method='POST'>
                    <input type='hidden' name='aksi' value='update'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='number' name='jumlah' min='1' value='$jumlah'>
                    <button type='submit'>Ubah</button>
                </form>
            </td>
            <td>Rp " . number_format($total, 0, ',', '.') . "</td>
            <td>
                <form method='POST'>
                    <input type='hidden' name='aksi' value='hapus'>
                    <input type='hidden' name='id' value='$id'>
                    <button type='submit'>Hapus</button>
                </form>
            </td>
        </tr>
        ";
    }
    ?>

</table>

<h2>Total Belanja: <b>Rp <?= number_format($totalBelanja, 0, ',', '.'); ?></b></h2>

<br>
<a href="utsdaftarproduk.html">Kembali Belanja</a> |
<a href="utsco.php">Checkout</a>

</body>
</html>
