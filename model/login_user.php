<?php
    // function check_user($email, $phonenum){
    //     $sql = "SELECT * FROM `user_cred` WHERE email = '$email' and phonenum = '$phonenum'";
    //     $result = pdo_query_one();
    //     return $result;
    // }

    function loadall_user(){
        $sql = "SELECT * FROM `user_cred` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }

    function insert_user($name,$email, $address,$phonenum,$dob,$pincode,$profile,$password){
        $sql = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `dob`, `pincode`, `profile`, `password`) 
        VALUES ('$name','$email', '$address','$phonenum','$dob','$pincode','$profile','$password')";
        pdo_execute($sql);
    }

    function login($email, $pass){
        $sql = "SELECT * FROM duan1.user_cred WHERE email = '$email' and password = '$pass'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }   
    }

    function sendMail($email){
        $sql = "SELECT * FROM `user_cred` WHERE email = '$email'";
        $user = pdo_query_one($sql);
        return $user;
    }

    
    function rand_tring($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $size = strlen($characters);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $size - 1)];
        }
        return $password;
    }
    $newpass = rand_tring(8);

    function sendMailPass($email, $name, $newpass){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'ducvietle1404@gmail.com';                     //SMTP username
            $mail->Password   = 'libd qzwc xqvw ccqo';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('ducvietle1404@gmail.com', 'Hotel');
            $mail->addAddress($email, $name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nguoi dung quen mat khau';
            $mail->Body    = 'Mat khau cua ban la: ' .$newpass;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
    
    function update_pass($password, $email){
        $sql = "UPDATE `user_cred` SET password = '$password' WHERE email = '$email'";
        pdo_execute($sql);
    }

    function profile($id_user){
        $sql = "SELECT * FROM duan1.user_cred WHERE id = '$id_user'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function update_info($id,$name,$phone,$dob,$pincode,$address,$email,$target_flie){
        $sql = "UPDATE `user_cred` SET `name`='$name',`email`='$email',`address`='$address',`phonenum`='$phone',`dob`='$dob',`pincode`='$pincode', `profile`='$target_flie' 
                WHERE id = '$id'";
        pdo_execute($sql);
    }
?>