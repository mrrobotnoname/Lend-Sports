<?php
namespace App\controller;
use App\core\Controller;

class HomeController extends Controller {

    public function index() {
            $this->view('home',[]);
    }
}