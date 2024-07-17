<?php

namespace App\Model;

class Phonebook
{
    private \PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addEntry($lastname, $firstname, $phonenumber): void
    {
        $query = $this->pdo->prepare('INSERT INTO phonebook (lastname, firstname, phonenumber) VALUES (:lastname, :firstname, :phonenumber)');
        $query->execute(compact('lastname', 'firstname', 'phonenumber'));
    }

    public function searchEntries($digits): array
    {
        return [[
            'lastname' => 'Doe',
            'firstname' => 'John',
            'phonenumber' => '1234567890'
        ], [
            'lastname' => 'Doe',
            'firstname' => 'Melanie',
            'phonenumber' => '1234567890'
        ]];
    }
}