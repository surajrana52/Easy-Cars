<?php

require __DIR__ . '/../database.php';

class contact{

    public $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

}

$contact = new contact($DB_con);