<?php

// Load App
require_once __DIR__ . '/../autoloader.php';

// Start Controller : NAMESPACE\CLASSNAME
$controller = new Controllers\Auth\LoginController();

// Call Controller method
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': // Only in GET (appel de page)
        $controller->index();
        break;
}
// END SCRIPT
