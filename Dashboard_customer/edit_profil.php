<?php
require_once 'Conf/config.php';

// Ganti dengan ID customer dari sesi login
$customer_id = 5;

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

// Proses pengeditan profil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data yang di-submit
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telp_hp = $_POST['no_telp_hp'];

    // Cek apakah ada gambar baru
    if ($_FILES['foto']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        $foto = $target_file;
    } else {
        $foto = $data['foto']; // Gunakan foto lama jika tidak ada yang baru
    }

    // Update data customer
    $updateQuery = "UPDATE customer SET 
                    nama_customer = :nama, 
                    alamat = :alamat, 
                    tempat_lahir = :tempat_lahir, 
                    tanggal_lahir = :tanggal_lahir, 
                    no_telp_hp = :no_telp_hp, 
                    foto = :foto
                    WHERE id = :customer_id";

    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':nama', $nama);
    $updateStmt->bindParam(':alamat', $alamat);
    $updateStmt->bindParam(':tempat_lahir', $tempat_lahir);
    $updateStmt->bindParam(':tanggal_lahir', $tanggal_lahir);
    $updateStmt->bindParam(':no_telp_hp', $no_telp_hp);
    $updateStmt->bindParam(':foto', $foto);
    $updateStmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
    $updateStmt->execute();

    // Redirect setelah update
    header('Location: profil.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Profil Customer</title>
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
  <main class="p-8 max-w-4xl mx-auto bg-white shadow-lg rounded-xl mt-10 transition-all duration-500 transform hover:scale-105">
    <div class="text-center mb-10">
      <h2 class="text-4xl font-bold text-blue-600">Edit Profil Saya</h2>
      <p class="text-lg text-gray-500">Ubah informasi pribadi Anda</p>
    </div>

    <!-- Form Edit Profil -->
    <form action="edit_profil.php" method="POST" enctype="multipart/form-data">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Data Profil -->
        <div class="space-y-6">
          <div>
            <label for="nama" class="block text-gray-700 font-semibold">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama_customer']) ?>" class="w-full p-3 border border-gray-300 rounded-lg" required>
          </div>

          <div>
            <label for="alamat" class="block text-gray-700 font-semibold">Alamat:</label>
            <textarea id="alamat" name="alamat" class="w-full p-3 border border-gray-300 rounded-lg" required><?= htmlspecialchars($data['alamat']) ?></textarea>
          </div>

          <div>
            <label for="tempat_lahir" class="block text-gray-700 font-semibold">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($data['tempat_lahir']) ?>" class="w-full p-3 border border-gray-300 rounded-lg" required>
          </div>

          <div>
            <label for="tanggal_lahir" class="block text-gray-700 font-semibold">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= htmlspecialchars($data['tanggal_lahir']) ?>" class="w-full p-3 border border-gray-300 rounded-lg" required>
          </div>

          <div>
            <label for="no_telp_hp" class="block text-gray-700 font-semibold">No. Telepon:</label>
            <input type="text" id="no_telp_hp" name="no_telp_hp" value="<?= htmlspecialchars($data['no_telp_hp']) ?>" class="w-full p-3 border border-gray-300 rounded-lg" required>
          </div>
        </div>

        <!-- Foto Profil -->
        <div class="space-y-6">
          <div>
            <label for="foto" class="block text-gray-700 font-semibold">Foto Profil:</label>
            <input type="file" id="foto" name="foto" class="w-full p-3 border border-gray-300 rounded-lg">
            <?php if ($data['foto']): ?>
              <p class="text-gray-500 text-sm mt-2">Foto saat ini:</p>
              <img src="<?= htmlspecialchars($data['foto']) ?>" alt="Foto Profil" class="w-32 h-32 object-cover rounded-full border-2 border-blue-500">
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Tombol Submit -->
      <div class="mt-8 text-center">
        <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition duration-300">Simpan Perubahan</button>
      </div>
    </form>
  </main>

  </div>
</div>

<?php require_once 'Layouts/footer.php'; ?>

</body>
</html>
