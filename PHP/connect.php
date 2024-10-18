<?php
// connect.php
$serverName = "localhost"; // Ganti dengan server SQL Anda
$database = "UserManagement"; // Nama database

try {
    // Koneksi tanpa username dan password
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
