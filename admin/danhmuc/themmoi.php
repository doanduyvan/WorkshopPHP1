<?php
require './config/database.php';

if(isset($_POST['tendm'])){
    $tendm = $_POST['tendm'];
    $tendm = $conn->real_escape_string($tendm);
    $sql = "INSERT INTO danhmuc(TenDM) values ('$tendm')";
    if($conn->query($sql) === true){
        echo "<script>alert('Thêm danh mục thành công!');</script>";
        echo "<script>window.location.href = '?page=danhmuc';</script>";
    }else{
        echo "thất bại" . $conn->connect_error ; 
    }
}
?>

<?php include_once "./header_footer/header.php" ?>
            <h2 class="mt-3">Thêm mới danh mục</h2>

            <form class="d-flex flex-wrap" method="post" action="">
                <div class="form-group flex-grow-1 col-12">
                    <label for="formGroupExampleInput2">Tên danh mục</label>
                    <input type="text" class="form-control" name="tendm" id="formGroupExampleInput2"
                        placeholder="Tên danh mục mới">
                </div>
                <div class="form-group flex-grow-1 col-4">
                <input type="submit" class="btn btn-success mb-3" value="Thêm mới">
                </div>
            </form>

<?php include_once "./header_footer/footer.php" ?>