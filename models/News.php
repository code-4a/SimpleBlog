<?php

require_once __DIR__ . '/../autoload.php';

class News 
{
   public $id;
   public $caption;
   public $text;
    
    public static function getAll()
    {
        $db = new DBConnect(get_called_class());
        return $db->queryAll('SELECT * FROM News');
    }
    
    public static function getOne($id)
    {
        $db = new DBConnect(get_called_class());
        $query = 'SELECT * FROM News WHERE id = :id';
        return $db->queryOne($query, [':id' => $id]);
    }
    
    public static function findAllByField($field, $value)
    {
        $db = new DBConnect(get_called_class());
        $query = 'SELECT caption, id FROM News WHERE '. $field . ' LIKE :v';
        return $db->queryAll($query, [':v' => '%' . $value . '%']);
    }

    protected function add()
    {
        $db = new DBConnect();
        $query = 'INSERT INTO News VALUES(NULL, :c, :t)';
        $params = [':c' => $this->caption, ':t' => $this->text];
        $db->modify($query, $params);
        $this->id = $db->lastInserId();
    }
    
    protected function  update()
    {
        $db = new DBConnect();
        $query = 'UPDATE News SET caption = :c, text = :t WHERE id = :id';
        $params = [':c' => $this->caption,
                   ':t' => $this->text,
                   ':id' => $this->id];
        $db->modify($query, $params);
    }
    
    public function save()
    {
        if ($this->id > 0) {
            $this->update();
        } else {
            $this->add();
        }
    }

    public function delete()
    {
        $db = new DBConnect();
        $query = 'DELETE FROM News WHERE id = :id';
        $db->modify($query, [':id' => $this->id]);
    }
}