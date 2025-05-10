<?php
require_once 'conf/config.php';

// Ganti dengan ID customer dari sesi login
$customer_id = 5;

// Cek apakah koneksi berhasil
if (!$pdo) {
  die("Koneksi database gagal.");
}

// Query untuk mengambil daftar mobil yang tersedia
$query = "SELECT * FROM mobil WHERE status = 'Tersedia'";
$stmt = $pdo->prepare($query);
$stmt->execute();

// Ambil semua data mobil
$mobilList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <title>Sewa Mobil</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-gradient {
      background: linear-gradient(135deg, #6ee7b7, #3b82f6);
    }
  </style>
</head>

<body class="bg-gray-100">

<?php
require_once 'Layouts/header.php';
require_once 'Layouts/sidebar.php';
?>
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Main Content -->
      <main
        class="p-8 max-w-7xl mx-auto bg-white shadow-lg rounded-xl mt-10 transition-all duration-500 transform hover:scale-105">
        <div class="text-center mb-10">
          <h2 class="text-4xl font-bold text-blue-600">Sewa Mobil</h2>
          <p class="text-lg text-gray-500">Pilih mobil yang ingin Anda sewa</p>
        </div>

        <!-- Daftar Mobil -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
          <?php foreach ($mobilList as $mobil): ?>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
              <h3 class="text-xl font-semibold text-blue-600"><?= htmlspecialchars($mobil['nama_mobil']) ?></h3>
              <p class="text-gray-700">Harga per hari: Rp <?= number_format($mobil['tarif'], 0, ',', '.') ?></p>
              <p class="text-gray-500 mb-4"><?= htmlspecialchars($mobil['status']) ?></p>
              <a href="proses_sewa.php?id_mobil=<?= $mobil['id'] ?>&id_customer=<?= $customer_id ?>"
                class="block text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-300">Sewa
                Sekarang</a>
            </div>
          <?php endforeach; ?>
        </div>
      </main>

    </div>
  </div>

<?php
require_once 'Layouts/footer.php';
?>

</body>

</html>