<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 11:35
 */
namespace page;

class page_controller {
    public function home() {
        $username = $_SESSION['username'];
        $users = \users\users::select_users($username);
        require_once('views/page/home.php');
    }

}
?>
