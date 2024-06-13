<?php
require('../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $matkhau = $_POST['password'];
  $sql = "SELECT * FROM taikhoan WHERE Email = '$email'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if(password_verify($matkhau, $row['MatKhau'])){
      echo "đăng nhập thành công";
    }else{
      echo "Mật khẩu không khớp";
    }
    $_SESSION['loggedin'] = true;
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['MaKH'] = $row['TenTK'];
        $_SESSION['VaiTro'] = $row['VaiTro'];
        $_SESSION['HinhAnh'] = $row['HinhAnh'];
        $_SESSION['ID'] = $row['ID'];
        if($_SESSION['VaiTro'] === 'admin') {
          header("Location: ../index.php");
          exit;
      } else {
          header("Location: ../index.php");
          exit;
      }
  }else{
    echo "tài khoản koong tồn tại";
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
     <input type="email" name="email" required="">
     <label>Username</label>
   </div>
   <div class="user-box">
     <input type="password" name="password" required="">
     <label>Password</label>
   </div><center>
   <button>
          Đăng nhập
      <span></span>
   </button></center>
   <a href="dangky.php">Đăng ký</a>
 </form>
</div>
</body>
</html>