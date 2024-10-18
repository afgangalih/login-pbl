<?php
// register_process.php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Periksa apakah NIM sudah terdaftar
    $check_sql = "SELECT * FROM Users WHERE NIM = :nim";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bindParam(':nim', $nim);
    $check_stmt->execute();

    if ($check_stmt->rowCount() > 0) {
        echo "NIM sudah terdaftar. Silakan login.";
    } else {
        // Simpan pengguna baru
        $sql = "INSERT INTO Users (NIM, Password) VALUES (:nim, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':password', $password);

        try {
            $stmt->execute();
            echo "Registrasi berhasil! Silakan <a href='login.html'>login</a>.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
