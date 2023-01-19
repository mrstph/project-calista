<?php

require_once __DIR__.'/../../autoloader.php';

$controller = new Controllers\EnumerationsController();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $controller->add();
        break;
}
