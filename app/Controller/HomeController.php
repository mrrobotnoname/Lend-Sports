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
    public function logout() {
    // Unset all session variables
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['user_email']);

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header('location: ' . URLROOT . '/users/login');
    exit();
}
}