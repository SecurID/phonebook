<?php

namespace App\Model;

use App\Helper\T9Helper;

class Phonebook
{
    private \PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Adds an Entry to the database
     *
     * @param $lastname string The Lastname of the entry
     * @param $firstname string The Firstname of the entry
     * @param $phonenumber string The Phonenumber of the entry
     * @return void
     */
    public function addEntry($lastname, $firstname, $phonenumber): void
    {
        // It's faster if the T9 string is already generated while adding and stored in the database
        $lastname_t9 = T9Helper::generateT9Sequence($lastname);
        $firstname_t9 = T9Helper::generateT9Sequence($firstname);

        $query = $this->pdo->prepare('INSERT INTO 
            phonebook (lastname, firstname, phonenumber, lastname_t9, firstname_t9) 
            VALUES 
            (:lastname, :firstname, :phonenumber, :lastname_t9, :firstname_t9)
        ');
        $query->execute(compact('lastname', 'firstname', 'phonenumber', 'lastname_t9', 'firstname_t9'));
    }

    /**
     * Searches for the Entries in the database using the T9 search
     *
     * @param $digits
     * @return array
     */
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