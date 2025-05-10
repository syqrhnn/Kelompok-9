<?php
require_once 'Conf/config.php';


// Ganti dengan ID customer dari sesi login
$customer_id = 5; // Misalnya, ID customer yang sedang login adalah 1

// Query untuk mengambil riwayat penyewaan customer
$query = "SELECT p.*, c.nama_customer, m.nama_mobil
          FROM penyewaan p
          JOIN customer c ON p.customer_id = c.id
          JOIN mobil m ON p.mobil_id = m.id
          WHERE p.customer_id = :customer_id
          ORDER BY p.tanggal_pinjam DESC";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
$stmt->execute();

// Ambil semua data riwayat penyewaan
$penyewaanList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Riwayat Penyewaan</title>
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
<div class = "wrapper">
<div class = "content-wrapper">

  <!-- Main Content -->
  <main class="p-8 max-w-7xl mx-auto bg-white shadow-lg rounded-xl mt-10">
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">Riwayat Penyewaan Mobil</h2>

    <?php if (empty($penyewaanList)): ?>
      <p class="text-center text-gray-500">Anda belum pernah menyewa mobil.</p>
    <?php else: ?>
      <table class="min-w-full bg-white table-auto">
        <thead>
          <tr class="text-left bg-gray-200">
            <th class="py-2 px-4">Keperluan Penyewaan</th>
            <th class="py-2 px-4">Nama Mobil</th>
            <th class="py-2 px-4">Tanggal Pinjam</th>
            <th class="py-2 px-4">Tanggal Kembali</th>
            <th class="py-2 px-4">Biaya</th>
            <th class="py-2 px-4">Status Sewa</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($penyewaanList as $penyewaan): ?>
            <tr class="border-b">
              <td class="py-2 px-4"><?= htmlspecialchars($penyewaan['keperluan_penyewaan']) ?></td>
              <td class="py-2 px-4"><?= htmlspecialchars($penyewaan['nama_mobil']) ?></td>
              <td class="py-2 px-4"><?= date('d M Y H:i', strtotime($penyewaan['tanggal_pinjam'])) ?></td>
              <td class="py-2 px-4"><?= date('d M Y H:i', strtotime($penyewaan['tanggal_kembali'])) ?></td>
              <td class="py-2 px-4">Rp <?= number_format($penyewaan['biaya'], 0, ',', '.') ?></td>
              <td class="py-2 px-4"><?= htmlspecialchars($penyewaan['status_sewa']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </main>

</div>
</div>

  <?php
  require_once 'Layouts/footer.php';
  ?>
</body>
</html>
