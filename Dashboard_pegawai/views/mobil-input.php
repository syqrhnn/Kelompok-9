<?php
require_once 'Controllers/Mobil.php';
require_once 'Controllers/JenisMobil.php';
require_once 'Controllers/MerkMobil.php';
require_once 'Helpers/helper.php';

$mobil_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_mobil = $mobil_id ? $mobil->show($mobil_id) : [];

$list_Jenismobil = $jenismobil->index();
$list_Merkmobil = $merkmobil->index();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $id = $mobil->create($_POST);
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location='?url=mobil'</script>";
    } else if ($_POST['type'] == 'update') {
        $row = $mobil->update($mobil_id, $_POST);
        echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
        echo "<script>window.location='?url=mobil'</script>";
    }
}
?>

<div class="container">
    <form method="post">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Tambah Mobil
                </div>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="nama">Nama Mobil</label>
                    <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="<?= getSafeFormValue($show_mobil, 'nama_mobil') ?>"
                </div>

                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <input type="number" name="tarif" id="tarif" class="form-control" value="<?= $show_mobil['tarif'] ?? '' ?>">
                </div>

                <div class="form-group">
                    <label for="no_plat">Plat Nomor</label>
                    <input type="text" name="no_plat" id="no_plat" class="form-control" value="<?= $show_mobil['no_plat'] ?? '' ?>">
                </div>

                <div class="form-group">
                    <label for="jenis_id">Jenis Mobil</label>
                    <select name="jenis_id" id="jenis_id" class="form-control">
                        <option value="">-- Pilih Jenis Mobil --</option>
                        <?php foreach ($list_Jenismobil as $row): ?>
                            <option value="<?= $row['id'] ?>" <?= (isset($show_mobil['jenis_id']) && $show_mobil['jenis_id'] == $row['id']) ? 'selected' : '' ?>>
                                <?= $row['nama_jenis'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="merk_id">Merk Mobil</label>
                    <select name="merk_id" id="merk_id" class="form-control">
                        <option value="">-- Pilih Merk Mobil --</option>
                        <?php foreach ($list_Merkmobil as $row): ?>
                            <option value="<?= $row['id'] ?>"
                            <?= (isset($show_mobil['merk_id']) && $show_mobil['merk_id'] == $row['id']) ? 'selected' : '' ?>>
                            <?= $row['nama_merk'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" value="<?= $show_mobil['status'] ?? '' ?>">
                </div>
                
            </div>


            <div class="card-footer text-right">
                <input type="hidden" name="type" value="<?= $mobil_id ? 'update' : 'create' ?>">
                <input type="hidden" name="id" value="<?= $mobil_id ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>