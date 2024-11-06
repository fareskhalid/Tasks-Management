<?php

namespace TaskManagementSystem\Core;


abstract class Model
{
    protected \PDO $db;
    protected $table;


    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    abstract public function add(array $data): bool;

    abstract public function delete(int $id): bool;

    public function all(): array
    {
        $q = 'SELECT * FROM ' . $this->table;
        $stmt = $this->db->prepare($q);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
