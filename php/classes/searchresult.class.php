<?php
require __DIR__ . '/../database.php';

class searchresult
{

    private $db;
    public $output;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function createQuery($cartype,$manufacturer,$fuel_type,$millage,$transmission,$displacement,$budget){

        $query = "SELECT manufacturer,model,millage,fuel_type,description FROM car_details";
        $conditions = array();

        if (!empty($cartype)){
            $conditions[] = "vehical_type='$cartype'";
        }
        if (!empty($manufacturer)){
            $conditions[] = "manufacturer='$manufacturer'";
        }
        if (!empty($fuel_type)){
            $conditions[] = "fuel_type='$fuel_type'";
        }
        if (!empty($millage)){
            $conditions[] = "millage >= '$millage'";
        }
        if (!empty($transmission)){
            $conditions[] = "transmission='$transmission'";
        }
        if (!empty($displacement)){
            $conditions[] = "displacement > '$displacement'";
        }
        if (!empty($budget)){
            $conditions[] = "budget >= '$budget'";
        }

        $sql = $query;
        if (count($conditions)>0){
            $sql .=" WHERE ".implode(' AND ',$conditions);
        }

        $this->advanceSearch($sql);
        return true;
    }

    public function advanceSearch($sql){

        $this->output = $sql;
        //$stmt = $this->db->prepare($sql);
    }

}

$obj = new searchresult($DB_con);