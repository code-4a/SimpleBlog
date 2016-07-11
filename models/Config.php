<?php

require_once __DIR__ . '/../autoload.php';

class Config {
    
    public $key;
    public $value;


    public static function getAll()
    {
        $db = new DBConnect(get_called_class());
        return $db->queryAll('SELECT key, value FROM Config');
    }
}
