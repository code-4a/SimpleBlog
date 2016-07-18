<?php

session_start();
require_once __DIR__ . '/core/autoload.php';

use app\core\libraries\Router;
use app\core\mvc\View;


$router = new Router();
$ctrlName = 'app\controllers\\' . $router->getController();
$actName  = $router->getAction();


try {
    $ctrl = new $ctrlName;
    $page = $ctrl->$actName();
    View::showPage($page);
} catch (Exception $e) {
    $view = new View();
    $page = $view->render('errors/other', ['e' => $e]);
    View::showPage($page);
}


