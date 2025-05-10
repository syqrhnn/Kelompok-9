<?php
require_once 'Controllers/Customer.php';
require_once 'Helpers/helper.php';

$list_Customer = $customer->index();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'delete') {
        $row = $customer->delete($_POST['id']);
        echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
        echo "<script>window.location='?url=customer'</script>";
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="mb-2">
                <a class="btn btn-success btn-sm" href="?url=customer-input">
                    Kelola Customer
                </a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>No Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($list_Customer as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_customer'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['tempat_lahir'] ?></td>
                            <td><?= $row['tanggal_lahir'] ?></td>
                            <td><?= $row['no_telp_hp'] ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="?url=customer-input&id=<?= $row['id'] ?>"
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