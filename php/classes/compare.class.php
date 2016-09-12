<?php
require __DIR__ . '/../database.php';

class compare{

    private $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }
}

$obj = new compare($DB_con);