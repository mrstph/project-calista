<?php

require_once __DIR__ . '/../../autoloader.php';

$controller = new Controllers\BoardsController();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $controller->show();
        break;
}
