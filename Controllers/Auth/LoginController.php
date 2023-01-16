<?php

namespace Controllers\Auth;

use Models\User_app;

class LoginController extends AuthController
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

        return $this->view('/login.php');
    }

    /**
     * Login process
     *
     * @return null
     */
    public function login()
    {
        $this->redirectIfAuthenticated();

        $email = $_POST['mail'];
        $pass = $_POST['password'];

        // Validation form
        if (!$this->checkEmail($email) or !$this->checkPassword($pass)) {
            messages('Identifiant vide'); // Add a message in session (see method in supports/helpers.php)
            return redirect('/login.php');
        }

        // Get model user hydrated
        $user = User_app::findUserByEmail($email);

        // Check user
        if (!$user) {
            messages('Identifiant inconnu'); // Add a message in session (see method in supports/helpers.php)
            return redirect('/login.php');
        }

        if (!password_verify($pass, $user->password_user_app)) {
            messages('Indentifiants incorrects');
            return redirect('/login.php');
        }

        // Define the auth information in session
        session('id', $user->id);

        // Response OK
        return redirect('/home.php');
    }

    /**
     * Logout process
     *
     * @return void
     */
    public function logout()
    {
        session_destroy();
        return redirect('/login.php');
    }
}
