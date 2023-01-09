<?php

namespace Controllers;

use Models\User;

class RegisterController extends Controller
{
    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display Register form view
     *
     * @return null|void
     */
    public function index()
    {
        $this->redirectIfAuthenticated();

        $this->view('register.php');
    }
}
