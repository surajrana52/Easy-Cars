<?php

class details{
    
    private $db;
    public $carid;
    
    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }
    
    public function getDetails($carid){
        
        $this->carid = $carid;
    }
}