<?php
session_start();
$method = $_SERVER['REQUEST_METHOD'] ?? null;
include_once "../admin/config/Database.php";
switch ($method) {
    case 'GET':
        $action = $_GET['action'] ?? null;
        switch ($action) {
            case 'logout':
                session_destroy();
                echo json_encode(['message' => 'Logout success']);
                break;
            default:
                echo json_encode(['status' => 0,'message' => 'Action not allowed']);
                break;
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $action = $data['action'] ?? null;
        if ($action == 'login') {
            $user = loginUser($conn, $data);
            if ($user) {
                $_SESSION['user'] = $user;
                echo json_encode($user);
            }
        } else if ($action == 'register') {
            $user = createUser($conn, $data);
            if ($user) {
                $_SESSION['user'] = $user;
                echo json_encode($user);
            }
        } else {
            echo json_encode(['message' => 'Action not allowed']);
        }
        break;
    case 'PUT':
        echo json_encode(['message' => 'PUT method']);
        break;
    case 'DELETE':
        echo json_encode(['message' => 'DELETE method']);
        break;
    default:
        echo json_encode(['message' => 'Method not allowed']);
        break;
}


function createUser($conn, $data)
{
    $table = 'taikhoan';
    $fullname = $data['fullname'];
    $email = $data['email'];
    $password = $data['password'];
    $confirm = $data['confirm'];

    $sql = "INSERT INTO $table (TenTK, Email, MatKhau) VALUES ('$fullname', '$email', '$password')";
    try {
        mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        return [
            'id' => $id,
            'fullname' => $fullname,
            'email' => $email
        ];
    } catch (Exception $e) {
        echo json_encode(['status' => 0, 'message' => 'Email đã tồn tại']);
        die();
    }
}

function loginUser($conn, $data)
{
    $table = 'taikhoan';
    $email = $data['email'];
    $password = $data['password'];
    $sql = "SELECT * FROM $table WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo json_encode(['status' => 0, 'message' => 'Email không tồn tại']);
        die();
    } else {
        if ($user['MatKhau'] == $password) {
            return [
                'id' => $user['ID'],
                'fullname' => $user['TenTK'],
                'email' => $user['Email']
            ];
        } else {
            echo json_encode(['status' => 0, 'message' => 'Mật khẩu không đúng']);
            die();
        }
    }
}
