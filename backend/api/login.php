<?php
include '../config/database.php';

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Aqui você deve implementar a lógica de autenticação
    // Exemplo: verificar se o usuário existe e a senha está correta

    // Retornar resposta
    echo json_encode(['success' => true, 'token' => 'your_token_here']);
} else {
    echo json_encode(['error' => 'Método não permitido']);
}
