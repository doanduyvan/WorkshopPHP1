

<?php

    include_once 'config/database.php';
    $sql = "SELECT * FROM danhmuc";
    $result = mysqli_query($conn, $sql);
    $danhmuc = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $danhmuc[] = $row;
        }
    }

    if(isset($_POST['btn_them'])){
        $idtaikhoan = 1;

        $tensp = $_POST['tensp'];
        $dongia = empty($_POST['giasp']) ? 0 : $_POST['giasp'];
        $soluong = empty($_POST['soluongsp']) ? 0 : $_POST['soluongsp'];
        $mota = $_POST['motasp'];
        $iddm = $_POST['iddanhmuc'];
        $hinhanh = $_FILES['hinhsp'];
        $checkhinh = $hinhanh['error'] == 0 ? true : false;
        if($checkhinh){
            move_uploaded_file($hinhanh['tmp_name'], 'img/'.$hinhanh['name']);
        }
        $namehinh = $hinhanh['name'];

        $isnum = ['Gia', 'SoLuong','danhmuc_id','taikhoan_id'];
        $data = [
            'TenSP' => $tensp,
            'Gia' => $dongia,
            'MoTa' => $mota,
            'SoLuong' => $soluong,
            'HinhAnh' => $namehinh,
            'danhmuc_id' => $iddm,
            'taikhoan_id' => $idtaikhoan
        ];
        
        $checkadd = addrow($conn,'sanpham',$data,$isnum);
        if($checkadd){
            echo "Thêm mới thành công";
        }else{
            echo "Thêm mới thất bại";
        }
    }

    function addrow($conn,$table,$data,$rowisnum = []){

        $keys = implode(',',array_keys($data));
        $values = implode(',',array_values(array_map(function($key,$value) use ($rowisnum){
            return in_array($key,$rowisnum) ? ($value === '' ? 0 : $value)  :  "'".$value."'";
        },array_keys($data),$data)));
        $sql = "INSERT INTO $table($keys) VALUES ($values)";
        if(mysqli_query($conn, $sql)){
            return true;
        }
        return false;
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
                    <a class="list-group-item list-group-item-action list-group-item-dark" href="danhmuc">
                        <i class="bi bi-clipboard mr-2" style="font-size: 20px;"></i>Quản lý danh mục
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-dark" href="index.php">
                        <i class="bi bi-tag mr-2" style="font-size: 20px;"></i>Quản lý sản phẩm
                    </a>
                </div>
            </nav>
        </section>
        <section class="col-10 bg-light">
            <h2 class="mt-3">Thêm mới hàng hóa</h2>
            <a class="btn btn-success mb-3" href="">Thêm mới</a>
            <form class="d-flex flex-wrap" method="post" action="" enctype="multipart/form-data">

            <div class="form-group flex-grow-1 col-12">
                    <label for="formGroupExampleInput">Danh Mục</label>
                    <!-- <input type="text" class="form-control " disabled id="formGroupExampleInput"
                        placeholder="Example input placeholder"> -->
                    <select class="form-control" name="iddanhmuc" id="">
                        <?php foreach ($danhmuc as $dm) : ?>
                            <option value="<?php echo $dm['ID'] ?>"><?php echo $dm['TenDM'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>

             
                <div class="form-group flex-grow-1 col-4">
                    <label for="formGroupExampleInput2">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensp" id="formGroupExampleInput2"
                        placeholder="Tên Sản Phẩm">
                </div>
                <div class="form-group flex-grow-1 col-4">
                    <label for="formGroupExampleInput">Đơn giá</label>
                    <input type="number" class="form-control " name="giasp" id="formGroupExampleInput"
                        placeholder="Đơn Giá">
                </div>
                <div class="form-group flex-grow-1 col-4">
                    <label for="formGroupExampleInput">Số Lượng</label>
                    <input type="number" class="form-control" name="soluongsp" id="formGroupExampleInput"
                        placeholder="Số Lượng">
                </div>
                <div class="form-group flex-grow-1 col-12">
                    <label for="formGroupExampleInput2">Hình Ảnh</label>
                    <input type="file" class="form-control" name="hinhsp" id="formGroupExampleInput2">
                </div>
                <div class="form-group flex-grow-1 col-12">
                    <label for="formGroupExampleInput2">Mô tả</label>
                    <textarea class="form-control" name="motasp" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group flex-grow-1 col-12">
                    <input type="submit" name="btn_them" value="Thêm" class="form-control btn btn-success mb-3">
                </div>
            </form>
        </section>
    </article>
</body>

</html>