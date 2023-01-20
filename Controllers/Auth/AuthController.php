<?php

namespace Controllers\Auth;

use Controllers\Controller;

abstract class AuthController extends Controller
{
    public function checkEmail(string $email)
    {
        if (empty($email)) {
            messages("L'adresse mail doit être renseignée.");
        } else {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            if (!$email) {
                messages('Le format de l\'adresse email doit être valide.');
            }

            return $email;
        }
    }

    public function checkPassword(string $password): bool
    {
        if (empty($password)) {
            messages("Le mot de passe doit être renseigné.");
            return false;
        } else {
            $valid = preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $password);

            if (!$valid) {
                messages("'Le mot de passe doit être composé de 8 caractères minimum 
                comprenant au moins une minuscule, une majuscule,
                 un chiffre (0-9) et un caractère spécial.'");
                 return false;
            }
        }

        // if(!preg_match('/^(?=.*[A-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@])(?!.*[iIoO])\S{8,}$/',$password)) {
        //     messages(" le mot de passe doit être composé de 8 caractères minimum comprenant au moins une minuscule, une majuscule, un chiffre (0-9) et un caractère spécial.");
        // }

        return true;
    }
}
