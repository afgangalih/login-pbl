<?php
session_start(); // Memulai sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['nim'])) {
    header('Location: login.html'); // Arahkan ke halaman login jika belum login
    exit();
}

// Ambil NIM dari sesi
$nim = $_SESSION['nim'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($nim); ?>!</h1>
    <p>You have successfully logged in.</p>
    <a href="logout.php">Logout</a> <!-- Tautan untuk logout -->
</body>
</html>
