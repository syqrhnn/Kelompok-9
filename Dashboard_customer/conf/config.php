<?php
$host = 'localhost';
$db = 'db_rental_mobil';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$koneksi = mysqli_connect("localhost", "root", "", "db_rental_mobil");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
