<?php

namespace app\core\mvc;

class View {
    
    protected static $dir  = '/../../views/';
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

    public function render($template, $args = [])
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        foreach ($args as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require __DIR__ . self::$dir . $template . '.php';
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }
    
    public static function showPage($page)
    {
        require __DIR__ . self::$dir . '/base/header.php';
        echo $page;
        require __DIR__ . self::$dir . '/base/footer.php';
    }
}
