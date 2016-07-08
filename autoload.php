<?php

function __autoload($class)
{
    $dirs = ['/controllers/', '/models/', '/classes/'];
    
    foreach ($dirs as $dir) {
        $fullpath = __DIR__ . $dir . $class . '.php';
        if (file_exists($fullpath)) {
            require $fullpath;
            break;
        }
    }
}
