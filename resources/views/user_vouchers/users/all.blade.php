@extends('user_vouchers.users.display')

@section('voucherlist')
    <div class="voucher-list">
        
        <?php 
            $string = json_encode($data);
            $object = json_decode($string);
            $voucherList = [];
            $now = time();
            
            foreach ($object->voucher_list as $element) {
                # code...
                // print "$element->id";
                $voucherList[] = $element->id;
            }
            foreach ($vouchers as $voucher) {
                if(in_array($voucher->id, $voucherList) && (strtotime($voucher->expiration_date) - $now > 0)){
                # freeship...
                foreach ($freeships as $freeship) {
                    
                    if($voucher->id == $freeship->voucher_id){
                        print "
                        <div class=\"voucher-wrapper\">
                            <div class=\"left\">
                                <div class=\"left-title\">$voucher->title</div>
                            </div>
                            <div class=\"right\">
                                <div class=\"right-body\">
                                    <div class=\"content\">
                                        <span>$voucher->content</span>
                                    </div>
                                    <div class=\"date\">
                                        Có hiệu lực từ $voucher->effective_date
                                    </div>
                                </div>
                                <button class=\"right-footer\" onclick=\"displayIndex($voucher->id)\">
                                    Chi tiết
                                </button>
                            </div>
                        </div>              
                        ";
                        print "
                            <div id=\"$voucher->id\" class=\"voucher-detail-wrapper\">
                                <div class=\"voucher-detail\">
                                    <div class=\"voucher-detail-header\">
                                        <h4 class=\"voucher-detail-header-text\">Voucher $voucher->id</h4>
                                    </div>
                                    <div class=\"voucher-detail-body\">
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Ưu đãi</h6>
                                            <span>Lượt sử dụng có hạn. Nhanh tay kẻo lỡ bạn nhé!</span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Thời gian sử dụng mã</h6>
                                            <span>$voucher->effective_date - $voucher->expiration_date</span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Sản Phẩm</h6>
                                            <span>Tất cả sản phẩm</span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Xem chi tiết</h6>
                                            <span>
                                                Sử dụng mã hỗ trợ phí vận chuyển (Giảm $freeship->price trên 1 đơn hàng) <br> 
                                                HSD: $voucher->expiration_date <br>
                                                Số lượt sử dụng có hạn, chương trình và mã có thể kết thúc khi hết lượt ưu đãi hoặc khi hết hạn ưu đãi, tuỳ điều kiện nào đến trước.
                                            </span>
                                        </div>
                                    </div>
                                    <div class=\"voucher-detail-footer\">
                                        <button class=\"voucher-detail-footer-btn\" onclick=\"hideIndex($voucher->id)\">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
                # percent...
                foreach ($percent_discounts as $percent_discount) {
                    print "";
                    if($voucher->id == $percent_discount->voucher_id){
                        print "
                        <div class=\"voucher-wrapper\">
                            <div class=\"left percent\">
                                <div class=\"left-title\">$voucher->title</div>
                            </div>
                            <div class=\"right\">
                                <div class=\"right-body\">
                                    <div class=\"content\">
                                        <div class=\"percent-text\">Giảm $percent_discount->percent %</div>
                                        <div class=\"percent-price-max\">tối đa $percent_discount->max_price</div>
                                    </div>
                                    <div class=\"date\">
                                        Có hiệu lực từ $voucher->effective_date
                                    </div>
                                </div>
                                <button class=\"right-footer\" onclick=\"displayIndex($voucher->id)\">
                                    Chi tiết
                                </button>
                            </div>
                        </div>              
                        ";
                        print "
                            <div id=\"$voucher->id\" class=\"voucher-detail-wrapper\">
                                <div class=\"voucher-detail\">
                                    <div class=\"voucher-detail-header\">
                                        <h4 class=\"voucher-detail-header-text\">Voucher $voucher->id</h4>
                                    </div>
                                    <div class=\"voucher-detail-body\">
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Ưu đãi</h6>
                                            <span>
                                                Lượt sử dụng có hạn. Nhanh tay kẻo lỡ bạn nhé!<br>
                                                Giảm {$percent_discount->percent}% tối đa {$percent_discount->max_price}đ
                                            </span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Thời gian sử dụng mã</h6>
                                            <span>$voucher->effective_date - $voucher->expiration_date</span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Sản Phẩm</h6>
                                            <span>Tất cả sản phẩm</span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Xem chi tiết</h6>
                                            <span>
                                                Mã 11GIAM50K12H0 giảm {$percent_discount->percent}% tối đa {$percent_discount->max_price}đ cho đơn hàng hợp lệ.<br> 
                                                HSD: $voucher->expiration_date <br> 
                                                Số lượng có hạn. Mỗi khách hàng chỉ sử dụng 1 lần.
                                            </span>
                                        </div>
                                    </div>
                                    <div class=\"voucher-detail-footer\">
                                        <button class=\"voucher-detail-footer-btn\" onclick=\"hideIndex($voucher->id)\">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
                # price...
                foreach ($price_discounts as $price_discount) {
                    if($voucher->id == $price_discount->voucher_id){
                        print "
                        <div class=\"voucher-wrapper\">
                            <div class=\"left price\">
                                <div class=\"left-title\">$voucher->title</div>
                            </div>
                            <div class=\"right\">
                                <div class=\"right-body\">
                                    <div class=\"content\">
                                        <div class=\"price-text\">Giảm $price_discount->price</div>
                                    </div>
                                    <div class=\"date\">
                                        Có hiệu lực từ $voucher->effective_date
                                    </div>
                                </div>
                                <button class=\"right-footer\" onclick=\"displayIndex($voucher->id)\">
                                    Chi tiết
                                </button>
                            </div>
                        </div>              
                        ";
                        print "
                            <div id=\"$voucher->id\" class=\"voucher-detail-wrapper\">
                                <div class=\"voucher-detail\">
                                    <div class=\"voucher-detail-header\">
                                        <h4 class=\"voucher-detail-header-text\">Voucher $voucher->id</h4>
                                    </div>
                                    <div class=\"voucher-detail-body\">
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Ưu đãi</h6>
                                            <span>
                                                Lượt sử dụng có hạn. Nhanh tay kẻo lỡ bạn nhé!<br>
                                                Giảm {$price_discount->price}đ
                                            </span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Thời gian sử dụng mã</h6>
                                            <span>$voucher->effective_date - $voucher->expiration_date</span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Sản Phẩm</h6>
                                            <span>Tất cả sản phẩm</span>
                                        </div>
                                        <div class=\"voucher-detail-body-item\">
                                            <h6>Xem chi tiết</h6>
                                            <span>
                                                Mã 11GIAM50K12H0 giảm {$price_discount->price}đ cho đơn hàng hợp lệ.<br>
                                                HSD: $voucher->expiration_date <br>
                                                Số lượng có hạn. Mỗi khách hàng chỉ sử dụng 1 lần.
                                            </span>
                                        </div>
                                    </div>
                                    <div class=\"voucher-detail-footer\">
                                        <button class=\"voucher-detail-footer-btn\" onclick=\"hideIndex($voucher->id)\">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
            }
        }
        ?>

        {{-- base chi tiết --}}
        {{-- <div class="voucher-detail-wrapper">
            <div class="voucher-detail">
                <div class="voucher-detail-header">
                    <h4 class="voucher-detail-header-text">Voucher</h4>
                </div>
                <div class="voucher-detail-body">
                    <div class="voucher-detail-body-item">
                        <h6>Ưu đãi</h6>
                        <span>Lượt sử dụng có hạn. Nhanh tay kẻo lỡ bạn nhé!</span>
                    </div>
                    <div class="voucher-detail-body-item">
                        <h6>Thời gian sử dụng mã</h6>
                        <span>01.01.2023 - 01.01.2023</span>
                    </div>
                    <div class="voucher-detail-body-item">
                        <h6>Sản Phẩm</h6>
                        <span>Tất cả sản phẩm</span>
                    </div>
                    <div class="voucher-detail-body-item">
                        <h6>Xem chi tiết</h6>
                        <span>
                            Mã 11GIAM50K12H0 giảm 5% tối đa 50K cho đơn hàng hợp lệ từ 350K. 
                            HSD: 01/01/2023 12:00 - 01/01/2023 18:00. 
                            Số lượt sử dụng có hạn, chương trình và mã có thể kết thúc khi hết lượt ưu đãi hoặc khi hết hạn ưu đãi, tuỳ điều kiện nào đến trước.
                        </span>
                    </div>
                </div>
                <div class="voucher-detail-footer">
                    <button class="voucher-detail-footer-btn" onclick="">Ok</button>
                </div>
            </div>
        </div>
        
        ///base voucher
        <div class="voucher-wrapper">
            <div class="left">
                <div class="left-title">voucher giam gia percent discounts</div>
            </div>
            <div class="right">
                <div class="right-body">
                    <div class="content">
                        content
                    </div>
                    <div class="date">
                        co hieu lu tu
                    </div>
                </div>
                <div class="right-footer">
                    chi tiet
                </div>
            </div>
        </div> --}}
    </div>
@endsection


<script>
    // hien thi thong tin chi tiet
    function displayIndex(index){
        var let = document.getElementById(index);
        let.classList.add("show");
        console.log(let);
    }
    // an thi thong tin chi tiet
    function hideIndex(index){
        var let = document.getElementById(index);
        let.classList.remove("show");
        console.log(let);
    }
</script>