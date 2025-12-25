<?php
namespace App\core;

class Controller {

    //fuc for loading the model
    public function model($model) {
        $modleClass = 'APP\\models\\' . $model;
        return $modleClass();
    }
    //func for loading the view
    public function view($view,$data=[]) {
        $viewFile = '../app/view/' . $view . '.php';
        if(file_exists($viewFile)) {
            require_once $viewFile;
        }else{
            die("View does not exist.");
        }
    }
}