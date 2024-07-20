<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="http://localhost/workshop/WorkshopPHP1/">
<link rel="stylesheet" type="text/css" href="public/libc/styles/bootstrap4/bootstrap.min.css">
<link href="public/libc/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="public/libc/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="public/libc/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="public/libc/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="public/libc/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="public/libc/styles/responsive.css">
</head>

<?php include_once "header.php" ?>

<div class="container mx-auto p-4" style="margin-top: 150px;">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-light shadow-lg rounded mt-5">
        <div class="card-header bg-primary text-white px-4 py-2 rounded-top">Login</div>
        <div class="card-body p-4">
          <form id="form-login">
            <div class="form-group">
              <label for="username" class="font-weight-bold text-dark">Email</label>
              <input type="text" name="email" id="username" class="form-control mt-1 rounded border" placeholder="Enter Email" />
            </div>
            <div class="form-group mt-4">
              <label for="password" class="font-weight-bold text-dark">Password</label>
              <input type="password" name="password" id="password" class="form-control mt-1 rounded border" placeholder="Enter password" />
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "footer.php" ?>


<script>

    const form = document.getElementById('form-login');
    form.addEventListener('submit', function(e){
        e.preventDefault();
        const formData = new FormData(this);
        const data = {};
        data.action = 'login';
        data.email = formData.get('email');
        data.password = formData.get('password');
        // validate data
        if(data.email.length < 3){
            alert('Email phải lớn hơn 3 ký tự');
            return;
        }
        if(data.password.length < 3){
            alert('Mật khẩu phải lớn hơn 3 ký tự');
            return;
        }
        fetch('api/users.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.status == 0){
                alert(data.message);
            }else{
                alert('Đăng nhập thành công');
                window.location.href = 'public/';
            }
            console.log("data tra ve: ",data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

</script>
