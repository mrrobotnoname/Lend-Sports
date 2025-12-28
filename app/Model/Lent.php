<?php
namespace App\Model;
use App\Core\Database;

class Lent {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function lentItem($data) {
        $this->db->query("INSERT INTO lent (student_id,student_name,item_id,quantity) VALUES (:student_id,:student_name,:item_id,:quantity)");
        $this->db->bind(':student_id',$data[0]);
        $this->db->bind(':student_name',$data[1]);
        $this->db->bind(':item_id',(int) $data[2]);
        $this->db->bind(':quantity',(int) $data[3]);

        $this->db->execute();
    }
}