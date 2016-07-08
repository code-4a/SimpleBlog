<?php

class DBConnect
{
    private $dbh;
    private $className;

    public function __construct($className = 'stdClass')
    {
        $this->className = $className;
        $this->dbh = new PDO('sqlite:' . __DIR__ . '/../db/news.db');
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /**
     * Установка значения класса, возвращаемого запросами
     * @param string $className Название класса
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * Получение данных из БД
     * @param string $query Запрос к БД
     * @param array $params Параметры запроса
     * @return array Массив объектов типа $className
     */
    public function queryAll($query, $params = []) {
        $sth = $this->dbh->prepare($query);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }
    
     /**
     * Получение данных из БД
     * @param string $query Запрос к БД
     * @param array $params Параметры запроса
     * @return object Объект типа $className
     */
    public function queryOne($query, $params = []) {
        $res = $this->queryAll($query, $params);
        return empty($res) ? false : $res[0];
    }
    
    /**
     * Изменение данных в БД
     * @param string $query Запрос к БД
     * @param array $params Параметры запроса
     * @return bool
     */
    public function modify($query, $params = []) {
        $rec = $this->dbh->prepare($query);  
        return $rec->execute($params);
    }
    
    /**
     * Возвращает id последней вставленной записи
     * @return integer
     */
    public function lastInserId()
    {
        return $this->dbh->lastInsertId();
    }
}