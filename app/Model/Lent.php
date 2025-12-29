<?php
namespace App\Model;
use App\Core\Database;
use DateTime;
use DateTimeZone;
class Lent {
    private $db;
    private $timezone;
    private $datetime;
    private $lend_time;

    public function __construct() {
        $this->db = new Database();
        $this->timezone = date_default_timezone_set("Asia/Colombo"); 
        $this->datetime = new DateTime();
        $this->lend_time = $this->datetime->format('Y-m-d H:i:s');
    }

    public function lentItem($data) {
        $this->db->query("INSERT INTO lent (student_id,student_name,item_id,quantity,lend_time) VALUES (:student_id,:student_name,:item_id,:quantity,:lend_time)");
        $this->db->bind(':student_id',$data[0]);
        $this->db->bind(':student_name',$data[1]);
        $this->db->bind(':item_id',(int) $data[2]);
        $this->db->bind(':quantity',(int) $data[3]);
        $this->db->bind(':lend_time',$this->lend_time);

        $this->db->execute();
    }
}