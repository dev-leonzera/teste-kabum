<?php
include '../config/database.php';
include '../interfaces/IClientsRepository.php';

class ClientsRepository implements IClientsRepository {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllClients() {
        $stmt = $this->pdo->query("SELECT * FROM clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClientById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createClient($data) {
        $stmt = $this->pdo->prepare("INSERT INTO clients (nome, data_nascimento, cpf, rg, telefone) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$data['nome'], $data['data_nascimento'], $data['cpf'], $data['rg'], $data['telefone']]);
    }

    public function updateClient($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE clients SET nome = ?, data_nascimento = ?, cpf = ?, rg = ?, telefone = ? WHERE id = ?");
        return $stmt->execute([$data['nome'], $data['data_nascimento'], $data['cpf'], $data['rg'], $data['telefone'], $id]);
    }

    public function deleteClient($id) {
        $stmt = $this->pdo->prepare("DELETE FROM clients WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
