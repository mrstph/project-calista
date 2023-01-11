<?php

namespace Controllers;

class WelcomeController extends Controller
{
    /**
     * WelcomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Affiche une vue.
     * "index" (convention d'écriture) Méthode par défaut d'appel d'un controleur
     *
     * @return null|void
     */
    public function index()
    {
        return $this->view('index.php');
    }
}
