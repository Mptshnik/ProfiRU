<?php

namespace App\Kernel\Database;

use PDO;

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $this->connect();
    }

    public function first(string $table, array $conditions = []): ?array
    {
        $where = '';

        if (count($conditions) > 0) {
            $where = 'WHERE '.implode(' AND ', array_map(fn ($field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = "SELECT * FROM $table $where LIMIT 1";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($conditions);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function insert(string $table, array $data):int|false
    {
        $fields = array_keys($data);

        $columns = implode(',', $fields);
        $binds = implode(',', array_map(fn($field)=>":$field", $fields));

        $sql = "INSERT INTO $table ($columns) values ($binds)";

        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute($data);
        }
        catch (\PDOException $e){
            echo "Database connection failed " . $e->getMessage();

            return false;
        }

        return (int)$this->pdo->lastInsertId();
    }

    public function connect(){
        $db_name = ENV['DB_DATABASE'];
        $host = ENV['DB_HOST'];
        $port = ENV['DB_PORT'];
        $username = ENV['DB_USERNAME'];
        $password = ENV['DB_PASSWORD'];

        try {
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$db_name", "$username", "$password");
        }
        catch (\PDOException $e){
            exit("Database connection failed " . $e->getMessage());
        }
    }
}