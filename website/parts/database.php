<?php

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

class Database {
    public $connection;
    public $statement;
    public function __construct() {
        $dsn = 'mysql:'.http_build_query([
            'host' => $_ENV['MySQL_DB_HOST'],
            'port' => 3306,
            'dbname' => $_ENV['MySQL_DB_NAME'],
            'charset' => 'utf8mb4'
        ], '', ';');
        $this->connection = new PDO($dsn, $_ENV['MySQL_DB_USER_NAME'], $_ENV['MySQL_DB_PASSWORD'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }
    public function get() {
        return $this->statement->fetchAll();
    }

    public function find() {
        return $this->statement->fetch();
    }
    public function findOrFail() {
        $result = $this->find();
        if (! $result) {
            // abort();
            http_response_code(404);
            die();
        }

        return $result;
    }
}
