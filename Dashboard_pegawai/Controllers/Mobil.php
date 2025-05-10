<?php
require_once 'Config/Connection.php';

class Mobil
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT 
            p.id, p.nama_mobil, p.tarif, p.no_plat, p.status,
            j.nama_jenis as nama_jenis, m.nama_merk as nama_merk
            FROM mobil p
            LEFT JOIN jenis_mobil j ON j.id = p.jenis_id
            LEFT JOIN merk_mobil m ON m.id = p.merk_id
        ");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT 
            p.id, p.nama_mobil, p.tarif, p.no_plat, p.status,
            j.nama_jenis as nama_jenis, m.nama_merk as nama_merk
            FROM mobil p
            LEFT JOIN jenis_mobil j ON j.id = p.jenis_id
            LEFT JOIN merk_mobil m ON m.id = p.merk_id
            WHERE p.id=$id
        ");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO mobil (nama_mobil, tarif, no_plat, jenis_id, merk_id, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['nama_mobil'],
            $data['tarif'],
            $data['no_plat'],
            $data['jenis_id'],
            $data['merk_id'],
            $data['status']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE mobil SET nama_mobil=:nama_mobil, tarif=:tarif, no_plat=:no_plat, jenis_id=:jenis_id, merk_id=:merk_id, status=:status WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama_mobil', $data['nama_mobil']);
        $stmt->bindParam(':tarif', $data['tarif']);
        $stmt->bindParam(':no_plat', $data['no_plat']);
        $stmt->bindParam(':jenis_id', $data['jenis_id']);
        $stmt->bindParam(':merk_id', $data['merk_id']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM mobil WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $row;
    }
}

$mobil = new Mobil($pdo);