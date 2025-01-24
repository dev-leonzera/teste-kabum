<?php

interface IAddressesService {
    public function getAllAddresses();
    public function getAddressById($id);
    public function createAddress($data);
    public function updateAddress($id, $data);
    public function deleteAddress($id);
}
