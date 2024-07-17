<?php

use App\Model\Phonebook;
use PHPUnit\Framework\TestCase;

class PhonebookTest extends TestCase {
    private PDO $pdo;
    protected Phonebook $phonebook;

    protected function setUp(): void {
        $config = require __DIR__ . '/../config/config.php';
        $this->pdo = new PDO($config['db']['dsn_testing']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS phonebook (
            id INTEGER PRIMARY KEY,
            lastname TEXT NOT NULL,
            firstname TEXT NOT NULL,
            phonenumber TEXT NOT NULL,
            lastname_T9 INT NOT NULL,
            firstname_T9 INT NOT NULL   
        )");

        // Insert sample data
        $this->pdo->exec("INSERT INTO phonebook (firstname, lastname, phonenumber, firstname_t9, lastname_t9) VALUES
            ('Pia', 'Müller', '123456789', '742', '685537'),
            ('Anna', 'Meyer', '987654321', '2662', '63937'),
            ('Max', 'Mustermann', '123456789', '629', '6878377266'),
            ('John', 'Goodman', '465783920', '5646', '4663'),
            ('Mary', 'Goodman', '466372839', '6279', '4663'),
            ('Sam', 'Rahmen', '555123456', '726', '724636'),
            ('Téo', 'Marqués', '555987654', '836', '6277837')
        ");

        $this->phonebook = new Phonebook($this->pdo);
    }

    protected function tearDown(): void {
        $this->pdo->exec("DROP TABLE phonebook");
    }

    public function testTrue() {
        $this->assertTrue(true);
    }

    public function testAddEntryToPhonebook()
    {
        $phonebook = new Phonebook($this->pdo);
        $phonebook->addEntry('Doe', 'John', '1234567890');
        $stmt = $this->pdo->exec("SELECT * FROM phonebook WHERE lastname='Doe' AND firstname='John' AND phonenumber='1234567890'");
        $this->assertEquals(1, $stmt);
    }

    public function testSearchEntriesExactMatchFirstName()
    {
        $results = $this->phonebook->searchEntries('742');
        $expected = [['firstname' => 'Pia', 'lastname' => 'Müller', 'phonenumber' => '123456789']];
        $this->assertEquals($expected, $results);
    }

    public function testSearchEntriesPartialMatchLastName()
    {
        $results = $this->phonebook->searchEntries('639');
        $expected = [['firstname' => 'Anna', 'lastname' => 'Meyer', 'phonenumber' => '987654321']];
        $this->assertEquals($expected, $results);
    }

    public function testSearchEntriesExactMatchPhoneNumber()
    {
        $results = $this->phonebook->searchEntries('123');
        $expected = [
            ['firstname' => 'Pia', 'lastname' => 'Müller', 'phonenumber' => '123456789'],
            ['firstname' => 'Max', 'lastname' => 'Mustermann', 'phonenumber' => '123456789']];
        $this->assertEquals($expected, $results);
    }

    public function testSearchEntriesNoMatches()
    {
        $results = $this->phonebook->searchEntries('999');
        $expected = [];
        $this->assertEquals($expected, $results);
    }

    public function testSearchEntriesMultipleMatches()
    {
        $results = $this->phonebook->searchEntries('4663');
        $expected = [
            ['firstname' => 'John', 'lastname' => 'Goodman', 'phonenumber' => '465783920'],
            ['firstname' => 'Mary', 'lastname' => 'Goodman', 'phonenumber' => '466372839']
        ];
        $this->assertEquals($expected, $results);
    }
}
