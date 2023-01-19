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

        return $this->view('/register.php');
    }

    /**
     * Login process
     *
     * @return null
     */
    public function register()
    {
        // $this->redirectIfAuthenticated();

        $first_name_user_app = ucfirst(strtolower($_POST['firstname']));
        $last_name_user_app = ucfirst(strtolower($_POST['lastname']));
        $email_user_app = $_POST['mail'];
        $password_user_app = $_POST['password'];

        // $password_user_app = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        //Validation form
        // dd($this->checkPassword($password_user_app));
        if(!$this->checkEmail($email_user_app) or !$this->checkPassword($password_user_app)){
            return redirect('/register.php');

        }

        //Get unique user
        $UserUnique = User_app::findUserByEmail($email_user_app);
        
        //check if user is unique

        if ($UserUnique){
            messages('Cette adresse e-mail est déjà utilisée');
            return redirect('/register.php');
        }

        $password_user_app = password_hash($_POST['password'], PASSWORD_DEFAULT);


        
        // Response OK
        //User creation in DB
        $user = new User_app();
        $data = [
            'first_name_user_app' => $first_name_user_app,
            'last_name_user_app' => $last_name_user_app,
            'email_user_app' => $email_user_app,
            'password_user_app' => $password_user_app
        ];
        

        $user->createUser($data);

         messages('Votre compte a été créé avec succès !', 'alert-success');
         return redirect('/login.php');
    }
}