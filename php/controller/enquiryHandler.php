<?php
require __DIR__.'/../classes/details.class.php';

if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){

    $name= $_POST['user_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $massage = $_POST['massage'];

    if($obj->ajaxSubGen($name,$email,$mobile,$massage)){
       $returndata =  $obj->ajaxSubGen_result;
    }

    echo $returndata;
}