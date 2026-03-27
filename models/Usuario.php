<?php

require_once __DIR__ . '/../config/database.php';

class Usuario {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    public function create($nombre, $apellido, $correo, $celular) {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, celular) VALUES (:nombre, :apellido, :correo, :celular)");
        $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindValue(":apellido", $apellido, PDO::PARAM_STR);
        $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindValue(":celular", $celular, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    public function update($id, $nombre, $apellido, $correo, $celular) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, correo = :correo, celular = :celular WHERE id = :id");
        $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindValue(":apellido", $apellido, PDO::PARAM_STR);
        $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindValue(":celular", $celular, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function existeCorreo($correo, $excludeId = null) {
        if ($excludeId) {
            $stmt = $this->conn->prepare("SELECT id FROM usuarios WHERE correo = :correo AND id != :excludeId");
            $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
            $stmt->bindValue(":excludeId", $excludeId, PDO::PARAM_INT);
        } else {
            $stmt = $this->conn->prepare("SELECT id FROM usuarios WHERE correo = :correo");
            $stmt->bindValue(":correo", $correo, PDO::PARAM_STR);
        }
        
        $stmt->execute();
        
        return $stmt->fetch() !== false;
    }
}
