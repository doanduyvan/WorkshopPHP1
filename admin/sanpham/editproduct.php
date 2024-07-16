<?php
include_once './config/database.php';

if (isset($_POST['btn_fix'])) {

    $table = 'sanpham';
    $id = $_POST['id'];
    $Fhinh = $_FILES['hinhsp'];
    $isnum = ['Gia', 'SoLuong', 'danhmuc_id'];
    $data = [
        'TenSP' => $_POST['tensp'],
        'Gia' => $_POST['giasp'],
        'SoLuong' => $_POST['soluongsp'],
        'MoTa' => $_POST['motasp'],
        'danhmuc_id' => $_POST['iddanhmuc']
    ];
    if($Fhinh['error'] == 0){
        $data['HinhAnh'] = $Fhinh['name'];
        move_uploaded_file($Fhinh['tmp_name'], './img/' . $Fhinh['name']);
    }

    $check = editrow($conn, $table, $id, $data, $isnum);
    if ( $check ===  1) {
        echo "<script>alert('Sửa thành công')</script>";
        echo "<script>window.location.href = '?page=sanpham'</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại')</script>";
        echo $check;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
    $sql = "SELECT * FROM danhmuc";
    $result = mysqli_query($conn, $sql);
    $danhmuc = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $danhmuc[] = $row;
        }
    }
} else {
    header('location: ?page=sanpham');
}

function editrow($conn, $table, $id, $data, $typedata = array())
{
    $array_values = array_map(function ($key, $value) use ($typedata,$conn) {
        $value = mysqli_real_escape_string($conn,$value);
        $value_tmp = in_array($key, $typedata) ? $value : "'" . $value . "'";
        return $key . '=' . $value_tmp;
    }, array_keys($data), $data);
    $values = implode(',', $array_values);
    $sql = "UPDATE $table SET $values WHERE ID = $id";
    try {
        $conn->query($sql);
        return 1;
    } catch (Exception $err) {
        return $err;
    }
}
?>



<?php include_once "./header_footer/header.php" ?>

<style>
    .myimg {
        width: 200px;
        aspect-ratio: 1/1;
        object-fit: cover;
    }
</style>
<h2 class="mt-3">Sửa hàng hóa</h2>
<a class="btn btn-success mb-3" href="">Thêm mới</a>
<form class="d-flex flex-wrap" method="post" action="?page=sanpham&action=edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['ID'] ?>">
    <div class="form-group flex-grow-1 col-12">
        <label for="formGroupExampleInput">Danh Mục</label>
        <select class="form-control" name="iddanhmuc" id="">
            <?php foreach ($danhmuc as $dm) : ?>
                <option value="<?php echo $dm['ID'] ?>" <?= $product['danhmuc_id'] == $dm["ID"] ? "selected" : '' ?>><?php echo $dm['TenDM'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="form-group flex-grow-1 col-4">
        <label for="formGroupExampleInput2">Tên sản phẩm</label>
        <input type="text" class="form-control" name="tensp" id="formGroupExampleInput2" value="<?= $product['TenSP'] ?>" placeholder="Tên Sản Phẩm">
    </div>
    <div class="form-group flex-grow-1 col-4">
        <label for="formGroupExampleInput">Đơn giá</label>
        <input type="number" class="form-control " name="giasp" id="formGroupExampleInput" value="<?= $product['Gia'] ?>" placeholder="Đơn Giá">
    </div>
    <div class="form-group flex-grow-1 col-4">
        <label for="formGroupExampleInput">Số Lượng</label>
        <input type="number" class="form-control" name="soluongsp" id="formGroupExampleInput" value="<?= $product['SoLuong'] ?>" placeholder="Số Lượng">
    </div>
    <div class="form-group flex-grow-1 col-12">
        <img class="myimg" src="img/<?= $product['HinhAnh'] ?>" alt="">
    </div>
    <div class="form-group flex-grow-1 col-12">
        <label for="formGroupExampleInput2">Hình Ảnh</label>
        <input type="file" class="form-control" name="hinhsp" id="formGroupExampleInput2">
    </div>
    <div class="form-group flex-grow-1 col-12">
        <label for="formGroupExampleInput2">Mô tả</label>
        <textarea class="form-control" name="motasp" id="" cols="30" rows="10"><?= $product['MoTa'] ?></textarea>
    </div>

    <div class="form-group flex-grow-1 col-12">
        <input type="submit" name="btn_fix" value="Cập nhật" class="form-control btn btn-success mb-3">
    </div>
</form>

<?php include_once "./header_footer/footer.php" ?>