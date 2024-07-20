<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Product</title>
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
<link rel="stylesheet" href="public/libc/plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="public/libc/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="public/libc/styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="public/libc/styles/single_responsive.css">
</head>

<?php include_once "header.php" ?>

<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<!-- <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li><img src="images/single_1_thumb.jpg" alt="" data-image="images/single_1.jpg"></li>
									<li class="active"><img src="images/single_2_thumb.jpg" alt="" data-image="images/single_2.jpg"></li>
									<li><img src="images/single_3_thumb.jpg" alt="" data-image="images/single_3.jpg"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(images/single_2.jpg)"></div>
							</div>
						</div> -->

						<img class="img-fluid" id="myimg" src="" style="width: 100%;" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
                        <h2 id="myname"></h2>
                        <p id="mydes"></p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>free delivery</span>
					</div>
					<!-- <div class="original_price">$629.99</div> -->
					<div class="product_price mt-3" id="myprice">$495.00</div>
					<ul class="star_rating">
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
					</ul>
					<div class="product_color">
						<span>Select Color:</span>
						<ul>
							<li style="background: #e54e5d"></li>
							<li style="background: #252525"></li>
							<li style="background: #60b3f3"></li>
						</ul>
					</div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true" onclick="changeQ(-1)"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true" onclick="changeQ(1)"></i></span>
						</div>
						<div class="red_button add_to_cart_button"><a href="#" id="mybtn">add to cart</a></div>
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php include_once "footer.php" ?>


<script>

	 const urlParams = new URLSearchParams(window.location.search);
	 const id = urlParams.get('id');
	 if(id == null || isNaN(id)){
		 window.location.href = "public/";
	 }

	 function changeQ(value){
		 const quantity = document.getElementById('quantity_value');
		 if(parseInt(quantity.innerHTML) + value < 1){
			 return;
		 }
		 quantity.innerHTML = parseInt(quantity.innerHTML) + value;
	 }

    function render(data){
        const myimg = document.getElementById('myimg');
        const myname = document.getElementById('myname');
        const mydes = document.getElementById('mydes');
        const myprice = document.getElementById('myprice');
		const mybtn = document.getElementById('mybtn');
        myimg.src = "admin/img/" + data.HinhAnh;
        myname.innerHTML = data.TenSP;
        mydes.innerHTML = data.MoTa;
        myprice.innerHTML = data.Gia + "đ";
		mybtn.setAttribute("data-id", data.ID);
    }

    function fetchData(id){
        const url = "api/sanpham.php?id=" + id;
        fetch(url)
        .then(response => response.json())
        .then(data => {
			console.log(data);
			render(data);
		})
        .catch(error => console.log(error));
    }

	fetchData(id);


	const mybtn = document.getElementById('mybtn');
	mybtn.addEventListener('click',function(e){
		e.preventDefault();
		const id = this.getAttribute('data-id');
		const soluong = parseInt(document.getElementById('quantity_value').innerText);
		console.log(id,soluong);
		addcart(id,soluong);
	});

	function addcart(id,soluong){
			fetch('api/cart.php',{
				method: 'POST',
				body: JSON.stringify({id: id, soluong: soluong}),
			})
			.then(res => res.json())
			.then(data => {
				console.log(data);
				if(data.status == 0){
					alert(data.message);
				}else{
					document.getElementById('checkout_items').innerText = data.soluong;
					alert(data.message);
				}
			})
		}

</script>