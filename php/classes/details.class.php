<?php
require ('php/database.php');
class details{
    
    private $db;
    public $result;
    public $images;
    
    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //fetch details from database for details.php page
    public function getDetails($carid){
        
        $stmt = $this->db->prepare("SELECT * FROM car_details WHERE id=:carid");
        $stmt->execute(array(':carid'=>$carid));
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res = $stmt->fetch()){
            $this->result = $res;
            return true;
        }
    }

    //formate car price for details.php page
    public function moneyconv(){
        $amount = $this->result['price'];
        echo number_format($amount);
    }

    //get car images for details.php page
    public function getCarImages(){
        $scarid= $this->result['id'];
        $stmt = $this->db->prepare("SELECT * FROM car_detail_images WHERE car_id='".$scarid."'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res1 = $stmt->fetch()){
            $this->images = $res1;
            return true;
        }
    }

    //ajax submit of enquiry form
    public function ajaxSubGen($name,$email,$mobile,$massage){
        $stmt = $this->db->prepare("INSERT INTO user_subscribe (name,email,mobile) VALUES (:name,:email,:mobile)");
        $stmt->bindValue(':name',$name);
    }
}
$obj = new details($DB_con);