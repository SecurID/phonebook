<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Controller\PhonebookController;
use App\Database\Database;

$pdo = Database::getInstance()->getConnection();
$controller = new PhonebookController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '') {
    $controller->showForm();
} elseif ($uri === '/add') {
    $controller->addEntry();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '404 Not Found';
}
