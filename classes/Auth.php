<?php

class Auth {
    
    public function __construct() 
    {
        session_start();
    }
    
    public function isLoggedIn()
    {
        if (!empty($_SESSION['LoggedIn'])) {
            return true;
        }
        return false;
    }
    
    public function LogIn($login, $password)
    {
        if (false !== ($user = Users::getOneByLogin($login))) {
            $hash = hash('sha256', $password);
            if ($user->password == $hash) {
                return true;
            }
        }
        return false;
    }
    
    public function LogOut()
    {
        if (isset($_SESSION['LoggedIn'])) {
            unset($_SESSION['LoggedIn']);
        }
        session_destroy();
    }
    
}
