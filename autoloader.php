<?php

/*
 * "Super" Global
 */
const APP_BASE_PATH = __DIR__;

/*
 * Configs
 */
require_once 'configs/app.php';
require_once 'configs/database.php';

// Force debug
if (APP_ENVIRONNEMENT !== 'production') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

/*
 * Mains
 */
require_once 'supports/helpers.php';

/*
 * Models Loader
 */
require_once 'Models/Model.php';
require_once 'Models/User_app.php';
require_once 'Models/Board.php';
require_once 'Models/List_app.php';
require_once 'Models/Card.php';

/*
 * Controllers Loader
 */

// Main
require_once 'Controllers/Controller.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/BoardsController.php';
require_once 'Controllers/List_appController.php';
require_once 'Controllers/User_appController.php';
require_once 'Controllers/CardController.php';

// Auth
require_once 'Controllers/Auth/AuthController.php';
require_once 'Controllers/Auth/LoginController.php';
require_once 'Controllers/Auth/RegisterController.php';
