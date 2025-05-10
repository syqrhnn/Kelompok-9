<?php
require_once 'Conf/config.php';

// Ganti dengan ID customer dari sesi login
$customer_id = 1;

// Cek apakah koneksi berhasil
if (!$pdo) {
  die("Koneksi database gagal.");
}

// Ambil data customer
$query = "SELECT * FROM customer WHERE id = :customer_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
$stmt->execute();

// Cek apakah query mengembalikan hasil
if ($stmt->rowCount() == 0) {
  die("Data tidak ditemukan.");
}

// Ambil data customer
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <title>Profil Customer</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

<?php
require_once 'Layouts/header.php';
require_once 'Layouts/sidebar.php';
?>
<div class="wrapper">
  <div class="content-wrapper">

  <!-- Main Content -->
  <main class="p-8 max-w-4xl mx-auto bg-white shadow-lg rounded-xl mt-10">
    <div class="text-center mb-10">
      <h2 class="text-4xl font-bold text-blue-600">Profil Saya</h2>
    </div>

    <!-- Data Profil -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="space-y-6">
        <div>
          <label class="block text-gray-700 font-semibold">Nama:</label>
          <p class="text-gray-800"><?= htmlspecialchars($data['nama_customer']) ?></p>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Alamat:</label>
          <p class="text-gray-800"><?= htmlspecialchars($data['alamat']) ?></p>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Tempat Lahir:</label>
          <p class="text-gray-800"><?= htmlspecialchars($data['tempat_lahir']) ?></p>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Tanggal Lahir:</label>
          <p class="text-gray-800"><?= htmlspecialchars($data['tanggal_lahir']) ?></p>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">No. Telepon:</label>
          <p class="text-gray-800"><?= htmlspecialchars($data['no_telp_hp']) ?></p>
        </div>
      </div>

      <!-- Foto Profil -->
      <div class="space-y-6">
  <div>
    <label class="block text-gray-700 font-semibold">Foto Profil:</label>
    <?php
    // Cek apakah data 'foto' tidak kosong dan file-nya benar-benar ada
    $fotoPath = (!empty($data['foto']) && file_exists($data['foto'])) ? $data['foto'] : '../assets/img/della.jpg';
    ?>
    <img src="<?= htmlspecialchars($fotoPath) ?>" alt="Foto Profil"
      class="w-32 h-32 object-cover rounded-full border-2 border-blue-500">
  </div>
</div>

    <!-- Tombol Edit Profil -->
    <div class="mt-8 text-center">
      <a href="edit_profil.php"
        class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition duration-300">Edit Profil</a>
    </div>
  </main>

  </div>
</div>

<?php
require_once 'Layouts/footer.php';
?>


</body>

</html>