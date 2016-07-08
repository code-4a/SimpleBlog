<?php

require_once __DIR__ . '/../autoload.php';

class NewsCtrl {
    
    public function All()
    {
        $items = News::getAll();
        $view = new View();
        $view->items = $items;
        $view->show('news/all.php');
    }
    
    public function One()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        }
        $id = ($id > 0) ? $id : 1;
        $item = News::getOne($id);
        $view = new View();
        $view->item = $item;
        $view->show('news/one.php');
    }
    
    public function add()
    {
        if ((!empty($_POST['caption'])) && (!empty($_POST['text']))) {
            $news = new News();
            $news->caption = $_POST['caption'];
            $news->text = $_POST['text'];
            $news->save();
            header('Location: index.php');
            die;
        } else {
            $view = new View();
            $view->show('news/add.php');
        }
    }
    
    public function edit()
    {
        if ((!empty($_POST['caption'])) && (!empty($_POST['text'])) && !empty($_POST['id'])) {
            $news = new News();
            $news->caption = $_POST['caption'];
            $news->text = $_POST['text'];
            $news->id = $_POST['id'];
            $news->save();
            header('Location: index.php');
            die;
        } elseif (!empty ($_GET['id'])) {
            $item = News::getOne($_GET['id']);
            $view = new View();
            $view->item = $item;
            $view->show('news/edit.php');
        }
    }
    
    public function delete()
    {
        if (!empty($_GET['id'])) {
            $news = new News();
            $news->id = $_GET['id'];
            $news->delete();
            header('Location: index.php');
            die;
        }
    }
    
    public function find()
    {
        $view = new View();
        if (!empty($_POST['caption'])) {
            $items = News::findAllByField('caption', $_POST['caption']);
            $view->items = $items;
        } else {
            $view->items = [];
        }
        $view->show('news/find.php');
    }
}
