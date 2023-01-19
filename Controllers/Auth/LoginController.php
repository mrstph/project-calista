<?php

namespace Controllers\Auth;

use Models\User_app;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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
        // $password_user_app = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // $xx = password_verify($pass,$password_user_app);
        
        // Validation form
        if (!$this->checkEmail($email) or !$this->checkPassword($pass)) {
            // messages('Identifiant vide'); // Add a message in session (see method in supports/helpers.php)
            
            return redirect('/login.php');
         }
        

        

        // Get model user hydrated
        
        
        $user = User_app::findUserByEmail($email);
       
        // Check user
        if (!$user) {
            messages('Identifiant(s) inconnu(s)'); // Add a message in session (see method in supports/helpers.php)
            return redirect('/login.php');
        }

        if(!password_verify($pass, $user->password_user_app)){
            messages('Mot de passe incorrect');
            return redirect('/login.pphp');
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