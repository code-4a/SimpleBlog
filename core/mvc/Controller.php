<?php

namespace app\core\mvc;

abstract class Controller {
    
    protected $viewPath;
    protected $modelName;
    protected $modelPath = 'app\\models\\';

    public function __construct() 
    {
        $arr = explode('\\', get_called_class());
        $baseName = substr(array_pop($arr), 0, -10);
        $this->modelName = $this->modelPath . $baseName;
        $this->viewPath = strtolower($baseName) . '/';
    }

    public function __call($name, $args) 
    {
        $this->showView();
    }
    
    public function showView($pageName, $args = [])
    {
        $view = new View();
        return $view->render($this->viewPath . $pageName, $args);
    }
    
    public function showError($pageName = '404')
    {
        $view = new View();
        return $view->render('errors/' . $pageName);
    }  
}
