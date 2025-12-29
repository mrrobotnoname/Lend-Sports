<?php
namespace App\Model;
use App\Core\Database;

class Retrieve {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function getAllLend() {
        $this->db->query("SELECT l.*,i.itemName FROM lent l JOIN items i ON l.item_id = i.id");
        return $this->db->resultSet();
    }
    public function getLendById($stdId) {
        $this->db->query("SELECT * FROM lent WHERE id= :id ");
        return $this->db->single();
    }

    public function deleteLentRecord($id) {
    // 1. First, find out which item and how many were lent
    $this->db->query("SELECT item_id, quantity FROM lent WHERE id = :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();

    if ($row) {
        $itemId = $row->item_id;
        $qtyToReturn = $row->quantity;

        // 2. Start a transaction (optional but good practice)
        // 3. Delete the lent record
        $this->db->query("DELETE FROM lent WHERE id = :id");
        $this->db->bind(':id', $id);
        
        if ($this->db->execute()) {
            // 4. Update the items table: Add the quantity back to stock
            $this->db->query("UPDATE items SET quantity = quantity + :qty WHERE id = :item_id");
            $this->db->bind(':qty', $qtyToReturn);
            $this->db->bind(':item_id', $itemId);
            
            return $this->db->execute();
        }
    }
    return false;
}
}
