<?php
$host = 'localhost';
$dbname = 'carrenta_db_rental_mobil';  // Nama database baru
$username = 'carrenta_db_rental_mobil'; // Username baru
$password = 'wyYSE9smKvQ8JJFAM5wr';     // Password baru

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Koneksi berhasil.";
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
