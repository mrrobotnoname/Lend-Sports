<?php
namespace App\Model;
use App\Core\Database;

class Item {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllItems() {
        $this->db->query("SELECT * FROM items");
        return $this->db->resultSet();
    }
    public function getItemById($id) {
        $this->db->query("SELECT * FROM items where id = :id");
        $this->db->bind(':id',$id);
        return $this->db->single();
    }
    public function checkOut($data) {
        $this->db->query("SELECT * FROM items WHERE id= :id");
        $this->db->bind('id',$data[2]);
        $row = $this->db->single();
        $quantity = (int) $row->quantity;
        

        if($quantity >= (int) $data[3]) {
            $newQut = $quantity - $data[3];
            $this->db->query("UPDATE items SET quantity= :qty WHERE id= :id");
            $this->db->bind(':qty',$newQut);
            $this->db->bind(':id',$data[2]);
            $this->db->execute();
        }

    }
}