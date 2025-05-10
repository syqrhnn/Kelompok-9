<?php
require_once 'Conf/config.php';

// Ambil id_mobil dari URL
$id_mobil = isset($_GET['id_mobil']) ? (int) $_GET['id_mobil'] : 0;

// Validasi ID mobil yang valid
if ($id_mobil <= 0) {
  die("ID mobil tidak valid.");
}

// Ganti dengan ID customer dari sesi login
$customer_id = 5;

// Cek apakah koneksi berhasil
if (!$pdo) {
  die("Koneksi database gagal.");
}

// Ambil data mobil berdasarkan ID
$query = "SELECT * FROM mobil WHERE id = :id AND status = 'Tersedia'";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id_mobil, PDO::PARAM_INT);
$stmt->execute();

$mobil = $stmt->fetch(PDO::FETCH_ASSOC);

// Cek apakah mobil tersedia
if (!$mobil) {
  die("Mobil tidak tersedia.");
}

// Proses penyewaan mobil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    // Mulai transaksi
    $pdo->beginTransaction();

    // Simpan penyewaan
    $querySewa = "INSERT INTO penyewaan (customer_id, mobil_id, keperluan_penyewaan, tanggal_pinjam) VALUES (:customer_id, :mobil_id, :keperluan_penyewaan, NOW())";
    $stmtSewa = $pdo->prepare($querySewa);
    $keperluan_penyewaan = "Penyewaan Mobil";
    $stmtSewa->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
    $stmtSewa->bindParam(':mobil_id', $id_mobil, PDO::PARAM_INT);
    $stmtSewa->bindParam(':keperluan_penyewaan', $keperluan_penyewaan, PDO::PARAM_STR);
    $stmtSewa->execute();

    // Perbarui status mobil
    $queryUpdate = "UPDATE mobil SET status = 'Tersewa' WHERE id = :id";
    $stmtUpdate = $pdo->prepare($queryUpdate);
    $stmtUpdate->bindParam(':id', $id_mobil, PDO::PARAM_INT);
    $stmtUpdate->execute();

    // Commit transaksi
    $pdo->commit();

    header('Location: riwayat_sewa.php');
    exit;

  } catch (PDOException $e) {
    $pdo->rollBack();
    die("Terjadi kesalahan saat memproses penyewaan: " . $e->getMessage());
  }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Proses Sewa Mobil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<?php
require_once 'Layouts/header.php';
require_once 'Layouts/sidebar.php';
?>
<div class="wrapper">
  <div class="content-wrapper">

  <nav class="bg-gradient text-white p-6 shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-3xl font-semibold">Proses Sewa Mobil</h1>
    </div>
  </nav>

  <main class="p-8 max-w-7xl mx-auto bg-white shadow-lg rounded-xl mt-10">
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Konfirmasi Penyewaan Mobil</h2>

    <div class="text-center">
      <h3 class="text-2xl font-semibold"><?= htmlspecialchars($mobil['nama_mobil']) ?></h3>
      <p class="text-lg text-gray-700 mb-4">Harga per hari: Rp <?= number_format($mobil['tarif'], 0, ',', '.') ?></p>
      <p class="text-gray-500"><?= htmlspecialchars($mobil['status']) ?></p>
    </div>

    <form action="proses_sewa.php?id_mobil=<?= $id_mobil ?>" method="POST" class="mt-8 text-center">
      <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition duration-300">Sewa Mobil Ini</button>
    </form>
  </main>

  </div>
</div>
<?php require_once 'Layouts/footer.php'; ?>

</body>
</html>
