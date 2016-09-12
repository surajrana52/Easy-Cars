<?php
require __DIR__ . '/../database.php';

class searchresult
{

    private $db;
    public $output;
    public $queryResult;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function createQuery($cartype,$manufacturer,$fuel_type,$millage,$transmission,$displacement,$budget){

        $query = "SELECT id,manufacturer,model,millage,price,fuel_type,description,transmission,displacement,exterior_color FROM car_details";
        $conditions = array();
        $conditions2 = array();

        if (!empty($cartype)){
            $conditions[] = "vehical_type='$cartype'";
        }
        if (!empty($manufacturer)){
            $conditions[] = "manufacturer='$manufacturer'";
        }
        if (!empty($fuel_type)){
            $conditions[] = "fuel_type='$fuel_type'";
        }
        if (!empty($budget)){
            $conditions[] = "price >= '$budget'";
        }
        if (!empty($millage)){
            $conditions2[] = "( millage >= '$millage'";
        }
        if (!empty($transmission)){
            $conditions2[] = "transmission='$transmission'";
        }
        if (!empty($displacement)){
            $conditions2[] = "displacement >= '$displacement' ) ";
        }

        $sql = $query;
        if (count($conditions)>0){
            $sql .=" WHERE ".implode(' AND ',$conditions);
        }
        if (count($conditions2)>0){
            $sql .=" AND ".implode(' OR ',$conditions2);
            //$sql .="ORDER BY id desc";
        }

        $this->advanceSearch($sql);
        return true;
    }

    public function advanceSearch($sql)
    {
        $this->output = $sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($result = $stmt->fetchAll()) {
            $this->queryResult = $result;
            return true;
        }
    }

    public function getCarImages($carid){
        $car_id = $carid;
        $stmt_in = $this->db->prepare("SELECT image FROM car_search_images WHERE car_id='$car_id'");
        $stmt_in->execute();
        $stmt_in->setFetchMode(PDO::FETCH_ASSOC);
        while ($res = $stmt_in->fetchAll()) {
            foreach ($res as $key => $value){
                echo $value['image'];
            }
        return true;
        }
    }

    //formate car price for searchresult page
    public function moneyconv($amount)
    {
        //$amount = $this->queryResult['price'];
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

    //show description with '...' included at the end
    public function descCut($varibale){

        echo substr($varibale, 0, 200).((strlen($varibale) > 200) ? '...' : '');
    }

}

$obj = new searchresult($DB_con);