<?php
require_once './config/database.php';

if (isset($_POST['TenDM'])) {
    $id = $_POST['id'];
    $TenDM = $_POST['TenDM'];
    $TenDM = $conn->real_escape_string($TenDM);
    $sql = "UPDATE danhmuc SET TenDM = '$TenDM' where ID = $id";

    try {
        $conn->query($sql);
        echo "<script>alert('Cập nhật thông tin danh mục thành công!');</script>";
        echo "<script>window.location.href = '?page=danhmuc';</script>";
    } catch (Exception $e) {
        echo "dong 15 <br>";
        echo $e->getMessage();
        die();
    }
}

$checkid = isset($_GET['id']) ? $_GET['id'] : null;
$result = mysqli_query($conn, "SELECT * FROM danhmuc where ID = $checkid");
$row = mysqli_fetch_assoc($result);

?>

<?php include_once "./header_footer/header.php" ?>
<h2 class="mt-3">Cập nhật danh mục</h2>
<form class="d-flex flex-wrap" action="?page=danhmuc&action=edit" method="post">
    <div class="form-group flex-grow-1 col-6">
        <label for="formGroupExampleInput2">Tên danh mục</label>
        <input type="text" class="form-control" name="TenDM" id="formGroupExampleInput2" value="<?php echo $row['TenDM'] ?>">
    </div>
    <div class="form-group flex-grow-1 col-6">
        <label for="formGroupExampleInput">Mã danh mục</label>
        <input type="text" class="form-control" readonly name="id" id="formGroupExampleInput" value="<?= $row['ID'] ?>">
    </div>
    <div class="from-group col-12">
        <input type="submit" class="btn btn-success mb-3" value="Cập nhật">
    </div>
</form>
<?php include_once "./header_footer/footer.php" ?>