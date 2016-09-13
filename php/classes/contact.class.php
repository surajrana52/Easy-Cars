<?php

require __DIR__ . '/../database.php';

class contact{

    public $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function subscribe($name,$email){
        $stmt = $this->db->prepare("INSERT INTO user_subscribe (user_name,email) VALUES (:uname,:email)");
        $stmt->bindValue(':uname', $name);
        $stmt->bindValue(':email', $email);
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}

$contact = new contact($DB_con);