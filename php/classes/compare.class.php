<?php
require __DIR__ . '/../database.php';

class compare{

    private $db;
    public $getCarsIdOne_result;
    public $getCarsIdTwo_result;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //get details of car one
    public function getCarsIdOne($carid_one){
        $stmt = $this->db->prepare("SELECT car_specifications.*,car_details.extra_features,car_details.model,car_details.price FROM car_specifications,car_details WHERE car_specifications.car_id ='$carid_one' AND car_details.id = '$carid_one'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res = $stmt->fetch()){
            $this->getCarsIdOne_result = $res;
            return true;
        }
    }

    //get details of car two
    public function getCarsIdTwo($carid_two){
        $stmt = $this->db->prepare("SELECT car_specifications.*,car_details.extra_features,car_details.model,car_details.price FROM car_specifications,car_details WHERE car_specifications.car_id ='$carid_two' AND car_details.id = '$carid_two'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res = $stmt->fetch()){
            $this->getCarsIdTwo_result = $res;
            return true;
        }
    }

    //get car Images
    public function getCarImage($carid){
        $stmt = $this->db->prepare("SELECT image FROM car_search_images WHERE car_id='$carid'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res = $stmt->fetch()){
            return $res['image'];
            return true;
        }
    }

    //explode features by comma
    public function getFeatures($variable){
        $myarray = explode(",",$variable);
        return $myarray;
        return true;
    }

    //formate car price for compare.php page
    public function moneyconv($amount)
    {
        $len = strlen($amount);
        $m = '';
        $money = strrev($amount);
        for($i=0;$i<$len;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
                $m .=',';
            }
            $m .=$money[$i];
        }
        echo strrev($m);
    }
}

$obj = new compare($DB_con);