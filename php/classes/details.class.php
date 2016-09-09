<?php
require __DIR__ . '/../database.php';

class details
{

    private $db;
    public $result;
    public $images;
    public $getFeatures_array;
    public $ajaxSubGen_result;
    public $ajaxSubTest_result;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //fetch details from database for details.php page
    public function getDetails($carid)
    {

        $stmt = $this->db->prepare("SELECT * FROM car_details WHERE id=:carid");
        $stmt->execute(array(':carid' => $carid));
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res = $stmt->fetch()) {
            $this->result = $res;
            return true;
        }
    }

    //formate car price for details.php page
    public function moneyconv()
    {

        $amount = $this->result['price'];
        echo number_format($amount);
    }

    //get car images for details.php page
    public function getCarImages()
    {

        $scarid = $this->result['id'];
        $stmt = $this->db->prepare("SELECT * FROM car_detail_images WHERE car_id='" . $scarid . "'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($res1 = $stmt->fetch()) {
            $this->images = $res1;
            return true;
        }
    }

    //get features of car for details.php page
    public function getFeatures(){

        $scarid = $this->result['id'];
        $stmt = $this->db->prepare("SELECT extra_features FROM car_details WHERE id='" . $scarid . "'");
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_BOTH);
        while ($res2 = $stmt->fetchColumn()) {
            $myArray = explode(",",$res2);
            $this->getFeatures_array = $myArray;
            return true;
        }
    }


    //ajax submit of enquiry form
    public function ajaxSubGen($name, $email, $mobile, $massage)
    {

        $stmt = $this->db->prepare("INSERT INTO user_subscribe (user_name,email,mobile) VALUES (:uname,:email,:mobile)");
        $stmt->bindValue(':uname', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':mobile', $mobile);
        if ($stmt->execute()) {

            require '../../assets/PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'sg2plcpnl0059.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = '';                 // SMTP username
            $mail->Password = '';                  // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('support@hyperfix.in', 'Suraj');
            $mail->addAddress($email);               // Name is optional

            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Thank you for placing order on HyperFix.in';

            $mail->Body = $massage;
            $mail->AltBody = 'Please View In HTML Compatable Browser';

            if (!$mail->send()) {
                $this->ajaxSubGen_result = 'failed' . $mail->ErrorInfo;
            } else {
                $this->ajaxSubGen_result = "Submited to database";
            }
            return true;
        } else {
            return false;
        }

    }

    //ajax submit of enquiry form
    public function ajaxSubTest($name, $email, $mobile)
    {

        $stmt = $this->db->prepare("INSERT INTO user_subscribe (user_name,email,mobile) VALUES (:uname,:email,:mobile)");
        $stmt->bindValue(':uname', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':mobile', $mobile);
        if ($stmt->execute()) {
            $this->ajaxSubTest_result = "Submited to database";
            return true;
        }
    }
}

$obj = new details($DB_con);