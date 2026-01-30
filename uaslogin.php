<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // bypass login untuk testing agar cepat ke dashboard
    $_SESSION['user'] = $_POST['username'];
    header("Location: uasdaftarmenu.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Angkringan</title>
    <link rel="stylesheet" href="tampilan.css">
</head>
<body>
    <div class="login-container">
        <h1>☕ Angkringan Coffee</h1>
        <p>Selamat Datang, silakan login</p>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>