<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Controller\PhonebookController;

$controller = new PhonebookController();

// Default Router implementation. Could be a more suitable router for a bigger project
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '') {
    $controller->showForm();
} elseif ($uri === '/add') {
    $controller->addEntry();
} elseif ($uri === '/search') {
    $controller->searchEntries();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '404 Not Found';
}
