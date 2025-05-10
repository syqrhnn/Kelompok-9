<?php
require_once 'Config/Connection.php';

class Customer
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM customer");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM customer WHERE id=$id");
        $data = $stmt->fetch();

        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO customer (nama_customer, alamat, tempat_lahir, tanggal_lahir, no_telp_hp) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['nama_customer'],
            $data['alamat'],
            $data['tempat_lahir'],
            $data['tanggal_lahir'],
            $data['no_telp_hp']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE customer SET nama_customer=:nama_customer, alamat=:alamat, tempat_lahir=:tempat_lahir, tanggal_lahir=:tanggal_lahir, no_telp_hp=:no_telp_hp WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama_customer', $data['nama_customer']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':tempat_lahir', $data['tempat_lahir']);
        $stmt->bindParam(':tanggal_lahir', $data['tanggal_lahir']);
        $stmt->bindParam(':no_telp_hp', $data['no_telp_hp']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM customer WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $row;
    }

}

$customer = new Customer($pdo);
