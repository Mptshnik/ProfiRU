<?php

namespace App\Kernel\Database;

use PDO;

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    public function connect(){
        $db = include APP_PATH.'/config/config.php';

        $db_name = $db['DB_DATABASE'];
        $host = $db['DB_HOST'];
        $port = $db['DB_PORT'];
        $username = $db['DB_USERNAME'];
        $password = $db['DB_PASSWORD'];

        try {
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$db_name", "$username", "$password");
        }
        catch (\PDOException $e){
            exit("Database connection failed " . $e->getMessage());
        }
    }
}