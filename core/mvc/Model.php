<?php

namespace app\core\mvc;
use app\core\libraries\DBConnect;

abstract class Model {
    
    protected static function getClassName()
    {
        $class = \get_called_class();
        $arr = explode('\\', $class);
        $baseName = array_pop($arr);
        return [$class, $baseName];
    }

    protected static function SqlSelect($fields = '*', $filter = '', $params = [])
    {
        list($class, $baseName) = self::getClassName();
        $db = new DBConnect($class);
        $query = 'SELECT ' . $fields . ' FROM '. $baseName;
        if ($filter) {
            $query .= ' WHERE ' . $filter;
        }
        return $db->queryAll($query, $params);
    }
    
    protected static function SqlInsert($fields, $params = [])
    {
        list($class, $baseName) = self::getClassName();
        $db = new DBConnect($class);
        $query = 'INSERT INTO ' . $baseName . ' VALUES(' . $fields . ')';
        $db->modify($query, $params);
        return $db->lastInserId();
    }
    
    protected static function SqlUpdate($fields, $filter = '', $params = [])
    {
        list($class, $baseName) = self::getClassName();
        $db = new DBConnect($class);
        $query = 'UPDATE ' . $baseName . ' SET ' . $fields . ' WHERE ' . $filter;
        $db->modify($query, $params);
    }
    
    protected static function SqlDelete($fields, $params = [])
    {
        list($class, $baseName) = self::getClassName();
        $db = new DBConnect($class);
        $query = 'DELETE FROM ' . $baseName . ' WHERE ' . $fields;
        $db->modify($query, $params);
    }
}
