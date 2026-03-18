<?php

namespace Iamdmc\PhpAddressBook\Repositories;

use Iamdmc\PhpAddressBook\Database;
use PDO;

class ContactRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM contacts");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM contacts WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO contacts
            (first_name, last_name, email, phone)
            VALUES
            (:first_name, :last_name, :email, :phone)
        ");

        return $stmt->execute([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }

    public function update(int $id, array $data)
    {
        $stmt = $this->db->prepare("
            UPDATE contacts
            SET
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                phone = :phone
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }

    public function delete(int $id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM contacts WHERE id = :id"
        );

        return $stmt->execute(['id' => $id]);
    }

    public function search(string $query): array
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT * FROM contacts
            WHERE first_name LIKE :query
            OR last_name LIKE :query
            OR email LIKE :query
        ");

        $stmt->execute([
            'query' => '%' . $query . '%'
        ]);

        return $stmt->fetchAll();
    }
}