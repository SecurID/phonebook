<?php

namespace App\Controller;

use App\Database\Database;
use App\Model\Phonebook;

class PhonebookController
{
    public function addEntry(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $phonenumber = $_POST['phonenumber'];

            $model = new Phonebook(Database::getInstance()->getConnection());
            $model->addEntry($lastname, $firstname, $phonenumber);
            header('Location: /');
        }
    }

    public function showForm(): void
    {
        include __DIR__ . '/../View/phonebook_form.php';
    }
}