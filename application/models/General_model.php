<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model
{
    public function send_new_org_email($email,$name)
    {
        require_once 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('info@ebursary.com', 'E-Bursary');
        $mail->addAddress($email, $name);
        $mail->Subject  = 'E-Bursary Organization Registration';

        $mail->Body = "Hello".". ". $name. "<br><br>".
            "Welcome to E-bursary !!."."<br>"." Your account has been created successfully."."<br><hr>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->AltBody = "Hello".". ". $name. "<br><br>".
            "Welcome to E-bursary !!."."<br>"." Your account has been created successfully."."<br><hr>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->send();
    }

    public function send_password_recovery_link_email($email, $name, $org_id)
    {
        require_once 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('info@ebursary.com', 'E-Bursary');
        $mail->addAddress($email, $name);
        $mail->Subject  = 'E-Bursary Password Recovery';
        $link = base_url().'auth/change_password/'.$org_id;

        $mail->Body = "Hello".". ". $name. "<br><br>".
            "Please click on the below link to reset your password"."<br><br>".
            "<a href='".$link."'>Password Reset Link</a>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->AltBody = "Hello".". ". $name. "<br><br>".
            "Please click on the below link to reset your password"."<br><br>".
            "<a href='".$link."'>Password Reset Link</a>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->send();
    }

    public function send_new_org_user_email($name, $email, $org_name, $pass)
    {
        require_once 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('info@ebursary.com', 'E-Bursary');
        $mail->addAddress($email, $name);
        $mail->Subject  = 'E-Bursary Account Creation';
        $link = base_url().'auth/org_login';

        $mail->Body = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account under"." ".$org_name." "."has been created"."<br>".
            "Below are your login credentials"."<br><br>".
            "Email :"." ".$email."<br>".
            "Password :"." ".$pass."<br>".
            "Link :"." "."<a href='".$link."'>Login Link</a>"."<br><br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->AltBody = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account under"." ".$org_name." "."has been created"."<br>".
            "Below are your login credentials"."<br><br>".
            "Email :"." ".$email."<br>".
            "Password :"." ".$pass."<br>".
            "Link :"." "."<a href='".$link."'>Login Link</a>"."<br><br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->send();
    }

    public function send_new_org_user_sms($name, $phone, $email, $org_name)
    {
        $message = "Dear"." ".$name.", ". "Your E-bursary account under"." ".$org_name." "."has been created. Please check your email ".$email." for login credentials. Thank You;";

        require_once('gateways/AfricasTalkingGateway.php');

        $username   = "Denis Gachoki";
        $apikey     = "d49bee9c9bab5e4e78d9a8195b6e6f9f1ee96b38ead84bfdccedbf2a7f7dd807";

        $recipients = $phone;

        $gateway    = new AfricasTalkingGateway($username, $apikey);

        try
        {
            $gateway->sendMessage($recipients, $message);

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "SMS Not sent, an error occured : ".$e->getMessage();
        }
    }

    public function send_user_edit_sms($phone, $name, $org_name)
    {
        $message = "Dear"." ".$name.", ". "Your E-bursary account details,  under"." ".$org_name." "."has been edited by admin. Thank You;";

        require_once('gateways/AfricasTalkingGateway.php');

        $username   = "Denis Gachoki";
        $apikey     = "d49bee9c9bab5e4e78d9a8195b6e6f9f1ee96b38ead84bfdccedbf2a7f7dd807";

        $recipients = $phone;

        $gateway    = new AfricasTalkingGateway($username, $apikey);

        try
        {
            $gateway->sendMessage($recipients, $message);

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "SMS Not sent, an error occured : ".$e->getMessage();
        }
    }

    public function send_user_edit_email($email, $name, $org_name)
    {
        require_once 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('info@ebursary.com', 'E-Bursary');
        $mail->addAddress($email, $name);
        $mail->Subject  = 'E-Bursary Account Creation';

        $mail->Body = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account details, under"." ".$org_name." "."has been edited by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->AltBody = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account details, under"." ".$org_name." "."has been edited by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->send();
    }

    public function send_user_delete_sms($phone, $name, $org_name)
    {
        $message = "Dear"." ".$name.", ". "Your E-bursary account  under"." ".$org_name." "."has been deleted by admin. Thank You;";

        require_once('gateways/AfricasTalkingGateway.php');

        $username   = "Denis Gachoki";
        $apikey     = "d49bee9c9bab5e4e78d9a8195b6e6f9f1ee96b38ead84bfdccedbf2a7f7dd807";

        $recipients = $phone;

        $gateway    = new AfricasTalkingGateway($username, $apikey);

        try
        {
            $gateway->sendMessage($recipients, $message);

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "SMS Not sent, an error occured : ".$e->getMessage();
        }
    }

    public function send_user_delete_email($email, $name, $org_name)
    {
        require_once 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('info@ebursary.com', 'E-Bursary');
        $mail->addAddress($email, $name);
        $mail->Subject  = 'E-Bursary Account Creation';

        $mail->Body = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account under"." ".$org_name." "."has been deleted by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->AltBody = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account details, under"." ".$org_name." "."has been edited by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->send();
    }

    public function send_user_activate_sms($phone, $name, $org_name)
    {
        $message = "Dear"." ".$name.", ". "Your E-bursary account  under"." ".$org_name." "."has been activated by admin. Thank You;";

        require_once('gateways/AfricasTalkingGateway.php');

        $username   = "Denis Gachoki";
        $apikey     = "d49bee9c9bab5e4e78d9a8195b6e6f9f1ee96b38ead84bfdccedbf2a7f7dd807";

        $recipients = $phone;

        $gateway    = new AfricasTalkingGateway($username, $apikey);

        try
        {
            $gateway->sendMessage($recipients, $message);

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "SMS Not sent, an error occured : ".$e->getMessage();
        }
    }

    public function send_user_activate_email($email, $name, $org_name)
    {
        require_once 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('info@ebursary.com', 'E-Bursary');
        $mail->addAddress($email, $name);
        $mail->Subject  = 'E-Bursary Account Creation';

        $mail->Body = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account under"." ".$org_name." "."has been activated by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->AltBody = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account details, under"." ".$org_name." "."has been edited by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->send();
    }

    public function send_user_suspend_sms($phone, $name, $org_name)
    {
        $message = "Dear"." ".$name.", ". "Your E-bursary account  under"." ".$org_name." "."has been suspended by admin. Thank You;";

        require_once('gateways/AfricasTalkingGateway.php');

        $username   = "Denis Gachoki";
        $apikey     = "d49bee9c9bab5e4e78d9a8195b6e6f9f1ee96b38ead84bfdccedbf2a7f7dd807";

        $recipients = $phone;

        $gateway    = new AfricasTalkingGateway($username, $apikey);

        try
        {
            $gateway->sendMessage($recipients, $message);

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "SMS Not sent, an error occured : ".$e->getMessage();
        }
    }

    public function send_user_suspend_email($email, $name, $org_name)
    {
        require_once 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('info@ebursary.com', 'E-Bursary');
        $mail->addAddress($email, $name);
        $mail->Subject  = 'E-Bursary Account Creation';

        $mail->Body = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account under"." ".$org_name." "."has been suspended by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->AltBody = "Hello".". ". $name. "<br><br>".
            "Your E-Bursary account details, under"." ".$org_name." "."has been edited by admin"."<br>".
            "Regards, "."<br>".
            "E-Bursary";

        $mail->send();
    }
}