<?php
require_once 'config/database.php';

$sql = "SELECT * FROM sanpham";
$result = mysqli_query($conn, $sql);
$products = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}
$sql = "SELECT * FROM danhmuc";
$result = mysqli_query($conn, $sql);
$category = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $category[] = $row;
    }
}
$keycategory = array_column($category, 'TenDM', 'ID');

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql = "DELETE FROM sanpham WHERE ID = $id";
    if(mysqli_query($conn, $sql)){
        header('location: index.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        article {
            height: 100vh;
        }
        .myimg{
            width: 100px;
            aspect-ratio: 1/1;
            object-fit: cover;
        }
        .tdimg{
           text-align: center;
        }
    </style>
</head>

<body class="container-fluid">
    <article class="row">
        <section class="col-2 bg-secondary pb-4">
            <figure class="figure mt-3 center">
                <img src="https://www.adobe.com/content/dam/cc/us/en/creativecloud/design/discover/mascot-logo-design/mascot-logo-design_fb-img_1200x800.jpg" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption text-center text-white font-weight-bold">
                    Xin chào, tên của bạn<br>
                    <a class="text-dark" href="">Đăng xuất</a>
                </figcaption>
            </figure>
            <hr>
            <nav>
                <div class="list-group">
                    <a class="list-group-item list-group-item-action list-group-item-dark" href="">
                        <i class="bi bi-clipboard mr-2" style="font-size: 20px;"></i>Quản lý danh mục
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-dark" href="">
                        <i class="bi bi-tag mr-2" style="font-size: 20px;"></i>Quản lý sản phẩm
                    </a>
                </div>
            </nav>
        </section>
        <section class="col-10 bg-light">
            <h2 class="mt-3">Quản lý hàng hóa</h2>
            <a class="btn btn-success mb-3" href="addnew.php">Thêm mới</a>
            <table class="table table-bordered table-hover bg-white">
                <tr class="table-active">
                    <td>Mã SP</td>
                    <td>Tên SP</td>
                    <td>Đơn giá</td>
                    <td>Hình ảnh</td>
                    <td>Số lượng</td>
                    <td>Danh mục</td>
                    <td>Hành động</td>
                </tr>

                <?php
                foreach ($products as $item) {
                ?>
                    <tr>
                        <td><?= $item['ID'] ?></td>
                        <td><?= $item['TenSP'] ?></td>
                        <td><?= $item['Gia'] ?></td>
                        <td class="tdimg">
                            <img class="myimg" src="img/<?= $item['HinhAnh'] ?>" alt="">
                        </td>
                        <td><?= $item['SoLuong'] ?></td>
                        <td><?= $keycategory[$item['danhmuc_id']] ?></td>
                        <td>
                            <a class="btn btn-info" href="editproduct.php?edit=<?= $item['ID'] ?>">Sửa</a>
                            <a class="btn btn-danger" href="index.php?del=<?= $item['ID'] ?>">Xóa</a>
                        </td>
                    </tr>

                <?php
                }
                ?>







            </table>
            <ul class="pagination pagination-sm text-dark">
                <li class="page-item active" aria-current="page">
                    <a class="page-link bg-dark border-0" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
            </ul>
        </section>
    </article>
    <script>

    </script>
</body>

</html>