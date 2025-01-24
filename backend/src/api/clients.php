<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Retrieve a specific client by ID
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($client);
    } else {
        // Retrieve all clients
        $stmt = $pdo->query("SELECT * FROM clients");
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($clients);
    }
}

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

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'] ?? '';
    $nome = $put_vars['nome'] ?? '';
    $data_nascimento = $put_vars['data_nascimento'] ?? '';
    $cpf = $put_vars['cpf'] ?? '';
    $rg = $put_vars['rg'] ?? '';
    $telefone = $put_vars['telefone'] ?? '';

    $stmt = $pdo->prepare("UPDATE clients SET nome = ?, data_nascimento = ?, cpf = ?, rg = ?, telefone = ? WHERE id = ?");
    $stmt->execute([$nome, $data_nascimento, $cpf, $rg, $telefone, $id]);

    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $delete_vars);
    $id = $delete_vars['id'] ?? '';

    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(['success' => true]);
}
