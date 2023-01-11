<?php

namespace Controllers\Auth;

use Models\User_app;

class RegisterController extends AuthController
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

        return $this->view('register.php');
    }

    /**
     * Login process
     *
     * @return null
     */
    public function register()
    {
        $this->redirectIfAuthenticated();

        $email = $_POST['email'];
        $pass = $_POST['password'];

        // Validation form
        if (!$this->checkEmail($email) or !$this->checkPassword($pass)) {
            messages('Identifiant vide'); // Add a message in session (see method in supports/helpers.php)
            return redirect('login.php');
        }

        // Get model user hydrated
        $user = User_app::findUserByCredentials($email, $pass);

        // Check user
        if (!$user) {
            messages('Identifiant inconnu'); // Add a message in session (see method in supports/helpers.php)
            return redirect('login.php');
        }

        // Define the auth information in session
        session('id', $user->id);

        // Response OK
        return redirect('login.php');
    }
}
