<?php

namespace app\controllers;

// 37 сао
// мин культ

use app\core\mvc\Controller;
use app\core\libraries\Router;
use app\models\Posts;

class PostsController extends Controller {
    
    public function all()
    {
        return $this->showView('all', ['items' => Posts::getAll()]);
    }
    
    public function one()
    {
        $id = Router::getIntParam('id', 0);
        if ($id > 0) {
            $items = Posts::getOne($id);
            if (empty($items)) {
                return $this->showError('404');
            } else {
                return  $this->showView('one', ['item' => $items[0]]);
            }
        } else {
            return $this->showError('404');
        }
    }
    
    public function find()
    {
        $arr = [];
        if (!empty($_POST['caption'])) {
            $arr = Posts::findAllByField('caption', $_POST['caption']);
        } 
        return $this->showView('find', ['items' => $arr]);
    }
    
    public function add()
    {
//        if (!Auth::isLogged()) {
//            header('Location: index.php');
//            die;
//        }
        if ((!empty($_POST['caption'])) && (!empty($_POST['text']))) {
            $news = new Posts();
            $news->caption = $_POST['caption'];
            $news->text = $_POST['text'];
            $news->save();
            header('Location: index.php');
            die;
        } else {
            return $this->showView('add');
        }
    }
    
    public function edit()
    {
//        if (!Auth::isLogged()) {
//            header('Location: index.php');
//            die;
//        }
        if ((!empty($_POST['caption'])) && (!empty($_POST['text'])) && !empty($_POST['id'])) {
            $news = new Posts();
            $news->caption = $_POST['caption'];
            $news->text = $_POST['text'];
            $news->id = $_POST['id'];
            $news->save();
            header('Location: index.php');
            die;
        } elseif (!empty ($_GET['id'])) {
            $id = Router::getIntParam('id', 0);
            if ($id > 0) {
                $items = Posts::getOne($id);
                if (empty($items)) {
                    return $this->showError('404');
                } else {
                    return $this->showView('edit', ['item' => $items[0]]);
                }
            } else {
                return $this->showError('404');
            }
        } else {
            return $this->showError('404');
        }
    }
    
    public function delete()
    {
//        if (!Auth::isLogged()) {
//            header('Location: index.php');
//            die;
//        }
        if (!empty($_GET['id'])) {
            $news = new Posts();
            $news->id = $_GET['id'];
            $news->delete();
            header('Location: index.php');
            die;
        }
    }
    
   
}
