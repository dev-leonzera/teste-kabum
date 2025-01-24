<?php
include '../repositories/IClientsRepository.php';
include '../repositories/clientsRepository.php';

class ClientsService implements IClientsService {
    private $repository;

    public function __construct($pdo) {
        $this->repository = new ClientsRepository($pdo);
    }

    public function getAllClients() {
        return $this->repository->getAllClients();
    }

    public function getClientById($id) {
        return $this->repository->getClientById($id);
    }

    public function createClient($data) {
        return $this->repository->createClient($data);
    }

    public function updateClient($id, $data) {
        return $this->repository->updateClient($id, $data);
    }

    public function deleteClient($id) {
        return $this->repository->deleteClient($id);
    }
}
