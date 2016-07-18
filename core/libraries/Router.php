<?php

namespace app\core\libraries;

class Router {
        
    private $controller = 'PostsController';
    private $action     = 'all';
    
    public function __construct() 
    {
        $this->parseRouteString();
    }
    
    private function parseRouteString()
    {
        if (empty($_GET['r'])) {
            return;
        }
        $arr = explode('-', strtolower($_GET['r']));
        if (!empty($arr[0])) {
            $this->controller = ucfirst($arr[0]) . 'Controller';
        }
        if (!empty($arr[1])) {
            $this->action = $arr[1];
        }
        
    }

    public function getController()
    {
        return $this->controller;
    }
    
    public function getAction()
    {
        return $this->action;
    }

    public static function getIntParam($name, $default = 0)
    {
        if (!empty($_GET['id'])) {
            return (int)$_GET['id'];
        } else {
            return $default;
        }
    }
    
}
