<?php
session_start();
$method = $_SERVER['REQUEST_METHOD'] ?? null;
include_once "../admin/config/Database.php";

switch($method){
    case 'GET':
        if(isset($_GET['soluong'])){
            $cart = $_SESSION['cart'] ?? false;
            if($cart){
                $soluong = count($cart);
                echo json_encode(['soluong' => $soluong]);
            }else{
                echo json_encode(['soluong' => 0]);
            }
        }else{
            echo json_encode(getcart());
        }
        break;
    case 'POST':
        $checkuser = $_SESSION['user'] ?? null;
        if(!$checkuser){
            echo json_encode(['status' => 0,'message' => 'Bạn cần đăng nhập để thêm vào giỏ hàng']);
            die;
        }
        $data = json_decode(file_get_contents('php://input'),true);
        addcart($conn,$data);
        $soluong = count($_SESSION['cart']);
        echo json_encode(['status' => 1,'message' => 'Thêm vào giỏ hàng thành công','soluong' => $soluong]);

        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'),true);
        updatecart($data);
        $data = getcart();
        $res = [
            'status' => 1,
            'message' => 'Cập nhật thành công',
            'data' => $data
        ];
        echo json_encode($res);
        break;
    case 'DELETE':
            
        break;
}

function getcart(){

    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $data = [];
        foreach($cart as $item){
            $data[] = $item;
        }
        return $data;
    }
    return [];
}


function addcart($conn,$data){
    $id = $data['id'] ?? null;
    $soluong = $data['soluong'] ?? 1;
    $soluong = (int)$soluong;
    if($id){
        $cart = $_SESSION['cart'] ?? [];
        if(array_key_exists($id,$cart)){
            $cart[$id]['soluong'] += $soluong;
            $cart[$id]['tongtien'] = $cart[$id]['soluong'] * $cart[$id]['dongia'];
        }else{
            $sql = "SELECT * FROM sanpham WHERE ID = $id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            if(!$row){
                echo json_encode(['status' => 0,'message' => 'id không tồn tại']);
                die;
            }
            $cart[$id] = [
                'iduser' => $_SESSION['user']['id'],
                'idsp' => $id,
                'soluong' => $soluong,
                'tensp' => $row['TenSP'],
                'dongia' => $row['Gia'],
                'img' => $row['HinhAnh'],
                'tongtien' => $soluong * $row['Gia']
            ];
        }
        $_SESSION['cart'] = $cart;
    }else{
        echo json_encode(['status' => 0,'message' => 'Lỗi url']);
        die;
    }
}



function updatecart($data){
    $cart = $_SESSION['cart'] ?? [];
    $arridsp = [];
    foreach($data as $item){
        $id = $item['id'];
        $arridsp[] = $id;
        $soluong = $item['soluong'];
        if(array_key_exists($id,$cart)){
            $cart[$id]['soluong'] = $soluong;
            $cart[$id]['tongtien'] = $soluong * $cart[$id]['dongia'];
        }
    }
    foreach($cart as $id => $item){
        if(!in_array($id,$arridsp)){
            unset($cart[$id]);
        }
    }
    $_SESSION['cart'] = $cart;
}

// echo json_encode(['status' => 1,'message' => 'Thành công']); die;

