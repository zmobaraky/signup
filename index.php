<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 11:27
 */
session_start();
require_once('functions.php');
require_once('connection.php');
$username = $_SESSION['username'];

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
}else if (isset($_POST['controller']) && isset($_POST['action'])) {
    $controller = $_POST['controller'];
    $action     = $_POST['action'];
} else if($username!=''){
    $controller = 'page';
    $action     = 'home';
}
else{
    $controller = 'user';
    $action     = 'login_form';
};

if(isset($_POST['from_ajax']) && $_POST['from_ajax']==true) {

    require_once('routes.php');
}
else
    require_once('views/layout.php');
?>