<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 13:49
 */

require_once('connection.php');

if (isset($_POST['controller']) && isset($_POST['action'])) {
    $controller = $_POST['controller'];
    $action     = $_POST['action'];
}

require_once('routes.php');

?>