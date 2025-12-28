<?php
namespace App\Controller;
use App\Core\Controller;

class HomeController extends Controller {
    private $itemModel;
    public function __construct() {
         $this->itemModel = $this->model('Item');
    }

    public function index() {
        $this->check_login();    
        $data = $this->itemModel->getAllItems();

        $this->view('home',$data);
    }
}