<?php
$conn = mysqli_connect('localhost', 'root', 'phamngoctam', 'pet_shop');
    if($conn->connect_error){
        echo "kết nối cơ sở dữ liệu không thành công";  
    }

?>