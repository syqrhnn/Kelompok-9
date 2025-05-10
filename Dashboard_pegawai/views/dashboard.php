<?php
require_once 'Controllers/Customer.php';
require_once 'Controllers/Mobil.php';
require_once 'Controllers/Pembayaran.php';
require_once 'Controllers/Penyewaan.php';

$total_customer = count($customer->index());
$total_mobil = count($mobil->index());
$total_pembayaran = count($pembayaran->index());
$total_penyewaan = count($penyewaan->index());

$username = $_SESSION['username'] ?? 'Pengguna';
?>

<!-- Styling tambahan -->
<style>
    .dashboard-title {
        margin: 20px 0;
        font-size: 2rem;
        color: #343a40;
        font-weight: bold;
        text-align: center;
    }

    .dashboard-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 20px;
    }

    .card-summary {
        background: white;
        border: none;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 4px 12px rgba(23, 162, 184, 0.15);
        text-align: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card-summary:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(23, 162, 184, 0.25);
    }

    .card-summary i {
        font-size: 2rem;
        color:rgb(184, 23, 23);
        margin-bottom: 10px;
    }

    .card-summary h3 {
        color:rgb(184, 58, 23);
        font-size: 2rem;
        margin: 0;
    }

    .card-summary p {
        margin-top: 4px;
        font-size: 1rem;
        color: #6c757d;
    }

    .alert-success {
        background-color:rgb(23, 184, 98);
        font-size: 1.25rem;
        border-radius: 6px;
        color: white;
        text-align: center;
    }
</style>

<div class="container mt-4">
    <div class="dashboard-title">Dashboard</div>


    <div class="dashboard-container">
        <!-- Total Customer Card -->
        <div class="card-summary">
            <i class="fas fa-users"></i> <!-- Updated Icon -->
            <h3><?= $total_customer ?></h3>
            <p>Total Customer</p>
        </div>

        <!-- Total Mobil Card -->
        <div class="card-summary">
            <i class="fas fa-car"></i> <!-- Updated Icon -->
            <h3><?= $total_mobil ?></h3>
            <p>Total Mobil</p>
        </div>

        <!-- Total Pembayaran Card -->
        <div class="card-summary">
            <i class="fas fa-credit-card"></i> <!-- Updated Icon -->
            <h3><?= $total_pembayaran ?></h3>
            <p>Total Pembayaran</p>
        </div>

        <!-- Total Penyewaan Card -->
        <div class="card-summary">
            <i class="fas fa-calendar-check"></i> <!-- Updated Icon -->
            <h3><?= $total_penyewaan ?></h3>
            <p>Total Penyewaan</p>
        </div>
    </div>
</div>