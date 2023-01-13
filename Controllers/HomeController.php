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
        $user = User_app::find(self::getCurrentUserId()); // Return a User class (model) hydrated.
        $boards = $user->boards(); // Return a array of array

        return $this->view('home.php', [
            // 'user' => $user,
            'boards' => $boards,
        ]);
    }
}
