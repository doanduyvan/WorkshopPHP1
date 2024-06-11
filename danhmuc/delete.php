<?php
require '../config/database.php';
 $checkid = isset($_GET['ID']) ? $_GET['ID'] : null;
$result = mysqli_query($conn, "SELECT * FROM danhmuc where ID = $checkid");
$row = mysqli_fetch_assoc($result);
if(isset($_POST['TenDM'])){
    $TenDM = $_POST['TenDM'];
    $sql = "DELETE from danhmuc where ID = $checkid";
    if($conn->query($sql) === true){
        echo "<script>alert('Xóa danh mục thành công!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }else{
        echo "thất bại" . $conn->connect_error ; 
    }
}

?>

<div class="container-1">
        <div class="confirm-form">
            <h1>Bạn có chắc chắn muốn xóa danh mục này không?</h1>
            <form action="" method="post">
                <input type="hidden" name="TenDM" value="<?php echo $_GET['ID']; ?>">
                <br>
                <button type="submit" name="confirm" value="yes">CÓ</button>
                <button type="button" onclick="history.back()">HỦY</button>
            </form>
        </div>
    </div>