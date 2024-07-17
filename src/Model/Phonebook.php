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

}