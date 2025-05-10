<?php
require_once 'Controllers/Pembayaran.php';
require_once 'Controllers/Penyewaan.php';
require_once 'Helpers/helper.php';

$list_Penyewaan = $penyewaan->index();
$list_Pembayaran = $pembayaran->index();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'delete') {
        $row = $pembayaran->delete($_POST['id']);
        echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
        echo "<script>window.location='?url=pembayaran'</script>";
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="mb-2">
                <a class="btn btn-success btn-sm" href="?url=pembayaran-input">
                    Tambah Pembayaran
                </a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penyewaan ID</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Total Bayar</th>
                        <th>Metode Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($list_Pembayaran as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['penyewaan_id'] ?></td>
                            <td><?= $row['tanggal_bayar'] ?></td>
                            <td><?= $row['jumlah_bayar'] ?></td>
                            <td><?= $row['metode_bayar'] ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="?url=Pembayaran-input&id=<?= $row['id'] ?>"
                                        class="btn btn-sm btn-warning mr-2">Edit</a>
                                    <form action="" method="post"
                                        onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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