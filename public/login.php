<?php

// Load Appw
require_once __DIR__ . '/../autoloader.php';

// Start Controller : NAMESPACE\CLASSNAME
$controller = new Controllers\Auth\LoginController();

// Call Controller method
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': // If GET (appel de page)
        $controller->index();
        break;
    case 'POST': // If POST (fomulaire)
        $controller->login();
        break;
}
// END SCRIPT
