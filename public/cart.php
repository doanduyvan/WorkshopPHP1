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
        </table>

        <div class="row mt-5">
            <div class="col-6">
                <button class="btn btn-primary">Update</button>
            </div>
            <div class="col-6 text-right">
                <a href="#" class="btn btn-danger">Checkout</a>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php" ?>

<script>

    function rendercart(data){
        const render = document.getElementById('render');
        render.innerHTML = '';
        data.forEach(item => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
            <td class="col-2"><img src="https://via.placeholder.com/100" alt=""></td>
            <td class="col-4">Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam</td>
            <td class="col-2">150,000,000đ</td>
            <td class="col-2">200,000đ</td>
            <td class="col-1 text-center"><input class="form-control" type="number" value="5"></td>
            <td class="col-2 text-center"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
            `;
            render.appendChild(tr);
        });
    }

    function getData(){
        fetch('api/cart.php')
        .then(res => res.json())
        .then(data => {
            rendercart(data);
        });
    }

</script>