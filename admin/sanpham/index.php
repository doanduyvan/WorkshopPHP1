<?php
require_once './config/database.php';

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

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "DELETE FROM sanpham WHERE ID = $id";
    if (mysqli_query($conn, $sql)) {
        header('location: ?page=sanpham');
        exit();
    }
}

?>


<?php include_once "./header_footer/header.php" ?>

<style>
    .myimg {
        width: 100px;
        aspect-ratio: 1/1;
        object-fit: cover;
    }

    .tdimg {
        text-align: center;
    }
    table td {
        vertical-align: middle !important;
    }
</style>


    <h2 class="mt-3">Quản lý hàng hóa</h2>
    <a class="btn btn-success mb-3" href="?page=sanpham&action=add">Thêm mới</a>
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
                    <a class="btn btn-info" href="?page=sanpham&action=edit&id=<?= $item['ID'] ?>">Sửa</a>
                    <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này')" href="?page=sanpham&del=<?= $item['ID'] ?>">Xóa</a>
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

<?php include_once "./header_footer/footer.php" ?>