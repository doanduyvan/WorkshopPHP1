<?php

session_start();
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

switch($page){
    case "login":
        require_once "login.php";
        break;
    case "register":
        require_once "register.php";
        break;
    case "home":
        require_once "home.php";
        break;
    case "shop":
        require_once "shop.php";
        break;
    case "cart":
        require_once "cart.php";
        break;
    case "checkout":
        require_once "checkout.php";
        break;
    case "order":
        require_once "order.php";
        break;
    default:
        require_once "home.php";
        break;
}