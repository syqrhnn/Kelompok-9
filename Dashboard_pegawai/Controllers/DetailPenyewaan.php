<?php
require_once 'Config/Connection.php';

class DetailPenyewaan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT 
            p.id, p.harga,
            s.nama as nama_penyewaan, m.nama as nama_mobil
            FROM detail_penyewaan p
            LEFT JOIN penyewaan s ON s.id = p.penyewaan_id
            LEFT JOIN mobil m ON m.id = p.mobil_id
        ");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT 
            p.id, p.harga,
            s.nama as nama_penyewaan, m.nama as nama_mobil
            FROM detail_penyewaan p
            LEFT JOIN penyewaan s ON s.id = p.penyewaan_id
            LEFT JOIN mobil m ON m.id = p.mobil_id
            WHERE p.id=$id
        ");
        $data = $stmt->fetch();

        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO detail_penyewaan (penyewaan_id, mobil_id, harga) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['penyewaan_id'],
            $data['mobil_id'],
            $data['harga']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE detail_penyewaan SET penyewaan_id=:penyewaan_id, mobil_id=:mobil_id, harga=:harga WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':penyewaan_id', $data['penyewaan_id']);
        $stmt->bindParam(':mobil_id', $data['mobil_id']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM detail_penyewaan WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $row;
    }
}

$detailpenyewaan = new DetailPenyewaan($pdo);