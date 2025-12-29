<?php
namespace App\Controller;
use App\Core\Controller;

class RetrieveController extends Controller {
    protected $retrieveModel;

    public function __construct() {
        $this->retrieveModel = $this->model('Retrieve');
    }

    public function index() {
        $data = $this->retrieveModel->getAllLend();
        $this->view('retrieve',$data);
    }


    
    
public function checkout($id) {
    if($this->retrieveModel->deleteLentRecord($id)) {
        // Redirect back to the retrieve page after deleting
        header('location: ' . URLROOT . '/Retrieve');
    } else {
        die('Something went wrong');
    }
}
}