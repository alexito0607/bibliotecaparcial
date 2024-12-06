<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'UserController';
$action = isset($_GET['action']) ? $_GET['action'] : 'register';

require_once '../controllers/' . $controller . '.php';

$controller = new $controller;
$controller->$action();
?>
