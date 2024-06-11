<?php
require '../config/database.php';

if(isset($_POST['tendm'])){
    $tendm = $_POST['tendm'];
    $sql = "INSERT INTO danhmuc(TenDM) values ('$tendm')";
    if($conn->query($sql) === true){
        echo "Thêm thành công";
    }else{
        echo "thất bại" . $conn->connect_error ; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        article {
            height: 100vh;
        }
    </style>
</head>

<body class="container-fluid">
    <article class="row">
        <section class="col-2 bg-secondary pb-4">
            <figure class="figure mt-3 center">
                <img src="https://www.adobe.com/content/dam/cc/us/en/creativecloud/design/discover/mascot-logo-design/mascot-logo-design_fb-img_1200x800.jpg"
                    class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption text-center text-white font-weight-bold">
                    Xin chào, tên của bạn<br>
                    <a class="text-dark" href="">Đăng xuất</a>
                </figcaption>
            </figure>
            <hr>
            <nav>
                <div class="list-group">
                    <a class="list-group-item list-group-item-action list-group-item-dark" href="index.php">
                        <i class="bi bi-clipboard mr-2" style="font-size: 20px;"></i>Quản lý danh mục
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-dark" href="../index.php">
                        <i class="bi bi-tag mr-2" style="font-size: 20px;"></i>Quản lý sản phẩm
                    </a>
                </div>
            </nav>
        </section>
        <section class="col-10 bg-light">
            <h2 class="mt-3">Thêm mới danh mục</h2>

            <form class="d-flex flex-wrap" method="post" action="">
                <div class="form-group flex-grow-1 col-4">
                    <label for="formGroupExampleInput2">Tên sản danh mục</label>
                    <input type="text" class="form-control" name="tendm" id="formGroupExampleInput2"
                        placeholder="Tên danh mục mới">
                </div>
                <div class="form-group flex-grow-1 col-4">
                <input type="submit" class="btn btn-success mb-3" value="Thêm mới">
                </div>
            </form>
        </section>
    </article>
</body>

</html>