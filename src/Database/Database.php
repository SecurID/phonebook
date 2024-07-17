<?php
namespace App\Database;

/**
 * Class Database
 * @package App\Database
 *
 * Singleton class for database connection
 */
class Database {
    private static ?Database $instance = null;
    private \PDO $pdo;

    /**
     * @throws \PDOException
     */
    private function __construct() {
        $config = require __DIR__ . '/../../config/config.php';
        $this->pdo = new \PDO($config['db']['dsn']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return Database|null
     */
    public static function getInstance(): ?Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->pdo;
    }
}
