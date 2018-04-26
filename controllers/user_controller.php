<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 11:35
 */
namespace user;

class user_controller {
    public function login_form() {
        require_once('views/user/login.php');
    }
    public function logout() {
        session_unset();
        session_destroy();
        require_once('views/user/login.php');
    }
    public function activation() {
        $msg = "";$msg_type="";$msg_img="";
        if (isset($_GET['email']) && isset($_GET['hash'])) {
            $email = $_GET['email'];
            $hash = $_GET['hash'];
            if( \users\users::active_user($email,$hash))
            {
                $users = \users\users::select_users($email);
                $_session['username'] = $email;
                $msg = "The user has been activated successfully";
                $msg_type = "success";
                $msg_img="success.png";
            }
            else
            {
                $msg = "An error has been occured in user activation.";
                $msg_type = "error";
                $msg_img="error.jpeg";
            }
        }
        require_once('views/page/home.php');
    }
    public function login() {
        $msg = "";
        $data = json_decode($_POST['data'],true);

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))// Return Error - Invalid Email
        {
            $msg = 'The email you have entered is invalid, please try again.';
        }
        else{
            $users = \users\users::select_users($data['email']);
            if(count($users) > 0)
            {
                if($users[0]['password'] == md5($data['password']))
                {
                    if($users[0]['active'] == '1')   $_SESSION['username'] = $users[0]['email'];
                    else if($users[0]['hash'] != "") $msg = "Your account had been made, <br /> please verify it by clicking the activation linkhat had been sent to your email.";
                    else $msg = "Your Email is not active";
                }
                else $msg = "Your password is not correct";
            }
            else
            {
                $hash = md5( rand(0,1000) );
                \users\users::insert_user($data['email'],md5($data['password']),$hash);
                $msg = "Your account has been made, <br /> please verify it by clicking the activation linkhat has been sent to your email.";
                send_verification_email($data['email'],$hash);
            }

        }
        echo $msg;
    }

}
?>
