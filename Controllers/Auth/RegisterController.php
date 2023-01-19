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

        $first_name_user_app = $_POST['firstname'];
        $last_name_user_app = $_POST['lastname'];
        $email_user_app = $_POST['mail'];
        $password_user_app = $_POST['password'];

        // Validation form
        if (!$this->checkEmail($email_user_app) or !$this->checkPassword($password_user_app) or !$this->checkPassword($first_name_user_app) or !$this->checkPassword($last_name_user_app)) {
            messages('Tous les champs doivent être remplis'); // Add a message in session (see method in supports/helpers.php)
            return redirect('register.php');
        }

        // // Get model user hydrated
        // $user = User_app::findUserByCredentials($email, $pass);

        // // Check user
        // if (!$user) {
        //     messages('Identifiant inconnu'); // Add a message in session (see method in supports/helpers.php)
        //     return redirect('login.php');
        // }

        // // Define the auth information in session
        // session('id', $user->id);

        // Response OK
        //User creation in DB
        $user = new User_app();
        $data = [
            'first_name_user_app' => $first_name_user_app,
            'email_user_app' => $email_user_app,
            'last_name_user_app' => $last_name_user_app,
            'password_user_app' => $password_user_app
        ];

        $user->createUser($data);
        
        messages('Votre compte a été créé avec succès !');
        return redirect('login.php');
    }
}
