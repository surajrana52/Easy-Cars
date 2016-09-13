<?php
require __DIR__.'/../classes/contact.class.php';

if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){

    if (isset($_POST['subsc'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        if($contact->subscribe($name,$email)){
            echo "Success";
        }
    }

    if (isset($_POST['contact'])){
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $phone = $_POST['user_phone'];
        $massage = $_POST['user_message'];

        if ($contact->contactForm($name,$email,$phone,$massage)){
            echo "success";
        }
    }
}