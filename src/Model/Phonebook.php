<?php

namespace App\Model;

use App\Helper\T9Search;

class Phonebook
{
    private \PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addEntry($lastname, $firstname, $phonenumber): void
    {
        $lastname_t9 = T9Search::generateT9Sequence($lastname);
        $firstname_t9 = T9Search::generateT9Sequence($firstname);

        $query = $this->pdo->prepare('INSERT INTO 
            phonebook (lastname, firstname, phonenumber, lastname_t9, firstname_t9) 
            VALUES 
            (:lastname, :firstname, :phonenumber, :lastname_t9, :firstname_t9)
        ');
        $query->execute(compact('lastname', 'firstname', 'phonenumber', 'lastname_t9', 'firstname_t9'));
    }

    public function searchEntries($digits): array
    {
        $stmt = $this->pdo->prepare("SELECT firstname, lastname, phonenumber 
            FROM phonebook 
            WHERE firstname_t9 LIKE ? 
               OR lastname_t9 LIKE ? 
               OR phonenumber LIKE ?");
        $likeInput = $digits . '%';
        $stmt->execute([$likeInput, $likeInput, $likeInput]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}