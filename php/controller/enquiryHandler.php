<?php

require_once ('classes/details.class.php');

if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){

    $name= $_POST['user_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    if($obj->ajaxSubGen($name,$email,$mobile)){
       $returndata =  $obj->ajaxSubGen_result;
    }

    echo $returndata;
}