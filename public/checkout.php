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
<?php include_once 'header.php' ?>
<div style="margin-top: 180px;"></div>
<div class="text-center"><h2>CheckOut</h2></div>

<div class="container">
<div class="row">
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body">
                    <ol class="activity-checkout mb-0 px-4 mt-3">
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-receipt text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Billing Info</h5>
                                    <p class="text-muted text-truncate mb-4">Sed ut perspiciatis unde omnis iste</p>
                                    <div class="mb-3">
                                        <form id="form-checkout">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-name">Name</label>
                                                            <input type="text" name="fullname" class="form-control" id="billing-name" placeholder="Enter name">
                                                        </div>
                                                    </div>
                       
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-phone">Phone</label>
                                                            <input type="text" name="phone" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                                        </div>
                                                    </div>
                                                </div>

                                        

                                     
                                                <div class="mb-3 mt-3">
                                                    <label class="form-label" for="billing-address">Address</label>
                                                    <textarea class="form-control" name="address" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-truck text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Shipping Info</h5>
                                    <p class="text-muted text-truncate mb-4">Neque porro quisquam est</p>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div data-bs-toggle="collapse" class="rounded">
                                                    <label class="card-radio-label mb-0">
                                                        <input type="radio" name="address" id="info-address1" class="card-radio-input" checked="">
                                                        <div class="card-radio text-truncate p-3">
                                                            <span class="fs-14 mb-4 d-block">Address 1</span>
                                                            <span class="fs-14 mb-2 d-block">Bradley McMillian</span>
                                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">109 Clarksburg Park Road Show Low, AZ 85901</span>
                                                           
                                                            <span class="text-muted fw-normal d-block">Mo. 012-345-6789</span>
                                                        </div>
                                                    </label>
                                                    <div class="edit-btn bg-light rounded">
                                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <i class="bx bx-pencil font-size-16"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div>
                                                    <label class="card-radio-label mb-0">
                                                        <input type="radio" name="address" id="info-address2" class="card-radio-input">
                                                        <div class="card-radio text-truncate p-3">
                                                            <span class="fs-14 mb-4 d-block">Address 2</span>
                                                            <span class="fs-14 mb-2 d-block">Bradley McMillian</span>
                                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">109 Clarksburg Park Road Show Low, AZ 85901</span>
                                                            <span class="text-muted fw-normal d-block">Mo. 012-345-6789</span>
                                                        </div>
                                                    </label>
                                                    <div class="edit-btn bg-light  rounded">
                                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <i class="bx bx-pencil font-size-16"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> -->

                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Payment method</h5>
                                </div>
                                <div>
                                    <div class="row mt-3">
                             
                                        
                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" disabled name="pay-method" id="pay-methodoption2" class="card-radio-input">
                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                    </span>
                                                    <p>Paypal</p>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked="">

                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bx bx-money d-block h2 mb-3"></i>
                                                        <span>Cash on Delivery</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <a href="ecommerce-products.html" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <a href="#" class="btn btn-success" id="btn-checkout">
                            <i class="mdi mdi-cart-outline me-1"></i> Procced </a>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
        <div class="col-xl-4">
            <div class="card checkout-order-summary">
                <div class="card-body">
              
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                    <th class="border-top-0 text-right" scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody id="render">
                                <!-- <tr>
                                    <td>
                                        <h5 class="font-size-16 text-truncate" style="max-width: 150px !important;"><a href="#" class="text-dark" >Waterproof Mobile Phone</a></h5>
                                        <p class="text-muted mb-0 mt-1">$ 260 x 2</p>
                                    </td>
                                    <td class="text-right">$ 520</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-16 text-truncate" style="max-width: 150px !important;"><a href="#" class="text-dark">Smartphone Dual Camera</a></h5>
                                        <p class="text-muted mb-0 mt-1">$ 260 x 1</p>
                                    </td>
                                    <td class="text-right">$ 260</td>
                                </tr>
                                <tr class="bg-light">
                                    <td colspan="">
                                        <h5 class="font-size-14 m-0">Total:</h5>
                                    </td>
                                    <td class="text-right">
                                        $ 745.2
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php' ?>


<script>
    function render(data){
        const render = document.getElementById('render');
        render.innerHTML = '';
        let alltotal = 0;
        data.forEach(item => {
            alltotal += item.tongtien;
            const tr = document.createElement('tr');
            tr.innerHTML = `
            <td>
            <h5 class="font-size-16 text-truncate" style="max-width: 150px !important;"><a href="#" class="text-dark" >${item.tensp}</a></h5>
            <p class="text-muted mb-0 mt-1">${item.dongia}đ x ${item.soluong}</p>
            </td>
            <td class="text-right">${item.tongtien}đ</td>
            `;
            render.appendChild(tr);
        });
        const tr = document.createElement('tr');
        tr.classList.add('bg-light');
        tr.innerHTML = `
        <td colspan="">
        <h5 class="font-size-14 m-0">Total:</h5>
        </td>
        <td class="text-right">
        ${alltotal}đ
        </td>
        `;
        render.appendChild(tr);
    }

    getcart();
    async function getcart(){
        const response = await fetch('api/cart.php');
        const data = await response.json();
        render(data);
        console.log(data)
    }

    document.getElementById('btn-checkout').addEventListener('click',checkout);
    function checkout(e){
        e.preventDefault();
        const form = document.getElementById('form-checkout');
        const formData = new FormData(form);
        const reqData = {
            fullname: formData.get('fullname'),
            phone: formData.get('phone'),
            address: formData.get('address'),
        };
        // validate không được để trống
        if(reqData.fullname.trim() === '' || reqData.phone.trim() === '' || reqData.address.trim() === ''){
            alert('Vui lòng nhập đầy đủ thông tin');
            return;
        }
        fetch('api/order.php',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(reqData)
        })
        .then(res => res.json())
        .then(data => {
            if(data.status == 0){
                alert(data.message);
            }else{
                alert(data.message);
                window.location.href = 'public?page=order';
            }
            console.log("data res",data)
        });
    }
</script>