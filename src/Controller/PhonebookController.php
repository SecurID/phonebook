<?php

namespace App\Controller;

use App\Database\Database;
use App\Model\Phonebook;

class PhonebookController
{
    public function addEntry(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lastname = trim($_POST['lastname']);
            $firstname = trim($_POST['firstname']);
            $phonenumber = trim($_POST['phonenumber']);

            if (empty($lastname) || empty($firstname) || empty($phonenumber)) {
                echo "All fields are required.";
                return;
            }

            if (!preg_match('/^\d+$/', $phonenumber)) {
                echo "Phone number must be digits only.";
                return;
            }

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