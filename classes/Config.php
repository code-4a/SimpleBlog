<?php

class Config {
    
    private static $instance;
    private $data;
    
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
    
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Config();
            //self::$instance
        }
        return self::$instance;
    }
    
    public function get()
    {
        //
    }
}
