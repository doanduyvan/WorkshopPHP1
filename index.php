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
                    <td>Danh mục</td>
                    <td>Hành động</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="" >Sửa</a>
                        <a class="btn btn-danger" href="" 
                        onclick="confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Iphone 14</td>
                    <td>11111111111</td>
                    <td>Hình ảnh</td>
                    <td>Apple</td>
                    <td>
                        <a class="btn btn-info" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>

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