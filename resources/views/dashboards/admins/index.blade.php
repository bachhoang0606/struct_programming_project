@extends('layouts.admins.layouts')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-sm-8 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5" style="font-size: 20px;">{{ \App\Models\Freeship::count() }} Freeship
                        Voucher</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-8 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-address-card"></i>
                    </div>
                    <div class="mr-5" style="font-size: 20px;">{{ \App\Models\PercentDiscount::count() }}
                        Percent Discount Voucher</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-8 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5" style="font-size: 20px;">{{ \App\Models\PriceDiscount::count() }} Price
                        Discount Voucher</div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-wrapper">
        <div class="voucher-list-wrapper">
            <h2>Voucher List</h2>
            <div class="voucher-list shadow">
                <div class="voucher-list-row border-bottom">
                    <div class="item-1">ID</div>
                    <div class="item-2">Type</div>
                    <div class="item-3">Price</div>
                    <div class="item-4">Effective</div>
                    <div class="item-5">Expiration</div>
                </div>
                <?php 
                    foreach ($freeships as $freeship) {
                        $voucher = $freeship->voucher;
                        print "
                        <div class=\"voucher-list-row border-bottom\">
                            <div class=\"item-1\">$freeship->voucher_id</div>
                            <div class=\"item-2\">Freeship</div>
                            <div class=\"item-3\">$freeship->price</div>
                            <div class=\"item-4\">$voucher->effective_date</div>
                            <div class=\"item-5\">$voucher->expiration_date</div>
                        </div>
                        ";
                    }
                ?>
                <?php 
                foreach ($percent_discounts as $percent_discount) {
                    $voucher = $percent_discount->voucher;
                    print "
                    <div class=\"voucher-list-row border-bottom\">
                        <div class=\"item-1\">$percent_discount->voucher_id</div>
                        <div class=\"item-2\">Price discount</div>
                        <div class=\"item-3\">$percent_discount->max_price</div>
                        <div class=\"item-4\">$voucher->effective_date</div>
                        <div class=\"item-5\">$voucher->expiration_date</div>
                    </div>
                    ";
                }
                ?>
                <?php 
                foreach ($price_discounts as $price_discount) {
                    $voucher = $price_discount->voucher;
                    print "
                    <div class=\"voucher-list-row border-bottom\">
                        <div class=\"item-1\">$price_discount->voucher_id</div>
                        <div class=\"item-2\">Discount</div>
                        <div class=\"item-3\">$price_discount->price</div>
                        <div class=\"item-4\">$voucher->effective_date</div>
                        <div class=\"item-5\">$voucher->expiration_date</div>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>
        <div class="user-coin-wrapper">
            <h2>User coin</h2>
            <div class="user-coin shadow">
                <div class="user-coin-row border-bottom">
                    <div class="user-coin-item-1">Name</div>
                    <div class="user-coin-item-2">Coin</div>
                </div>
                <?php
                    foreach ($coin_cards as $coin_card){
                        if($coin_card->coin > 0)
                        print "
                            <div class=\"user-coin-row border-bottom\">
                                <div class=\"user-coin-item-1\">$coin_card->name</div>
                                <div class=\"user-coin-item-2\">$coin_card->coin</div>
                            </div>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>
@endsection


<!-- <div class="col-xl-3 col-sm-8 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-users"></i>
              </div>
              <div class="mr-5"style="font-size: 20px;">{{ \App\Models\User::count() }} Users</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ url('user') }}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>!-->
