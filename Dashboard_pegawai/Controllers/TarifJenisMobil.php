<?php
require_once 'Config/Connection.php';

class TarifJenisMobil
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT 
            p.*, j.nama as nama_jenis
            FROM tarif_jenis_mobil p
            LEFT JOIN jenis j ON j.id = p.jenis_id
        ");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT 
            p.*, j.nama as nama_jenis
            FROM tarif_jenis_mobil p
            LEFT JOIN jenis j ON j.id = p.jenis_id
            WHERE p.id=$id
        ");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO tarif_jenis_mobil (jenis_id, tarif_per_hari) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['jenis_id'],
            $data['tarif_per_hari']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE tarif_jenis_mobil SET jenis_id=:jenis_id, tarif_per_hari=:tarif_per_hari WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':jenis_id', $data['jenis_id']);
        $stmt->bindParam(':tarif_per_hari', $data['tarif_per_hari']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM tarif_jenis_mobil WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $row;
    }
}

$tarifjenismobil = new TarifJenisMobil($pdo);
