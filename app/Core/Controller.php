<?php
namespace App\Core;

class Controller {

    //fuc for loading the model
    public function model($model) {
        $modelClass = 'App\\Model\\' . $model;
        return new $modelClass(); 
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
    public function check_login() {
        if(!isset($_SESSION['user_id'])) {
            header('Location:/login');
            exit();
        }
    }
    
}