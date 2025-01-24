<?php
include '../config/database.php';
include '../services/addressesService.php';

$addressesService = new AddressesService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Retrieve a specific address by ID
        $address = $addressesService->getAddressById($_GET['id']);
        echo json_encode($address);
    } else {
        // Retrieve all addresses
        $addresses = $addressesService->getAllAddresses();
        echo json_encode($addresses);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'] ?? '';
    $street = $_POST['street'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $zip = $_POST['zip'] ?? '';

    $data = [
        'client_id' => $client_id,
        'street' => $street,
        'city' => $city,
        'state' => $state,
        'zip' => $zip
    ];

    $addressesService->createAddress($data);
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'] ?? '';
    $data = [
        'client_id' => $put_vars['client_id'] ?? '',
        'street' => $put_vars['street'] ?? '',
        'city' => $put_vars['city'] ?? '',
        'state' => $put_vars['state'] ?? '',
        'zip' => $put_vars['zip'] ?? ''
    ];

    $addressesService->updateAddress($id, $data);
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $delete_vars);
    $id = $delete_vars['id'] ?? '';

    $addressesService->deleteAddress($id);
    echo json_encode(['success' => true]);
}
