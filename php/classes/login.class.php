<?php

require __DIR__ . '/../database.php';

class login{

    private $db;
    public $login_result;
    public $register_result;

    public function register($name,$email,$pass){

        try {
            $stmt = $this->db->prepare("SELECT user_email FROM users_login WHERE user_email=:uemail");
            $stmt->bindParam(':uemail', $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                $this->register_result = "Email: ".$row['user_email']." already exits";
                return false;
            }else{
                $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
                $stmt = $this->db->prepare("INSERT INTO users_login (user_name,user_email,user_pass) VALUES (:uname,:uemail,:upass)");
                $stmt->bindParam(':uname', $name);
                $stmt->bindParam(':uemail', $email);
                $stmt->bindParam(':upass', $hashedpass);
                if ($stmt->execute()) {
                    $this->register_result = "Congratulations \"" . $username . "\" Sign Up SuccessFull.";
                    return true;
                } else {
                    $this->register_result = "Sorry Sign Up failed";
                    return false;
                }
            }
        }
        catch
        (PDOException $e){
            echo "Error: " . $e->getMessage();
        }

    }

    public function login($email,$pass){

        try {
            $stmt = $this->db->prepare("SELECT user_name,user_email,user_pass FROM users_login WHERE user_email=:uemail");
            $stmt->bindParam(':uemail', $email);
            $stmt->execute();
            $tt = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($pass, $tt['user_pass'])) {
                    $this->result = $tt;
                    return true;
                } else {
                    $this->result = "Login Failed";
                    return false;
                }
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }

}

$login = new login($DB_con);