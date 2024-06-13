<?php
$conn = mysqli_connect('localhost', 'root', 'duyvan2001', 'workshopphp1_pet');
    if($conn->connect_error){
        echo "kết nối cơ sở dữ liệu không thành công";  
    }

?>