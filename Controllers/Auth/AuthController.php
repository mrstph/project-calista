<?php

namespace Controllers\Auth;

use Controllers\Controller;

abstract class AuthController extends Controller
{
    public function checkEmail(string $email): bool
    {
       // check if the email adress is given and is in a valid formatch
        if (empty($email)){
           messages("l'adresse mail doit être renseignée");
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL) ){
            messages(" le format de l'adresse mail doit être valide");
        } 


        return true;
    }

    public function checkPassword(string $password): bool
    {
        if (empty($password)){
            messages("Le mot de passe doit être renseigné");
        }else if(!preg_match('/^(?=.*[A-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@])(?!.*[iIoO])\S{8,}$/',$password)) {
            messages(" le mot de passe doit être composé de 8 caractères minimum comprenant au moins une minuscule, une majuscule, un chiffre (0-9) et un caractère spécial.");
        }
        
        return true;
        
    }

    

}
