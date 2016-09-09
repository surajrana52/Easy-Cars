<?php
require __DIR__.'/../classes/details.class.php';

if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){

    if (isset($_POST['general_enq'])) {
        $name = $_POST['user_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $massage = $_POST['massage'];

        if ($obj->ajaxSubGen($name, $email, $mobile, $massage)) {
            $returndata = $obj->ajaxSubGen_result;
        }
        echo $returndata;
    }

    if (isset($_POST['test_drive'])) {
        $name = $_POST['user_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        if ($obj->ajaxSubTest($name, $email, $mobile)) {
            $returndata1 = $obj->ajaxSubTest_result;
        }
        echo $returndata1;
    }
}