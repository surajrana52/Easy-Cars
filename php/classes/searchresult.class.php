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

        $query = "SELECT id,manufacturer,model,millage,fuel_type,description FROM car_details";
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
            $conditions2[] = "millage >= '$millage'";
        }
        if (!empty($transmission)){
            $conditions2[] = "transmission='$transmission'";
        }
        if (!empty($displacement)){
            $conditions2[] = "displacement > '$displacement'";
        }

        $sql = $query;
        if (count($conditions)>0){
            $sql .=" WHERE ".implode(' AND ',$conditions);
        }
        if (count($conditions2)>0){
            $sql .=" AND ".implode(' OR ',$conditions2);
        }

        $this->advanceSearch($sql);
        return true;
    }

    public function advanceSearch($sql){

        $this->output = $sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($result = $stmt->fetch()){
            $this->queryResult = $result;
            return true;
        }
    }

}

$obj = new searchresult($DB_con);