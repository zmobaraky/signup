<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 25.04.18
 * Time: 14:37
 */
function send_verification_email($email,$hash)
{
    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject
    $message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

Please click this link to activate your account:
http://localhost/login_signup/index.php?controller=user&action=activation&email='.$email.'&hash='.$hash.'

'; // Our message above including the link
    //echo $message;
    $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

}
?>