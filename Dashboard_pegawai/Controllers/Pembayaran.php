<?php
require_once 'Config/Connection.php';

class Pembayaran
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT 
            p.*, s.id as penyewaan_id
            FROM pembayaran p
            LEFT JOIN penyewaan s ON s.id = p.penyewaan_id
        ");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT 
            p.*, s.id as penyewaan_id
            FROM pembayaran p
            LEFT JOIN penyewaan s ON s.id = p.penyewaan_id
            WHERE p.id=$id
        ");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO pembayaran (penyewaan_id, tanggal_bayar, jumlah_bayar, metode_bayar) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['penyewaan_id'],
            $data['tanggal_bayar'],
            $data['jumlah_bayar'],
            $data['metode_bayar']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE pembayaran SET penyewaan_id=:penyewaan_id, tanggal_bayar=:tanggal_bayar, jumlah_bayar=:jumlah_bayar, metode_bayar=:metode_bayar WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':penyewaan_id', $data['penyewaan_id']);
        $stmt->bindParam(':tanggal_bayar', $data['tanggal_bayar']);
        $stmt->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $stmt->bindParam(':metode_bayar', $data['metode_bayar']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM pembayaran WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $row;
    }
}

$pembayaran = new Pembayaran($pdo);