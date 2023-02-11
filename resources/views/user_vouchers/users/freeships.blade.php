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
                                            <span>$voucher->create_at - $voucher->outdate_at</span>
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
            }}
        ?>
    </div>
@endsection

<script>
    // hien thi thong tin chi tiet
    function displayIndex(index){
        var let = document.getElementById(index);
        let.classList.add("show");
        console.log(let);
    }
    // an thong tin chi tiet
    function hideIndex(index){
        var let = document.getElementById(index);
        let.classList.remove("show");
        console.log(let);
    }
</script>