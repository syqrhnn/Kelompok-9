<?php

require_once __DIR__ . '/../Config/Connection.php';

class LoginController
{
    public function login($username, $password)
    {
        global $pdo;

        // Cek login sebagai customer
        $stmt = $pdo->prepare("SELECT * FROM login_customer WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = 'customer';

            header("Location: ../index.php");
            exit();
        }

        // Cek login sebagai pegawai
        $stmt = $pdo->prepare("SELECT * FROM login_pegawai WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $pegawai = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pegawai && password_verify($password, $pegawai['password'])) {
            session_start();
            $_SESSION['user_id'] = $pegawai['id'];
            $_SESSION['username'] = $pegawai['username'];
            $_SESSION['role'] = 'pegawai';

            header("Location: ../index.php");
            exit();
        }

        return false;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    public function isLoggedIn()
    {
        session_start();
        return isset($_SESSION['user_id']);
    }
}
?>