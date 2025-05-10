<?php
require_once 'Controllers/Penyewaan.php';
require_once 'Controllers/Customer.php';
require_once 'Controllers/Pegawai.php';
require_once 'Helpers/helper.php';

$list_Pegawai = $pegawai->index();
$list_Customer = $customer->index();

$penyewaan_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_penyewaan = $penyewaan_id ? $penyewaan->show($penyewaan_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $penyewaan->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=penyewaan'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $penyewaan->update($penyewaan_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=penyewaan'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Tambah Penyewaan
        </div>
      </div>
      <div class="card-body">

        <div class="form-group">
          <label for="customer_id">Customer</label>
          <select name="customer_id" id="customer_id" class="form-control">
            <option value="">Pilih Customer</option>
              <?php foreach ($list_Customer as $penyewaan): ?>
                  <option value="<?= $penyewaan['id'] ?>" <?= $penyewaan['id'] == getSafeFormValue($show_penyewaan, 'customer_id') ? 'selected' : '' ?>><?= $penyewaan['id'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="pegawai_id">Pegawai</label>
          <select name="pegawai_id" id="pegawai_id" class="form-control">
            <option value="">Pilih Pegawai</option>
            <?php foreach ($list_Pegawai as $penyewaan): ?>
              <option value="<?= $penyewaan['id'] ?>" <?= $penyewaan['id'] == getSafeFormValue($show_penyewaan, 'pegawai_id') ? 'selected' : '' ?>><?= $penyewaan['id'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="keperluan_penyewaan">Keperluan Penyewaan</label>
          <input type="text" name="keperluan_penyewaan" id="keperluan_penyewaan" class="form-control"
            value="<?= isset($show_penyewaan['keperluan_penyewaan']) ? $show_penyewaan['keperluan_penyewaan'] : '' ?>">
        </div>

        <div class="form-group">
          <label for="tanggal_penyewaan">Tanggal Pinjam</label>
          <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
            value="<?= isset($show_penyewaan['tanggal_pinjam']) ? $show_penyewaan['tanggal_pinjam'] : '' ?>">
        </div>

        <div class="form-group">
          <label for="tanggal_kembali">Tanggal Kembali</label>
          <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control"
            value="<?= isset($show_penyewaan['tanggal_kembali']) ? $show_penyewaan['tanggal_kembali'] : '' ?>">
        </div>

        <div class="form-group">
          <label for="biaya">Biaya</label>
          <input type="number" name="biaya" id="biaya" class="form-control"
            value="<?= isset($show_penyewaan['biaya']) ? $show_penyewaan['biaya'] : '' ?>">
        </div>

        <div class="form-group">
          <label for="keterangan">Status Sewa</label>
          <input type="text" class="form-control" id="sewa" name="sewa" value="<?= getSafeFormValue($show_penyewaan, 'status_sewa') ?>"required>
        </div>

      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $penyewaan_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $penyewaan_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>