<?php
require_once 'Config/Connection.php';

class MerkMobil
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM merk_mobil");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM merk_mobil WHERE id=$id");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO merk_mobil (nama_merk) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama_merk']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE merk_mobil SET nama_merk=:nama_merk WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama_merk', $data['nama_merk']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM merk_mobil WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $row;
    }
}

$merkmobil = new MerkMobil($pdo);
