<?php
require_once 'Conf/config.php';

// Ganti dengan ID customer dari sesi login
$customer_id = 5;

// Ambil data pembayaran yang terkait dengan penyewaan milik customer
$query = "SELECT pb.*, py.keperluan_penyewaan, py.tanggal_pinjam
          FROM pembayaran pb
          JOIN penyewaan py ON pb.penyewaan_id = py.id
          WHERE py.customer_id = :customer_id
          ORDER BY pb.tanggal_bayar DESC";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
$stmt->execute();

$pembayaranList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Riwayat Pembayaran</title>
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
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Riwayat Pembayaran</h2>

    <?php if (empty($pembayaranList)): ?>
      <p class="text-center text-gray-500">Belum ada pembayaran yang tercatat.</p>
    <?php else: ?>
      <table class="min-w-full bg-white table-auto">
        <thead>
          <tr class="text-left bg-gray-200">
            <th class="py-2 px-4">Keperluan</th>
            <th class="py-2 px-4">Tanggal Pinjam</th>
            <th class="py-2 px-4">Tanggal Bayar</th>
            <th class="py-2 px-4">Jumlah Bayar</th>
            <th class="py-2 px-4">Metode</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pembayaranList as $bayar): ?>
            <tr class="border-b">
              <td class="py-2 px-4"><?= htmlspecialchars($bayar['keperluan_penyewaan']) ?></td>
              <td class="py-2 px-4"><?= date('d M Y', strtotime($bayar['tanggal_pinjam'])) ?></td>
              <td class="py-2 px-4"><?= date('d M Y', strtotime($bayar['tanggal_bayar'])) ?></td>
              <td class="py-2 px-4">Rp <?= number_format($bayar['jumlah_bayar'], 0, ',', '.') ?></td>
              <td class="py-2 px-4"><?= htmlspecialchars($bayar['metode_bayar']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </main>

  

  </div>
</div>
<?php require_once 'Layouts/footer.php'; ?>

  

</body>
</html>
