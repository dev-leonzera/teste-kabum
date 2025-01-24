<?php
include '../repositories/IAddressesRepository.php';
include '../repositories/addressesRepository.php';

class AddressesService implements IAddressesService {
    private $repository;

    public function __construct($pdo) {
        $this->repository = new AddressesRepository($pdo);
    }

    public function getAllAddresses() {
        return $this->repository->getAllAddresses();
    }

    public function getAddressById($id) {
        return $this->repository->getAddressById($id);
    }

    public function createAddress($data) {
        return $this->repository->createAddress($data);
    }

    public function updateAddress($id, $data) {
        return $this->repository->updateAddress($id, $data);
    }

    public function deleteAddress($id) {
        return $this->repository->deleteAddress($id);
    }
}
