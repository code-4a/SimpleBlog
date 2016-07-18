<?php

namespace app\models;

use app\core\mvc\Model;
use app\core\libraries\DBConnect;

class Posts extends Model 
{
   public $id;
   public $caption;
   public $text;
    
    public static function getAll()
    {
        return self::SqlSelect();
    }
    
    public static function getOne($id)
    {
        return self::SqlSelect('*', 'id = :id', [':id' => $id]);
    }
    
    public static function findAllByField($field, $value)
    {
        $params = [':v' => '%' . $value . '%'];
        return self::SqlSelect('caption, id', $field . ' LIKE :v', $params);
    }

    protected function add()
    {
        $params = [':c' => $this->caption, ':t' => $this->text];
        $this->id = self::SqlInsert('NULL, :c, :t', $params);
    }
    
    protected function  update()
    {
        $params = [':c' => $this->caption,
                   ':t' => $this->text,
                   ':id' => $this->id];
        self::SqlUpdate('caption = :c, text = :t', 'id = :id', $params);
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
        self::SqlDelete('id = :id', [':id' => $this->id]);
    }
}