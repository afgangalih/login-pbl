<?php
session_start(); // Memulai sesi
include 'connect.php';

header('Content-Type: application/json'); // Set header untuk JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    // Query untuk memeriksa pengguna
    $sql = "SELECT Password FROM Users WHERE NIM = :nim";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nim', $nim);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if (password_verify($password, $result['Password'])) {
            // Jika berhasil, simpan NIM dalam sesi dan kirim respons JSON
            $_SESSION['nim'] = $nim; // Menyimpan NIM dalam sesi
            echo json_encode(['success' => true, 'nim' => $nim]);
        } else {
            // Jika password salah
            echo json_encode(['success' => false, 'message' => 'Invalid NIM or password.']);
        }
    } else {
        // Jika NIM tidak terdaftar
        echo json_encode(['success' => false, 'message' => 'NIM tidak terdaftar. Silakan melakukan registrasi terlebih dahulu.']);
    }
}
?>
