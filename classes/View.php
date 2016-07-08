<?php

class View {
    
    protected $dir  = '/../views/';
    protected $data = [];

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

    public function show($template)
    {
        require __DIR__ . $this->dir . $template;
    }
}
