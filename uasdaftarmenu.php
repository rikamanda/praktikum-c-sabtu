<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "angkringan");

// 1. LOGIKA HAPUS
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id_hapus = $_GET['id'];
    $koneksi->query("DELETE FROM menu WHERE id_menu='$id_hapus'");
    echo "<script>alert('Menu berhasil dihapus!'); location='uasdaftarmenu.php';</script>";
}

// 2. LOGIKA UPDATE (SIMPAN HASIL EDIT)
if (isset($_POST['update'])) {
    $id_edit = $_POST['id_menu'];
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    $koneksi->query("UPDATE menu SET nama_menu='$nama', harga='$harga', stok='$stok' WHERE id_menu='$id_edit'");
    echo "<script>alert('Data berhasil diubah!'); location='uasdaftarmenu.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kedai Kopi Giut - Menu</title>
    <style>
        body { background-color: #f5f5dc; font-family: 'Courier New', Courier, monospace; }
        .container { width: 90%; margin: auto; border: 1px solid #4b3621; padding: 20px; background: #fffdf5; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th { background-color: #4b3621; color: white; padding: 12px; }
        td { text-align: center; padding: 10px; border: 1px solid #d2b48c; }
        .btn-aksi { padding: 4px 8px; text-decoration: none; border: 1px solid #ccc; color: #000; font-size: 11px; }
        .btn-beli { background-color: #5d6d3e; color: white; padding: 5px 10px; text-decoration: none; font-weight: bold; }
        .form-edit { background: #e9e9e9; padding: 20px; border: 2px solid #4b3621; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>☕ DAFTAR MENU KEDAI ☕</h2>

        <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit'): 
            $id_ambil = $_GET['id'];
            $ambil_edit = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_ambil'");
            $data_edit = $ambil_edit->fetch_assoc();
        ?>
            <div class="form-edit">
                <h3>📝 Edit Menu: <?php echo $data_edit['nama_menu']; ?></h3>
                <form method="POST">
                    <input type="hidden" name="id_menu" value="<?php echo $data_edit['id_menu']; ?>">
                    Nama: <input type="text" name="nama_menu" value="<?php echo $data_edit['nama_menu']; ?>" required>
                    Harga: <input type="number" name="harga" value="<?php echo $data_edit['harga']; ?>" required>
                    Stok: <input type="number" name="stok" value="<?php echo $data_edit['stok']; ?>" required>
                    <button type="submit" name="update">SIMPAN PERUBAHAN</button>
                    <a href="uasdaftarmenu.php">Batal</a>
                </form>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>No</th><th>Menu</th><th>Harga</th><th>Stok</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil = $koneksi->query("SELECT * FROM menu"); 
                $nomor = 1;
                while($permenu = $ambil->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><strong><?php echo $permenu['nama_menu']; ?></strong></td>
                    <td>Rp <?php echo number_format($permenu['harga']); ?></td>
                    <td><?php echo $permenu['stok']; ?> pcs</td>
                    <td>
                        <a href="uasdaftarmenu.php?id=<?php echo $permenu['id_menu']; ?>&aksi=edit" class="btn-aksi">Edit</a>
                        <a href="uasdaftarmenu.php?id=<?php echo $permenu['id_menu']; ?>&aksi=hapus" class="btn-aksi" onclick="return confirm('Hapus?')">Hapus</a>
                        <a href="uaskeranjang.php?id=<?php echo $permenu['id_menu']; ?>" class="btn-beli">BELI</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>