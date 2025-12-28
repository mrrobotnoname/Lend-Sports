<?php 
namespace App\Model;
use App\Core\Database;

class User {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }

    public function getAllUsers() {
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }

    public function findByUser($username) {
        $this->db->query("SELECT * FROM users WHERE username = :username");
        $this->db->bind(':username',$username);
        return $this->db->single();
    }
}
