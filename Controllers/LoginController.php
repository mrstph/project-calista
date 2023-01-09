<?php

namespace Controllers;

use Models\User;

class LoginController extends Controller
{
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display login form view
     *
     * @return null|void
     */
    public function index()
    {
        $this->redirectIfAuthenticated();

        $this->view('login.php');
    }

    /**
     * Login process
     *
     * @return null
     */
    public function login()
    {
        $this->redirectIfAuthenticated();

        $email = $_POST['email'];
        $pass = $_POST['password'];

        // Validation form
        if (!$email or !$pass) {
            messages('Identifiant vide'); // Add a message in session (see method in supports/helpers.php)
            return redirect('login.php');
        }

        // Get model user hydrated
        $user = User::findUserByCredentials($email, $pass);

        // Check user
        if (!$user) {
            messages('Identifiant inconnu'); // Add a message in session (see method in supports/helpers.php)
            return redirect('login.php');
        }

        // Define the auth information in session
        session('id', $user->id);

        // Response OK
        return redirect('home.php');
    }

    /**
     * Logout process
     *
     * @return void
     */
    public function logout()
    {
        unset(session()['id']);
        session_destroy();
        return redirect('index.php');
    }
}
