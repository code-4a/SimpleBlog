<?php

session_start();

require_once __DIR__ . '/autoload.php';

$ctrlName = Router::findController();
$actName  = Router::findAction();

$ctrl = new $ctrlName;
$ctrl->$actName();


