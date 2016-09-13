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
    
}