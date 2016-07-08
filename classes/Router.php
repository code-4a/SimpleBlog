<?php

class Router {
    
    private static $defaultCtrl   = 'NewsCtrl';
    private static $defaultAction = 'All';
    
    public static function findController()
    {
        if (!empty($_GET['section'])) {
            
        }
        return self::$defaultCtrl;
    }
    
    public static function findAction()
    {
        if (isset($_GET['add'])) {
            return 'add';
        }
        if (isset($_GET['edit'])) {
            return 'edit';
        }
        if (isset($_GET['delete'])) {
            return 'delete';
        }
        if (isset($_GET['find'])) {
            return 'find';
        }
        if (!empty($_GET['id'])) {
            return 'One';
        }
        return self::$defaultAction;
    }
}
