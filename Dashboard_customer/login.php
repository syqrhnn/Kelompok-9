<?php
session_start();

// Tampilkan pesan error dari URL jika ada
$error = '';
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        $error = "Username atau password salah.";
    } elseif ($_GET['error'] == 2) {
        $error = "Harap isi username dan password.";
    }
}
?>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        background-color: #0f0f0f;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        padding: 20px;
    }

    .login-box {
        background: #1c1c1c;
        padding: 45px 35px;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        width: 100%;
        max-width: 400px;
        animation: fadeIn 0.6s ease;
        color: #eaeaea;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .icon-box {
        font-size: 3.5rem;
        color: #00aaff;
        text-align: center;
        margin-bottom: 20px;
    }

    .login-title {
        font-size: 2.2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 8px;
        color: #f4f4f4;
    }

    .brand-name {
        text-align: center;
        color: #999;
        font-size: 1rem;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 500;
        color: #ccc;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        background-color: #2a2a2a;
        border: 1px solid #333;
        color: #eee;
    }

    .form-control::placeholder {
        color: #888;
    }

    .form-control:focus {
        border-color: #00aaff;
        box-shadow: 0 0 0 0.2rem rgba(0, 170, 255, 0.25);
        background-color: #2a2a2a;
        color: #fff;
    }

    .btn-login {
        background-color: #00aaff;
        border: none;
        padding: 12px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: background 0.3s ease;
    }

    .btn-login:hover {
        background-color: #0088cc;
    }

    .show-password {
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 39px;
        color: #777;
    }

    .alert {
        font-size: 0.95rem;
    }
</style>

<div class="login-box">
    <div class="icon-box">
        <i class="fas fa-car-side"></i>
    </div>
    <h2 class="login-title">Masuk Akun</h2>
    <p class="brand-name">CAR Rental</p>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="conf/autentikasi.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required
                placeholder="Masukkan username">
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required
                placeholder="Masukkan password">
            <span class="show-password" onclick="togglePassword()"><i class="fas fa-eye" id="toggleIcon"></i></span>
        </div>
        <button type="submit" class="btn btn-login w-100 text-white">Login</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const icon = document.getElementById("toggleIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>