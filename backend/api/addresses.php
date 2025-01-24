<?php
include '../config/database.php';

// Implementar as operações CRUD para endereços

// Exemplo: Listar endereços de um cliente específico
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $client_id = $_GET['client_id'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM addresses WHERE client_id = ?");
    $stmt->execute([$client_id]);
    $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($addresses);
}

// Exemplo: Adicionar um novo endereço
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'] ?? '';
    $logradouro = $_POST['logradouro'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $cep = $_POST['cep'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO addresses (client_id, logradouro, numero, bairro, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$client_id, $logradouro, $numero, $bairro, $cidade, $estado, $cep]);

    echo json_encode(['success' => true]);
}
