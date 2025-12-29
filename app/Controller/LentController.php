<?php
namespace App\Controller;
use App\Core\Controller;

class LentController extends Controller {
    private $itemModel;
    private $lentModel;

    public function __construct() {
        $this->itemModel = $this->model('Item');
        $this->lentModel = $this->model('Lent');

    }

    public function index() {
        $this->check_login();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_name = trim($_POST['name']);
            $student_id = trim($_POST['id']);
            $phone = trim($_POST['phoneNo']);
            $item_id = $_POST['item'];
            $quantity = $_POST['quantity'];
            $data = [$student_id,$student_name,$item_id,$quantity];
            
            if(isset($item_id) and $quantity > 0) {
                $this->lentModel->lentItem($data);
                $this->itemModel->checkOut($data);
                header('Location:/lent');
                exit();
            }
        }

        $data = $this->itemModel->getAllItems();
        $this->view('lent',$data);





    }
public function api() {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    if (ob_get_length()) ob_clean();

    if(isset($data->id) && !empty($data->id)) {
        $item = $this->itemModel->getItemById($data->id);

        if($item) {
            header('Content-Type: application/json');
            echo json_encode($item);
            exit();
        } else {
            echo json_encode(['error' => 'Item not found']);
            exit();
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No ID provided', 'received' => $data]);
        exit();
    }
}
}