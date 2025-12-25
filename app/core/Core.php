<?php
namespace App\core;

Class Core {
    protected $currentController = "HomeController";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();

        if(isset($url[0])) {
            $controllerFile = '../app/controller/' . ucwords($url[0]) . '.php';
            if(file_exists($controllerFile)) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }

        $controllerNamespace = 'App\\controller\\' . $this->currentController;
        if(class_exists($controllerNamespace)) {
            $this->currentController = new $controllerNamespace;
        }else{
            die("Controller {$controllerNamespace} does not exist. ");
        }

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            return explode('/',$url);
        }
    }
}