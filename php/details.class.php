<?php
require ('database.php');
class details{
    
    private $db;
    public $result;
    
    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }
    
    public function getDetails($carid){
        
        $stmt = $this->db->prepare("SELECT * FROM car_details WHERE id=:carid");
        $stmt->execute(array(':carid'=>$carid));
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res = $stmt->fetch()){
            $this->result = $res;
            return true;
        }
    }
}
$obj = new details($DB_con);