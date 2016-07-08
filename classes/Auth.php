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
    
    public function LogIn($user, $password)
    {
        //
    }
    
    public function LogOut()
    {
        if (isset($_SESSION['LoggedIn'])) {
            unset($_SESSION['LoggedIn']);
        }
        session_destroy();
    }
    
}
