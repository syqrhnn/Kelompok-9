<?php
require_once 'Controllers/Pembayaran.php';
require_once 'Controllers/Penyewaan.php';
require_once 'Helpers/helper.php';

$pembayaran_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_pembayaran = $pembayaran_id ? $pembayaran->show($pembayaran_id) : [];

$list_Penyewaan = $penyewaan->index();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $id = $pembayaran->create($_POST);
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location='?url=pembayaran'</script>";
    } else if ($_POST['type'] == 'update') {
        $row = $pembayaran->update($pembayaran_id, $_POST);
        echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
        echo "<script>window.location='?url=pembayaran'</script>";
    }
}
?>

<div class="container">
    <form method="post">

            <div class="card-header">
                <div class="card-title">
                    Tambah Pembayaran
                </div>
            </div>
            <div class="card-body">
                <div class="card">
                        <div class="form-group">
                            <label for="penyewaan">Penyewaan ID</label>
                            <select name="penyewaan_id" id="penyewaan_id" class="form-control">
                                <option value="">-- Pilih Penyewaan --</option>
                            <?php foreach ($list_Penyewaan as $pembayaran): ?>
                            <option value="<?= $pembayaran['id'] ?>" <?= $pembayaran['id'] == getSafeFormValue($show_pembayaran, 'penyewaan_id') ? 'selected' : '' ?>><?= $pembayaran['id'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="tanggal_bayar">Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control"
                        value="<?= isset($show_pembayaran['tanggal_bayar']) ? $show_pembayaran['tanggal_bayar'] : '' ?>">
                </div>

                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control"
                        value="<?= isset($show_pembayaran['jumlah_bayar']) ? $show_pembayaran['jumlah_bayar'] : '' ?>">
                </div>

                <div class="form-group">
                    <label for="metode_bayar">Metode Bayar</label>
                    <input type="text" name="metode_bayar" id="metode_bayar" class="form-control"
                        value="<?= isset($show_pembayaran['metode_bayar']) ? $show_pembayaran['metode_bayar'] : '' ?>">
                </div>
            </div>


            <div class="card-footer text-right">
                <input type="hidden" name="type" value="<?= $pembayaran_id ? 'update' : 'create' ?>">
                <input type="hidden" name="id" value="<?= $pembayaran_id ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>