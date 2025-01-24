<?php

interface IClientsService {
    public function getAllClients();
    public function getClientById($id);
    public function createClient($data);
    public function updateClient($id, $data);
    public function deleteClient($id);
}
