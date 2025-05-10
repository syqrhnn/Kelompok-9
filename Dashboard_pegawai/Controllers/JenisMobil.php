<?php
require_once 'Config/Connection.php';

class JenisMobil
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM jenis_mobil");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM jenis_mobil WHERE id=$id");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO jenis_mobil (nama_jenis) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama_jenis']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE jenis_mobil SET nama_jenis=:nama_jenis WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama_jenis', $data['nama_jenis']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM jenis_mobil WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $row;
    }
}

$jenismobil = new JenisMobil($pdo);
