<?php
require_once 'Controllers/Penyewaan.php';
require_once 'Controllers/Customer.php';
require_once 'Controllers/Pegawai.php';
require_once 'Helpers/helper.php';

$list_Penyewaan = $penyewaan->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'delete') {
    $row = $penyewaan->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=penyewaan'</script>";
  }
}
?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="mb-2">
        <a class="btn btn-success btn-sm" href="?url=penyewaan-input">
          Tambah Penyewaan
        </a>
      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Pegawai ID</th>
            <th>Customer ID</th>
            <th>Keperluan Penyewaan</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Biaya</th>
            <th>Status Sewa</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_Penyewaan as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama_pegawai'] ?></td>
              <td><?= $row['nama_customer'] ?></td>
              <td><?= $row['keperluan_penyewaan'] ?></td>
              <td><?= $row['tanggal_pinjam'] ?></td>
              <td><?= $row['tanggal_kembali'] ?></td>
              <td><?= $row['biaya'] ?></td>
              <td><?= $row['status_sewa'] ?></td>
              <td>
                <div class="d-flex">
                  <a href="?url=penyewaan-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
                  <form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>