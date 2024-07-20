<?php include_once "./header_footer/header.php" ?>
<style>
    .table>tbody>tr>td,
    .table>tbody>tr>th {
        vertical-align: middle;
        /* padding: 0 !important; */
    }
    .myimg{
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
<div style="margin-top: 30px;"></div>
<div class="container text-center">
    <h2>Order</h2>
</div>

<div class="container mt-3">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tất cả</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Chờ sử lí</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Đã xác nhận</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#hoanthanh" role="tab" aria-controls="contact" aria-selected="false">Hoàn thành</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dahuy" role="tab" aria-controls="contact" aria-selected="false">Đã hủy</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <ul class="mt-3" style="list-style: none; padding: 0;">
                <li class="border mt-5">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tên Sản Phẩm</th>
              
                                <th>Đơn Giá</th>
                                <th>Tổng Tiền</th>
                                <th>Số Lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-2"><img src="https://via.placeholder.com/100" alt=""></td>
                                <td class="col-4">Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam</td>
                                <td class="col-2">150,000,000đ</td>
                                <td class="col-2">200,000đ</td>
                                <td class="col-1 text-center"><span>5</span></td>
                            </tr>
                            <tr>
                                <td class="col-2"><img src="https://via.placeholder.com/100" alt=""></td>
                                <td class="col-4">Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam Áo thun nam</td>
                                <td class="col-2">150,000,000đ</td>
                                <td class="col-2">200,000đ</td>
                                <td class="col-1 text-center"><span>5</span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">
                                    Tổng tiền hàng: <span style="font-weight: normal;" id="tongtien">500đ</span>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="5">
                                    <div class="">
                                        <p class="" style="color: black;"><strong>Ngày đặt:</strong> 434</p>
                                        <p class="" style="color: black;"><strong>Người đặt:</strong> 434</p>
                                        <p class="" style="color: black;"><strong>Số điện thoại:</strong> 434</p>
                                        <p class="" style="color: black;"><strong>Địa chỉ:</strong> 434</p>
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="5">
                                    Trạng thái: <span style="font-weight: normal;" id="tongtien">Đang chờ xử lí</span>
                                </th>

                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">
                                        <div class="">
                                            <button class="btn btn-success">Xác nhận</button>
                                            <button class="btn btn-danger">Hủy đơn hàng</button>
                                        </div>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </li>
            </ul>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">..2</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">..3</div>
        <div class="tab-pane fade" id="hoanthanh" role="tabpanel" aria-labelledby="contact-tab">.. hoan thanh</div>
        <div class="tab-pane fade" id="dahuy" role="tabpanel" aria-labelledby="contact-tab">..da huy</div>
    </div>
</div>

<?php include_once "./header_footer/footer.php" ?>


<script>

    const base_url = 'http://localhost/workshop/WorkshopPHP1/';

    tabs();
    function tabs() {
        const tabs = document.querySelectorAll('.nav-link');
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const tab_id = this.getAttribute('href').replace('#', '');
                const tab_pane = document.getElementById(tab_id);
                const tab_content = document.querySelectorAll('.tab-pane');
                const tabold = document.querySelector('.nav-link.active');
                tabold.classList.remove('active');
                this.classList.add('active');
                tab_content.forEach(content => {
                    content.classList.remove('show');
                    content.classList.remove('active');
                });
                tab_pane.classList.add('show');
                tab_pane.classList.add('active');
            });
        });
    }

    
    function renderorder(data){
        const renderall = document.getElementById('home');
        const renderwait = document.getElementById('profile');
        const renderconfirm = document.getElementById('contact');
        const renderdone = document.getElementById('hoanthanh');
        const rendercancel = document.getElementById('dahuy');

        const datawait = data.filter(item=> item.TrangThai == 0);
        const dataconfirm = data.filter(item=> item.TrangThai == 1);
        const datadone = data.filter(item=> item.TrangThai == 2);
        const datacancel = data.filter(item=> item.TrangThai == 3);

        renderfilter(renderall,data);
        renderfilter(renderwait,datawait);
        renderfilter(renderconfirm,dataconfirm);
        renderfilter(renderdone,datadone);
        renderfilter(rendercancel,datacancel);

        function renderfilter(nodeElement,datafilered){
            if(datafilered.length === 0){
                nodeElement.innerHTML = '<h4 class="text-center mt-5">Không có đơn hàng nào</h4>';
                return;
            }
            let datasort = datafilered.sort((a,b)=> b.iddh - a.iddh );
            let status = {
                "0": 'Chờ sử lí',
                "1": 'Đã xác nhận',
                "2": 'Hoàn Thành',
                "3": 'Đã hủy'
            }
            nodeElement.innerHTML = '';
            const ul = document.createElement('ul');
            ul.classList.add('mt-3');
            ul.style.listStyle = 'none';
            ul.style.padding = '0';
            datasort.forEach(item=>{
                const li = document.createElement('li');
                li.classList.add('border','mt-5');
                const table = document.createElement('table');
                table.classList.add('table','table-hover','m-0');
                const thead = document.createElement('thead');
                thead.innerHTML = `
                <tr>
                <th></th>
                <th>Tên Sản Phẩm</th>
                <th>Đơn Giá</th>
                <th>Tổng Tiền</th>
                <th>Số Lượng</th>
                </tr>
                `;
                const tbody = document.createElement('tbody');
                item.chitiet.forEach(ct=>{
                    let tongtien = ct.ctsl * ct.ctdg;
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td class="col-2"><img class="myimg" src="${base_url}admin/img/${ct.sph}" alt=""></td>
                    <td class="col-4">${ct.spt}</td>
                    <td class="col-2">${ct.ctdg}đ</td>
                    <td class="col-2">${tongtien}đ</td>
                    <td class="col-1 text-center"><span>${ct.ctsl}</span></td>
                    `;
                    tbody.appendChild(tr);
                })
                const tfoot = document.createElement('tfoot');
                tfoot.innerHTML = `
                <tr>
                <th colspan="5">
                Tổng tiền hàng: <span style="font-weight: normal;" id="tongtien">${item.totalprice}đ</span>
                </th>
                </tr>
                <tr>
                <th colspan="5">
                <div class="">
                <p class="" style="color: black;"><strong>Ngày đặt:</strong> ${item.NgayDat}</p>
                <p class="" style="color: black;"><strong>Người đặt:</strong> ${item.fullname}</p>
                <p class="" style="color: black;"><strong>Số điện thoại:</strong> ${item.phone}</p>
                <p class="" style="color: black;"><strong>Địa chỉ:</strong> ${item.address}</p>
                </div>
                </th>
                </tr>
                <tr>
                <th colspan="5">
                Trạng thái: <span style="font-weight: normal;" id="tongtien"> ${status[item.TrangThai]}</span>
                </th>
                </tr>
                `;
                if(item.TrangThai == 0 || item.TrangThai == 1){
                    if(item.TrangThai == 0){
                        tfoot.innerHTML += `
                        <tr>
                        <th colspan="5" class="text-right">
                        <div class="">
                        <button class="btn btn-success status" data-s="1" data-iddh="${item.iddh}">Xác nhận</button>
                        <button class="btn btn-danger status" data-s="3" data-iddh="${item.iddh}">Hủy đơn hàng</button>
                        </div>
                        </th>
                        </tr>
                        `; 
                    }else if(item.TrangThai == 1){
                        tfoot.innerHTML += `
                        <tr>
                        <th colspan="5" class="text-right">
                        <div class="">
                        <button class="btn btn-success status" data-s="2" data-iddh="${item.iddh}">Hoàn thành</button>
                        <button class="btn btn-danger status" data-s="3" data-iddh="${item.iddh}">Hủy đơn hàng</button>
                        </div>
                        </th>
                        </tr>
                        `; 
                    }


                    [...tfoot.querySelectorAll('.status')].forEach(item=>{
                        item.onclick = ()=>{
                            const iddh = item.getAttribute('data-iddh');
                            const status = item.getAttribute('data-s');
                            if(status == 3){
                                if(!confirm('Bạn có chắc muốn hủy đơn hàng này không?')) return;
                            }
                            updatestatus(iddh,status);
                        }
                    })

                    function updatestatus(id,status){
                        fetch(base_url + 'api/order.php?admin',{
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({id: id, status: status})
                        }).then(res=>res.json())
                        .then(data=>{
                            if(data.status == 0){
                                alert(data.message);
                                return;
                            }
                            if(data.status == 1){
                                getallorder();
                                alert(data.message);
                            }
                        })
                    }
                }
                table.appendChild(thead);
                table.appendChild(tbody);
                table.appendChild(tfoot);
                li.appendChild(table);
                ul.appendChild(li);
            });
            nodeElement.appendChild(ul);
        }
    }

    async function getallorder(){
        const response = await fetch(base_url + 'api/order.php?admin');
        const data = await response.json();
        renderorder(data.data);
    }
    getallorder();
</script>