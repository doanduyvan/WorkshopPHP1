
<?php

session_start();
$method = $_SERVER['REQUEST_METHOD'] ?? null;
include_once "../admin/config/Database.php";


switch($method){
    case "GET":
        if(isset($_GET['id']) && $_GET['id'] != ""){
            $id = $_GET['id'];
            $data = getById($conn,$id);
            echo json_encode($data);
        }else{
            $data = getAll($conn);
            echo json_encode($data);
        }
        break;
    case "POST":
        echo json_encode("POST method");
        break;
    case "PUT":
        echo json_encode("PUT method");
        break;
    case "DELETE":
        echo json_encode("DELETE method");
        break;
}

function getById($conn,$id){
    $table = 'sanpham';
    $sql = "SELECT * FROM $table WHERE ID = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getAll($conn){
    $table = 'sanpham';
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn,$sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}