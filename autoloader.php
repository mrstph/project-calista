<?php

/*
 * "Super" Global
 */
const APP_BASE_PATH = __DIR__;

/*
 * Main
 */
require_once 'configs/database.php';
require_once 'supports/helpers.php';

/*
 * Controllers Loader
 */
require_once 'Controllers/Controller.php';
require_once 'Controllers/LoginController.php';
require_once 'Controllers/RegisterController.php';

/*
 * Models Loader
 */
require_once 'Models/Model.php';
require_once 'Models/User.php';
require_once 'Models/Board.php';
require_once 'Models/List_app.php';
require_once 'Models/Card.php';
