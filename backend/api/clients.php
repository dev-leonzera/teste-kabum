<?php
include '../config/database.php';

// Implementar as operações CRUD para clientes

// Exemplo: Listar todos os clientes
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM clients");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($clients);
}

// Exemplo: Criar um novo cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $rg = $_POST['rg'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO clients (nome, data_nascimento, cpf, rg, telefone) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $data_nascimento, $cpf, $rg, $telefone]);

    echo json_encode(['success' => true]);
}
