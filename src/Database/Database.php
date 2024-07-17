<?php
namespace App\Database;

class Database {
    private static ?Database $instance = null;
    private \PDO $pdo;

    private function __construct() {
        $config = require __DIR__ . '/../../config/config.php';
        $this->pdo = new \PDO($config['db']['dsn']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): ?Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): \PDO
    {
        return $this->pdo;
    }
}
