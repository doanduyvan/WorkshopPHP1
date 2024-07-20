<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="http://localhost/workshop/WorkshopPHP1/">
<link rel="stylesheet" type="text/css" href="public/libc/styles/bootstrap4/bootstrap.min.css">
<link href="public/libc/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="public/libc/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="public/libc/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="public/libc/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="public/libc/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="public/libc/styles/responsive.css">
</head>
<?php include_once "header.php" ?>
<div style="margin-top: 175px;"></div>

<style>
    .table>tbody>tr>td {
        vertical-align: middle;
    }

    /* .table>tbody>tr:first-child>td {
        border-top: none;
    } */
    .cart{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 50px;
    }
    .myimg{
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
</style>

<div class="container">
    <div class="cart">cart</div>
</div>

<section class="">
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Tổng Tiền</th>
                    <th>Số Lượng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="render">
                <!-- <tr>
                    <td class="col-2"><img src="https://via.placeholder.com/100" alt=""></td>
                    <td class="col-4">Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam</td>
                    <td class="col-2">150,000,000đ</td>
                    <td class="col-2">200,000đ</td>
                    <td class="col-1 text-center"><input class="form-control" type="number" value="5"></td>
                    <td class="col-2 text-center"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
                </tr> -->
                <!-- <tr>
                    <td colspan="6">Chua co san pham</td>
                </tr> -->
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">
                        Tổng tiền hàng: <span style="font-weight: normal;" id="tongtien"></span>
                    </th>
                </tr>
            </tfoot>
        </table>

        <div class="row mt-5">
            <div class="col-6">
                <button class="btn btn-primary" id="updatecart">Update</button>
            </div>
            <div class="col-6 text-right">
                <a href="public?page=checkout" class="btn btn-danger">Checkout</a>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php" ?>

<script>

    function rendercart(data){
        const render = document.getElementById('render');
        const tongtien = document.getElementById('tongtien');
        render.innerHTML = '';
        data.forEach(item => {
            const tr = document.createElement('tr');
            tr.setAttribute('data-id',item.idsp);
            tr.innerHTML = `
            <td class="col-2"><img class="myimg" src="admin/img/${item.img}" alt=""></td>
            <td class="col-4">${item.tensp}</td>
            <td class="col-2">${item.dongia}đ</td>
            <td class="col-2">${item.tongtien}đ</td>
            <td class="col-1 text-center"><input class="form-control soluong" type="number" value="${item.soluong}"></td>
            <td class="col-2 text-center"><button class="btn btn-danger del"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
            `;
            render.appendChild(tr);
            tr.querySelector('.del').addEventListener('click',function(){
                tr.remove();
            });
            tr.querySelector('.soluong').addEventListener('change',function(){
                const soluong = this.value;
                if(soluong < 1){
                    this.value = 1;
                }
            });
        });
        tongtien.innerHTML = data.reduce((acc,cur) => acc + cur.tongtien,0) + 'đ';
    }

    document.getElementById('updatecart').addEventListener('click',updatecart);

    function updatecart(){
        const render = document.getElementById('render');
        const trs = render.querySelectorAll('tr');
        const data = [];
        trs.forEach(tr => {
            const id = tr.getAttribute('data-id');
            const soluong = tr.querySelector('input').value;
            data.push({id,soluong});
        });

        if(data.length === 0){
            return;
        }

        fetch('api/cart.php',{
            method: 'PUT',
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            rendercart(data.data);
            console.log(data)
        });
    }

    getData()
    function getData(){
        fetch('api/cart.php')
        .then(res => res.json())
        .then(data => {
            rendercart(data);
            console.log(data)
        });
    }

</script>

<?php
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>