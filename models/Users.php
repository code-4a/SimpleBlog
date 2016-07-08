<?php

require_once __DIR__ . '/../autoload.php';

class Users 
{
    public $id;
    public $login;
    public $password;
    
    public static function getOneByLogin($login)
    {
        $db = new DBConnect(get_called_class());
        $query = 'SELECT * FROM Users WHERE login = :login';
        return $db->queryOne($query, [':login' => $login]);
    }
}