<?php
require_once 'Config/Connection.php';

class Penyewaan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT 
            p.id, p.keperluan_penyewaan, p.tanggal_pinjam, p.tanggal_kembali, p.biaya, p.status_sewa,
            c.nama_customer as nama_customer, i.nama_pegawai as nama_pegawai
            FROM penyewaan p
            LEFT JOIN customer c ON c.id = p.customer_id
            LEFT JOIN pegawai i ON i.id = p.pegawai_id
        ");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT 
            p.id, p.keperluan_penyewaan, p.tanggal_pinjam, p.tanggal_kembali, p.biaya, p.status_sewa,
            c.nama_customer as nama_customer, i.nama_pegawai as nama_pegawai
            FROM penyewaan p
            LEFT JOIN customer c ON c.id = p.customer_id
            LEFT JOIN pegawai i ON i.id = p.pegawai_id
            WHERE p.id=$id
        ");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO penyewaan (pegawai_id, customer_id, keperluan_penyewaan, tanggal_pinjam, tanggal_kembali, biaya, status_sewa) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['pegawai_id'],
            $data['customer_id'],
            $data['keperluan_penyewaan'],
            $data['tanggal_pinjam'],
            $data['tanggal_kembali'],
            $data['biaya'],
            $data['status_sewa']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE penyewaan SET pegawai_id=:pegawai_id, customer_id=:customer_id, keperluan_penyewaan=:keperluan_penyewaan, tanggal_pinjam=:tanggal_pinjam, tanggal_kembali=:tanggal_kembali, biaya=:biaya, status_sewa=:status_sewa WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':pegawai_id', $data['pegawai_id']);
        $stmt->bindParam(':customer_id', $data['customer_id']);
        $stmt->bindParam(':keperluan_penyewaan', $data['keperluan_penyewaan']);
        $stmt->bindParam(':tanggal_pinjam', $data['tanggal_pinjam']);
        $stmt->bindParam(':tanggal_kembali', $data['tanggal_kembali']);
        $stmt->bindParam(':biaya', $data['biaya']);
        $stmt->bindParam(':status_sewa', $data['status_sewa']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM penyewaan WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $row;
    }
}

$penyewaan = new Penyewaan($pdo);
