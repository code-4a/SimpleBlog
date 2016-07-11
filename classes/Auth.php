<?php

class Auth {
    
    public static function isLogged()
    {
        return (empty($_SESSION['LoggedIn'])) ? false : true;
    }
    
    public static function LogIn($login, $password)
    {
        if (false !== ($user = Users::getOneByLogin($login))) {
            $hash = hash('sha256', $password);
            if ($user->password == $hash) {
                return true;
            }
        }
        return false;
    }
    
    public static function LogOut()
    {
        if (isset($_SESSION['LoggedIn'])) {
            unset($_SESSION['LoggedIn']);
        }
        session_destroy();
    }
    
}
