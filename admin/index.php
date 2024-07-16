
<?php
session_start();
$page = $_GET['page'] ?? "sanpham";
$action = $_GET['action'] ?? "list";

if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){
    $page = 'login';
}

switch($page){
    case "sanpham":
        switch($action){
            case "list":
                include_once "./sanpham/index.php";
                break;
            case "add":
                include_once "./sanpham/addnew.php";
                break;
            case "edit":
                include_once "./sanpham/editproduct.php";
                break;
            default:
                include_once "./sanpham/index.php";
                break;
        }
        break;
    case "danhmuc":
        switch($action){
            case "list":
                include_once "./danhmuc/index.php";
                break;
            case "add":
                include_once "./danhmuc/themmoi.php";
                break;
            case "edit":
                include_once "./danhmuc/capnhat.php";
                break;
            case "delete":
                include_once "./danhmuc/delete.php";
                break;
            default:
                include_once "./danhmuc/index.php";
                break;
        }
        break;
    case "login":
        include_once "./taikhoan/dangnhap.php";
        break;
    case "logout":
        session_destroy();
        header("Location: ?page=login");
        break;
    default:
        include_once "./sanpham/index.php";
        break;
}

?>