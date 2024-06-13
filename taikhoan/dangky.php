<?php
require('../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $tentk = $_POST['tentk'];
  $email = $_POST['email'];
  $matkhau = $_POST['password'];
  $confirm_password = $_POST['confirmpass'];
  $check_query = "select * from taikhoan where Email = '$email'";
  $result = $conn->query($check_query);
  if ($result->num_rows > 0) {
    echo "<script>alert('Email đã tồn tại')</script>";
  } else {
    if ($matkhau === $confirm_password) {
      $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
      $sql = "insert into taikhoan (TenTK ,Email, MatKhau) values('$tentk' ,'$email', '$hashed_password')";
      if($conn->query($sql) == true){
        echo "<script>alert('Tạo tài khoản thành công')</script>";
      }else{
        echo "<script>alert('Tạo tài khoản thất bại')</script>";
      }
    } else {
      echo "<script>alert('Mật khẩu không trùng khớp')</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Đăng nhập</title>
</head>

<body>
  <div class="login-box">

    <form action="" method="post">
      <div class="user-box">
        <input type="text" name="tentk" required="">
        <label>Tên tài khoản</label>
      </div>
      <div class="user-box">
        <input type="email" name="email" required="">
        <label>Emai</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <center>
        <div class="user-box">
          <input type="password" name="confirmpass" required="">
          <label>Nhập lại mật khẩu</label>
        </div>
        <center>
          <button>
            SEND
            <span></span>
          </button>
        </center>
        <a href="dangnhap.php">Đăng Nhập</a>
    </form>
  </div>
</body>

</html>