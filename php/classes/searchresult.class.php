<?php
require __DIR__ . '/../database.php';

class searchresult
{

    private $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function advanceSearch($car_type,$manufacturer,$fuel_type,$millage,$transmission,$displacement,$budget){

    }

}

$obj = new searchresult($DB_con);