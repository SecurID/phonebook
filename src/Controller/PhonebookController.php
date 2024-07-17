<?php

namespace App\Controller;

use App\Database\Database;
use App\Model\Phonebook;

class PhonebookController
{
    private Phonebook $model;

    public function __construct()
    {
        $this->model = new Phonebook(Database::getInstance()->getConnection());
    }

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

            $this->model->addEntry($lastname, $firstname, $phonenumber);
            header('Location: /');
        }
    }

    public function searchEntries(): void
    {
        $entries = [];

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])){
            $digits = trim($_GET['search']);
            $entries = $this->model->searchEntries($digits);
        }

        include __DIR__ . '/../View/phonebook_table.php';
    }

    public function showForm(): void
    {
        include __DIR__ . '/../View/phonebook_form.php';
    }
}