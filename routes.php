<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 11:30
 */
require_once('autoload.php');
function call($controller, $action) {

    switch($controller) {
        case 'page':
            $controller = new \page\page_controller();
            break;
        case 'user':
            $controller = new \user\user_controller();
            break;
    }

    $controller->{ $action }();
}

// we're adding an entry for the new controller and its actions
$controllers = array('page' => ['home'],
    'user' => ['login_form','login','activation','logout']);

if (array_key_exists($controller, $controllers) && in_array($action, $controllers[$controller])) {
    call($controller, $action);
}
else if($username!='')
    call('page', 'home');
else
    call('user', 'login_form');

?>