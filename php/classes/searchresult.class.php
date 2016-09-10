<?php
require __DIR__ . '/../database.php';

class searchresult{

    private $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


}

$obj = new searchresult();