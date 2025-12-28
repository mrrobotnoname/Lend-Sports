<?php
namespace App\Controller;
use App\Core\Controller;

class LoginController extends Controller {
    private $usersModel;

    public function __construct() {
        $this->usersModel = $this->model('User');
    }

    public function index() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = $this->usersModel->findByUser($username);

            if($user && $user->password==$password) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                header('Location:/');
                exit();
            }else{
                $data = ['error' => 'invalid username or password'];
                $this->view('login',$data);
            }
        }else{
            $this->view('login');
        }
    }
}