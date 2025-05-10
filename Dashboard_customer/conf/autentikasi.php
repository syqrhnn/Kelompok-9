<?php
session_start();
include('config.php');

$username = trim($_POST['username']);
$password = $_POST['password'];

// Cek input kosong dulu
if ($username === "" || $password === "") {
    header("Location: ../index.php?error=2");
    exit();
}

// Cek login sebagai customer
$stmt = mysqli_prepare($koneksi, "SELECT id, username, password FROM login_customer WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = 'customer';
    header("Location: ../profil.php");
    exit();
}

// Gagal login
header("Location: ../index.php?error=1");
exit();
?>