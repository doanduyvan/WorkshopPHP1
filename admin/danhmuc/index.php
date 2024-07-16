<?php
require './config/database.php';
$result = mysqli_query($conn, "SELECT * FROM danhmuc");
?>



            <?php include_once "./header_footer/header.php" ?>
            <h2 class="mt-3">Quản lý danh mục</h2>
            <a class="btn btn-success mb-3" href="?page=danhmuc&action=add">Thêm mới</a>
            <table class="table table-bordered table-hover bg-white">
                <tr class="table-active">
                    <td>Mã DM</td>
                    <td>Tên DM</td>
                    <td>Chức năng</td>
                </tr>
                    <?php while($row = mysqli_fetch_assoc( $result )){ ?>
                    <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['TenDM'];?></td>
                    <td>
                        <a class="btn btn-info" href="?page=danhmuc&action=edit&id=<?php echo $row['ID'] ?>">Sửa</a>
                        <a class="btn btn-danger" href="?page=danhmuc&action=delete&id= <?php echo $row['ID']?>" onclick="return confirmDelete()">Xóa</a>

                    </td>
                </tr>
                <?php } ?>

            </table>
            <ul class="pagination pagination-sm text-dark">
                <li class="page-item active" aria-current="page">
                    <a class="page-link bg-dark border-0" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
            </ul>

            <?php include_once "./header_footer/footer.php" ?>


            <script>

                function confirmDelete(){
                    return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');
                }

            </script>