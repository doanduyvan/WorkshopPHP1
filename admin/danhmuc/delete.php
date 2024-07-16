<?php
require './config/database.php';
    $checkid = $_GET['id'] ?? null;
    $sql = "DELETE from danhmuc where ID = $checkid";
    if($conn->query($sql) === true){
        echo "<script>alert('Xóa danh mục thành công!');</script>";
        echo "<script>window.location.href = '?page=danhmuc';</script>";
    }else{
        echo "thất bại" . $conn->connect_error ; 
    }


?>

