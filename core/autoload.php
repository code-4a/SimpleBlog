<?php

function __autoload($class)
{
    $parts = explode('\\', $class);
    $parts[0] = __DIR__ . '/..';
    $path =  implode('/', $parts);
    require $path . '.php';
}



//function __autoload($class)
//{
//    $dirs = ['/controllers/', '/models/', '/classes/'];
//
//    foreach ($dirs as $dir) {
//        $fullpath = __DIR__ . $dir . $class . '.php';
//        if (file_exists($fullpath)) {
//            require $fullpath;
//            break;
//        }
//    }
//}
