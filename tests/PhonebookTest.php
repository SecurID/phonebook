<?php
use PHPUnit\Framework\TestCase;

class PhonebookTest extends TestCase {
    private PDO $pdo;

    protected function setUp(): void {
        $config = require __DIR__ . '/../config/config.php';
        $this->pdo = new PDO($config['db']['dsn_testing']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS phonebook (
            id INTEGER PRIMARY KEY,
            lastname TEXT NOT NULL,
            firstname TEXT NOT NULL,
            phonenumber TEXT NOT NULL
        )");
    }

    protected function tearDown(): void {
        $this->pdo->exec("DROP TABLE phonebook");
    }

    public function testTrue() {
        $this->assertTrue(true);
    }
}
