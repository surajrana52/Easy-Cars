<?php
$host="localhost";
$username="root";
$userpass="";
$dbname="sv_co";

try{
    $DB_con = new PDO("mysql:host={$host};dbname={$dbname}",$username,$userpass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}
require ('details.class.php');
$obj = new details($DB_con);
?>