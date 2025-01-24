<?php
include '../config/database.php';
include '../interfaces/IAddressesRepository.php';

class AddressesRepository implements IAddressesRepository {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllAddresses() {
        $stmt = $this->pdo->query("SELECT * FROM addresses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAddressById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM addresses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAddress($data) {
        $stmt = $this->pdo->prepare("INSERT INTO addresses (client_id, street, city, state, zip) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$data['client_id'], $data['street'], $data['city'], $data['state'], $data['zip']]);
    }

    public function updateAddress($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE addresses SET client_id = ?, street = ?, city = ?, state = ?, zip = ? WHERE id = ?");
        return $stmt->execute([$data['client_id'], $data['street'], $data['city'], $data['state'], $data['zip'], $id]);
    }

    public function deleteAddress($id) {
        $stmt = $this->pdo->prepare("DELETE FROM addresses WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
