<?php

namespace Controllers;

use Models\User_app;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        // Vérifie si l'utilisateur est connecté sinon redirection
        $this->redirectIfNotAuthenticated();

        parent::__construct();
    }

    /**
     * Affiche une vue.
     * "index" conventionnellement: la méthode par défaut d'appel d'un contrôleur
     *
     * @return null|void
     */
    public function index()
    {
        //don't need user and boards anymore because user is sent through function View
        return $this->view('/home.php', []);
    }
}
