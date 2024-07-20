<?php

// 0. chờ sử lí
// 1. đã xác nhận
// 2. Hoàn Thành
// 3. Đã hủy

session_start();
$method = $_SERVER['REQUEST_METHOD'] ?? null;
include_once "../admin/config/Database.php";

switch ($method) {
    case "GET":

        if (isset($_GET['admin'])) {
            $checkadmin = $_SESSION['loggedin'] ?? null;
            if (!$checkadmin) {
                echo json_encode(['status' => 0, 'message' => 'Bạn chưa đăng nhập admin']);
                die;
            }
            $res = getallorder($conn, null, true);
            echo json_encode(['status' => 1, 'data' => $res]);
        } else {
            $checkuser = $_SESSION['user'] ?? null;
            if (!$checkuser) {
                echo json_encode(['status' => 0, 'message' => 'Bạn chưa đăng nhập']);
                die;
            }
            $res = getallorder($conn, $checkuser['id']);
            echo json_encode(['status' => 1, 'data' => $res]);
        }
        break;
    case 'POST':
        $checkuser = $_SESSION['user'] ?? null;
        if (!$checkuser) {
            echo json_encode(['status' => 0, 'message' => 'Bạn chưa đăng nhập']);
            die;
        }
        $cart = $_SESSION['cart'] ?? null;
        if (!$cart || count($cart) === 0) {
            echo json_encode(['status' => 0, 'message' => 'Giỏ hàng trống']);
            die;
        }
        $data = json_decode(file_get_contents('php://input'), true);
        addorder($conn, $data);
        echo json_encode(['status' => 1, 'message' => 'Đặt hàng thành công']);
        break;
    case 'PUT':

        if (isset($_GET['admin'])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $status = $data['status'];
            updatestatusorder($conn, null, $data, $status,true);
            echo json_encode(['status' => 1, 'message' => 'Cập nhật đơn thành công']);
        } else {
            $checkuser = $_SESSION['user'] ?? null;
            if (!$checkuser) {
                echo json_encode(['status' => 0, 'message' => 'Bạn chưa đăng nhập']);
                die;
            }
            $data = json_decode(file_get_contents('php://input'), true);
            $status = 3;
            updatestatusorder($conn, $checkuser['id'], $data, $status);
            echo json_encode(['status' => 1, 'message' => 'Hủy đơn hàng thành công']);
        }

        break;
    default:
        echo json_encode(['status' => 0, 'message' => 'Method not allowed']);
        break;
}


function getallorder($conn, $iduser, $admin = false)
{

    try {

        if ($admin) {
            $sql = "select dh.ID as iddh,dh.NgayDat,dh.TrangThai,dh.fullname,dh.phone,dh.address,dh.totalprice, ct.dathang_id as idctdh,ct.SoLuong as ctsl,ct.dongia as ctdg,sp.ID as idsp,sp.TenSP as spt,sp.HinhAnh as sph from dathang dh
            inner join chitietdathang ct on ct.dathang_id = dh.ID
            inner join sanpham sp on sp.ID = ct.sanpham_id";
        } else {
            $sql = "select dh.ID as iddh,dh.NgayDat,dh.TrangThai,dh.fullname,dh.phone,dh.address,dh.totalprice, ct.dathang_id as idctdh,ct.SoLuong as ctsl,ct.dongia as ctdg,sp.ID as idsp,sp.TenSP as spt,sp.HinhAnh as sph from dathang dh
            inner join chitietdathang ct on ct.dathang_id = dh.ID
            inner join sanpham sp on sp.ID = ct.sanpham_id
            where dh.taikhoan_id = $iduser";
        }

        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $res = [];

        // $odered = [];
        foreach ($data as $item) {
            $iddh = $item['iddh'];
            $idctdh = $item['idctdh'];
            $index = array_search($iddh, array_column($res, 'iddh'));
            if ($index === false) {
                $res[] = [
                    'iddh' => $iddh,
                    'NgayDat' => $item['NgayDat'],
                    'TrangThai' => $item['TrangThai'],
                    'fullname' => $item['fullname'],
                    'phone' => $item['phone'],
                    'address' => $item['address'],
                    'totalprice' => $item['totalprice'],
                    'chitiet' => [
                        [
                            'idctdh' => $idctdh,
                            'ctsl' => $item['ctsl'],
                            'ctdg' => $item['ctdg'],
                            'idsp' => $item['idsp'],
                            'spt' => $item['spt'],
                            'sph' => $item['sph']
                        ]
                    ]
                ];
            } else {
                $res[$index]['chitiet'][] = [
                    'idctdh' => $idctdh,
                    'ctsl' => $item['ctsl'],
                    'ctdg' => $item['ctdg'],
                    'idsp' => $item['idsp'],
                    'spt' => $item['spt'],
                    'sph' => $item['sph']
                ];
            }
        }
        return $res;
    } catch (Exception $err) {
        echo json_encode(['status' => 0, 'message' => $err->getMessage()]);
        die;
    }

    die;
}

function addorder($conn, $data)
{
    $user = $_SESSION['user'];
    $cart = $_SESSION['cart'];

    $user_id = $user['id'];
    $fullname = $data['fullname'];
    $phone = $data['phone'];
    $address = $data['address'];
    $status = 0;
    $total = array_reduce($cart, function ($acc, $cur) {
        return $acc + $cur['tongtien'];
    }, 0);

    try {
        $sql = "INSERT INTO dathang(taikhoan_id,fullname,phone,address,TrangThai,totalprice) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'isssid', $user_id, $fullname, $phone, $address, $status, $total);
        mysqli_stmt_execute($stmt);
        $order_id = mysqli_insert_id($conn);
    } catch (Exception $e) {
        echo json_encode(['status' => 0, 'message' => $e->getMessage()]);
        die;
    }

    try {
        $sql = "INSERT INTO chitietdathang(dathang_id,sanpham_id,SoLuong,dongia) VALUES(?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        foreach ($cart as $item) {
            $product_id = $item['idsp'];
            $quantity = $item['soluong'];
            $price = $item['dongia'];
            mysqli_stmt_bind_param($stmt, 'iiid', $order_id, $product_id, $quantity, $price);
            mysqli_stmt_execute($stmt);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 0, 'message' => $e->getMessage()]);
        die;
    }
    unset($_SESSION['cart']);
}

function updatestatusorder($conn, $iduser, $data, $status, $admin = false)
{
        $iddh = $data['id'];
        // kiểm tra trạng thái đơn hàng trong cơ sở dữ liệu
        $sql = "SELECT TrangThai FROM dathang WHERE ID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $iddh);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $order = mysqli_fetch_assoc($result);

        try {
            if($admin){
                if($order['TrangThai'] == 3){
                    echo json_encode(['status' => 0, 'message' => 'Đơn hàng đã bị hủy']);
                    die;
                }

                $sql = "UPDATE dathang SET TrangThai = ? WHERE ID = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, 'ii', $status, $iddh);
                mysqli_stmt_execute($stmt);
            }else{
            if($order['TrangThai'] != 0){
                echo json_encode(['status' => 0, 'message' => 'Đơn hàng đã được xác nhận hoặc đã hủy']);
                die;
            }
            $sql = "UPDATE dathang SET TrangThai = ? WHERE ID = ? AND taikhoan_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'iii', $status, $iddh, $iduser);
            mysqli_stmt_execute($stmt);
            }
            return true;
        } catch (Exception $e) {
            echo json_encode(['status' => 0, 'message' => $e->getMessage()]);
            die;
        }
    
}
