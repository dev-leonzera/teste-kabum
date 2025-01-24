<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Implementing authentication logic
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Authentication successful, generate a token (for simplicity, using a placeholder here)
        $token = bin2hex(random_bytes(16)); // Generate a random token
        echo json_encode(['success' => true, 'token' => $token]);
    } else {
        // Authentication failed
        echo json_encode(['error' => 'Invalid username or password']);
    }
} else {
    echo json_encode(['error' => 'Método não permitido']);
}
