<?php

require_once(FCPATH .'vendor/swiftmailer/swiftmailer/lib/swift_required.php');

class Email_model 
{

    public static function sendEmail($email, $subject, $messageBody)
    {
        date_default_timezone_set('America/Los_Angeles');

        $transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername('emailtester200@gmail.com')
            ->setPassword('emailtest200');

        $message = Swift_Message::newInstance($transporter);
        $message->setTo(array($email => ''));
        $message->getDate();
        $message->setSubject($subject);
        $message->setBody($messageBody);
        $message->setFrom("emailtester200@gmail");

        $mailer = Swift_Mailer::newInstance($transporter);
        $mailer->send($message);
    }

}