<?php
require_once 'Controllers/Customer.php';
require_once 'Helpers/helper.php';

$customer_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_customer = $customer_id ? $customer->show($customer_id) : [];

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $id = $customer->create($_POST);
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location='?url=customer'</script>";
    } else if ($_POST['type'] == 'update') {
        $row = $customer->update($customer_id, $_POST);
        echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
        echo "<script>window.location='?url=customer'</script>";
    }
}
?>

<div class="container">
    <form method="post">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Tambah Customer
                </div>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="nama">Nama Customer</label>
                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?= getSafeFormValue($show_customer, 'nama_customer') ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $show_customer['alamat'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $show_customer['tempat_lahir'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $show_customer['tanggal_lahir'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" id="no_telp_hp" name="no_telp_hp" value="<?= getSafeFormValue($show_customer, 'no_telp_hp') ?>">
                </div>
            </div>

            <div class="card-footer text-right">
                <input type="hidden" name="type" value="<?= $customer_id ? 'update' : 'create' ?>">
                <input type="hidden" name="id" value="<?= $customer_id ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>