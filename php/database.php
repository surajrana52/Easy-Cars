<?php
$host="127.0.0.1";
$username="root";
$userpass="";
$dbname="sv_co";

try{
    $DB_con = new PDO("mysql:host={$host};dbname={$dbname}",$username,$userpass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>