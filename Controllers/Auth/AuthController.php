<?php

namespace Controllers\Auth;

use Controllers\Controller;

abstract class AuthController extends Controller
{
    public function checkEmail(string $email): bool
    {
        return !empty($email) and strlen($email) > 5;
    }
    
    public function checkPassword(string $password): bool
    {
        return !empty($password) and strlen($password) > 4;
    }
}
