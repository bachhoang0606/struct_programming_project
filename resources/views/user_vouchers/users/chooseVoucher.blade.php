@extends('layouts.users.layouts')

@section('display')

<div>
<!-- <h4>Choose vouchers: <a id="chosen-voucher"></a></h4> -->
<!-- <form action="" method="GET"> -->
    <div id="result"></div>
    <!-- <button id="submit_button" class="btn btn-success">Submit</button> -->
<!-- </form> -->
</div>
<script>
    let user_id;
    let user_vouchers = new Array();
    let voucher_id;

    function getVoucher(id){
        voucher_id = id;
        //console.log(voucher_id);
        //document.getElementById("chosen-voucher").innerHTML = voucher_id;
        let apiUrl = '/api/create-user-voucher?user_id=' + user_id + '&voucher_id=' + voucher_id;
            fetch(apiUrl, {method: 'POST',})
            .then(response => response.json())
            .then(
                response => {
                    if (response.message == "user had this voucher"){
                        alert(response.message);
                    }else{
                        window.location.reload();
                        alert("Add voucher successful!");
                    }
                        
                }
            )
    }

    function setUser(id){
        user_id = id;
    }

    function displayIndex(index){
        var let = document.getElementById(index);
        let.classList.add("show");
        //console.log(let);
    }
    function hideIndex(index){
        var let = document.getElementById(index);
        let.classList.remove("show");
        //console.log(let);
    }

    function checkExpDate(date){
        let exp_date = Date.parse(date);
        let today = new Date;
        if (exp_date > today)
            return true;
    
        return false;
    }

    setUser({{$id}});

    fetch(`/api/user-has-voucher/${user_id}`).then((res) => res.json()).then(
        response =>{
            //console.log(response.data.voucher_list[0].id);
            for (let i = 0; i < response.data.voucher_list.length; i++){
                user_vouchers.push(response.data.voucher_list[i].id);
            }
            //console.log(user_vouchers);
        }
    ).catch(error => console.log(error));

    
    fetch('/api/vouchers').then((res) => res.json()).then(
        response => {
            //console.log(response.data);
            let a = 0;
            let output = '<div class="container">';

            for (let i = 0; i < response.data.length; i++){
                if (i%3 == 0){
                    output += '<div class="row">';
                    a = i;
                }
                if (!user_vouchers.includes(response.data[i].id) && (checkExpDate(response.data[i]["expiration_date"].split(" ")[0]))){
                    if (response.data[i].type == "1"){ //freeship
                        output += `<div class="voucher-wrapper col">
                            <div class="left">
                                <div class="left-title">${response.data[i].titlle}</div>
                            </div>
                            <div class="right">
                                <div class="right-body">
                                    <div class="content">
                                        <span>${response.data[i].content}</span>
                                    </div>
                                    <div class="date">
                                        Có hiệu lực từ ${response.data[i]["effective date"]}
                                    </div>
                                </div>
                                <button class="right-footer" onclick="displayIndex(${response.data[i].id})">
                                    Chi tiết
                                </button>
                            </div>
                        </div>`;
                    }else if (response.data[i].type == "2"){ //price discount
                        output += `<><div class="voucher-wrapper col">
                            <div class="left price">
                                <div class="left-title">${response.data[i].titlle}</div>
                            </div>
                            <div class="right">
                                <div class="right-body">
                                <!--<div class="content">
                                        <div class="price-text">Giảm $price_discount->price</div>
                                    </div>-->
                                    <div class="content">
                                        <span>${response.data[i].content}</span>
                                    </div>
                                    <div class="date">
                                        Có hiệu lực từ ${response.data[i]["effective date"]}
                                    </div>
                                </div>
                                <button class="right-footer" onclick="displayIndex(${response.data[i].id})">
                                    Chi tiết
                                </button>
                            </div>
                        </div>`;
                    }else if (response.data[i].type == "3"){ //percent discount
                        output += `<div><div class="voucher-wrapper col">
                            <div class="left percent">
                                <div class="left-title">${response.data[i].titlle}</div>
                            </div>
                            <div class="right">
                                <div class="right-body">
                                    <!-- <div class="content">
                                        <div class="percent-text">Giảm $percent_discount->percent %</div>
                                        <div class="percent-price-max">tối đa $percent_discount->max_price</div>
                                    </div> -->
                                    <div class="content">
                                        <span>${response.data[i].content}</span>
                                    </div>
                                    <div class="date">
                                        Có hiệu lực từ ${response.data[i]["effective date"]}
                                    </div>
                                </div>
                                <button class="right-footer" onclick="displayIndex(${response.data[i].id})">
                                    Chi tiết
                                </button>
                            </div>
                        </div>`;
                    }
                    output += `<div id="${response.data[i].id}" class="voucher-detail-wrapper">
                                <div class="voucher-detail">
                                    <div class="voucher-detail-header">
                                        <h4 class="voucher-detail-header-text">Voucher ${response.data[i].id}</h4>
                                    </div>
                                    <div class="voucher-detail-body">
                                        <div class="voucher-detail-body-item">
                                            <h6>Ưu đãi</h6>
                                            <span>Lượt sử dụng có hạn. Nhanh tay kẻo lỡ bạn nhé!</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Thời gian sử dụng mã</h6>
                                            <span>${response.data[i]["effective date"]} - ${response.data[i].expiration_date}</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Số lượng còn lại</h6>
                                            <span>${response.data[i].quantium}</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Sản Phẩm</h6>
                                            <span>Tất cả sản phẩm</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Xem chi tiết</h6>
                                            <span>
                                            <!--Sử dụng mã hỗ trợ phí vận chuyển (Giảm $freeship->price trên 1 đơn hàng) <br> -->
                                                HSD: ${response.data[i].expiration_date} <br>
                                                Số lượt sử dụng có hạn, chương trình và mã có thể kết thúc khi hết lượt ưu đãi hoặc khi hết hạn ưu đãi, tuỳ điều kiện nào đến trước.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="voucher-detail-footer">
                                        <button class="voucher-detail-footer-btn btn-primary" onclick="getVoucher(${response.data[i].id})">Chọn voucher này</button>
                                        <button class="voucher-detail-footer-btn" onclick="hideIndex(${response.data[i].id})">Đồng ý</button>
                                    </div>
                                </div>
                            </div>`;
                }else{
                    if (response.data[i].type == "1"){ //freeship
                        output += `<div class="voucher-wrapper col">
                            <div class="left bg-secondary">
                                <div class="left-title">${response.data[i].titlle}</div>
                            </div>
                            <div class="right">
                                <div class="right-body">
                                    <div class="content">
                                        <span>${response.data[i].content}</span>
                                    </div>
                                    <div class="date">
                                        Có hiệu lực từ ${response.data[i]["effective date"]}
                                    </div>
                                </div>
                                <button class="right-footer" onclick="displayIndex(${response.data[i].id})">
                                    Chi tiết
                                </button>
                            </div>
                        </div>`;
                    }else if (response.data[i].type == "2"){ //price discount
                        output += `<div class="voucher-wrapper col">
                            <div class="left price bg-secondary">
                                <div class="left-title">${response.data[i].titlle}</div>
                            </div>
                            <div class="right">
                                <div class="right-body">
                                <!--<div class="content">
                                        <div class="price-text">Giảm $price_discount->price</div>
                                    </div>-->
                                    <div class="content">
                                        <span>${response.data[i].content}</span>
                                    </div>
                                    <div class="date">
                                        Có hiệu lực từ ${response.data[i]["effective date"]}
                                    </div>
                                </div>
                                <button class="right-footer" onclick="displayIndex(${response.data[i].id})">
                                    Chi tiết
                                </button>
                            </div>
                        </div>`;
                    }else if (response.data[i].type == "3"){ //percent discount
                        output += `<div class="voucher-wrapper col">
                            <div class="left percent bg-secondary">
                                <div class="left-title">${response.data[i].titlle}</div>
                            </div>
                            <div class="right">
                                <div class="right-body">
                                    <!-- <div class="content">
                                        <div class="percent-text">Giảm $percent_discount->percent %</div>
                                        <div class="percent-price-max">tối đa $percent_discount->max_price</div>
                                    </div> -->
                                    <div class="content">
                                        <span>${response.data[i].content}</span>
                                    </div>
                                    <div class="date">
                                        Có hiệu lực từ ${response.data[i]["effective date"]}
                                    </div>
                                </div>
                                <button class="right-footer" onclick="displayIndex(${response.data[i].id})">
                                    Chi tiết
                                </button>
                            </div>
                        </div>`;
                    }
                    output += `<div id="${response.data[i].id}" class="voucher-detail-wrapper">
                                <div class="voucher-detail">
                                    <div class="voucher-detail-header">
                                        <h4 class="voucher-detail-header-text">Voucher ${response.data[i].id}</h4>
                                    </div>
                                    <div class="voucher-detail-body">
                                        <div class="voucher-detail-body-item">
                                            <h6>Ưu đãi</h6>
                                            <span>Lượt sử dụng có hạn. Nhanh tay kẻo lỡ bạn nhé!</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Thời gian sử dụng mã</h6>
                                            <span>${response.data[i]["effective date"]} - ${response.data[i].expiration_date}</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Số lượng còn lại</h6>
                                            <span>${response.data[i].quantium}</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Sản Phẩm</h6>
                                            <span>Tất cả sản phẩm</span>
                                        </div>
                                        <div class="voucher-detail-body-item">
                                            <h6>Xem chi tiết</h6>
                                            <span>
                                            <!--Sử dụng mã hỗ trợ phí vận chuyển (Giảm $freeship->price trên 1 đơn hàng) <br> -->
                                                HSD: ${response.data[i].expiration_date} <br>
                                                Số lượt sử dụng có hạn, chương trình và mã có thể kết thúc khi hết lượt ưu đãi hoặc khi hết hạn ưu đãi, tuỳ điều kiện nào đến trước.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="voucher-detail-footer">
                                        <button class="voucher-detail-footer-btn btn-secondary" >Chọn voucher này</button>
                                        <button class="voucher-detail-footer-btn" onclick="hideIndex(${response.data[i].id})">Đồng ý</button>
                                    </div>
                                </div>
                            </div>`;
                }
                if (i == a + 2){
                    output += '</div>'
                }
            }
            output += '</div>';
            document.getElementById("result").innerHTML = output;
        }
    ).catch(error => console.log(error));

    window.addEventListener("load", function(){
        document.getElementById("submit_button").addEventListener("click", function(event){
            event.preventDefault();

            // let apiUrl = '/api/create-user-voucher?user_id=' + user_id + '&voucher_id=' + voucher_id;
            // fetch(apiUrl, {method: 'POST',})
            // .then(response => response.json())
            // .then(
            //     response => {
            //         if (response.message == "user had this voucher"){
            //             alert(response.message);
            //         }else{
            //             window.location.reload();
            //             alert("Add voucher successful!");
            //         }
                        
            //     }
            // )
        });
    });

</script>
@endsection

