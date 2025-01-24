<?php
include '../config/database.php';
include '../services/clientsService.php';

$clientsService = new ClientsService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Retrieve a specific client by ID
        $client = $clientsService->getClientById($_GET['id']);
        echo json_encode($client);
    } else {
        // Retrieve all clients
        $clients = $clientsService->getAllClients();
        echo json_encode($clients);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $rg = $_POST['rg'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    $data = [
        'nome' => $nome,
        'data_nascimento' => $data_nascimento,
        'cpf' => $cpf,
        'rg' => $rg,
        'telefone' => $telefone
    ];

    $clientsService->createClient($data);
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'] ?? '';
    $data = [
        'nome' => $put_vars['nome'] ?? '',
        'data_nascimento' => $put_vars['data_nascimento'] ?? '',
        'cpf' => $put_vars['cpf'] ?? '',
        'rg' => $put_vars['rg'] ?? '',
        'telefone' => $put_vars['telefone'] ?? ''
    ];

    $clientsService->updateClient($id, $data);
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $delete_vars);
    $id = $delete_vars['id'] ?? '';

    $clientsService->deleteClient($id);
    echo json_encode(['success' => true]);
}
