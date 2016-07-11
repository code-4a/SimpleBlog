<?php

class AppConfig {
    
    private static $instance;
    private $data = [];
    
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
    
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
            self::$instance->loadConfigData();
        }
        return self::$instance;
    }
    
    private function loadConfigData()
    {
        $arrOptions = Config::getAll();
        foreach ($arrOptions as $option) {
            $this->data[$option->key] = $option->value;
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    
    public function  __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return false;
    }
}
