<?php

// Load App
require_once __DIR__.'/../autoloader.php';

// Start Controller : NAMESPACE\CLASSNAME
$controller = new Controllers\Auth\LoginController();

// Call Controller method
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST': // Only in POST (formulaire)
        $controller->logout();
        break;
}
// END SCRIPT
