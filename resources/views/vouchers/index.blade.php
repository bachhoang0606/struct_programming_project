@extends('layouts.layouts')
@section('content')
<?php
// foreach ($voucher_list as $voucher){
//     print '<div class="container-voucher">
//         <div class="voucher-name">';
//     print "<span>";
//         if($voucher->price)
//             print "freeship";
//         else {
//                 print "discount";
//         }
//     print "</span>";
//     print '</div>
//     <div class="voucher-body">
//         <div class="voucher-conent">
//             <h3>don hang dau tien</h3>
//             <h4>co hieu luc tu ';
//         $voucher->created_at;
//      print'</h4>
//         </div>
//        <a class="link">chi tiet</a>
//     </div>

// </div>';
// }
// print "$voucher_list";
?>
{{-- @foreach ($voucher_list as $item)
        @php
            //dd($item);
        @endphp
    @endforeach --}}
    <div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h1>Dashboard</h1>
        </div>
        <div class="card-body">
        <div class="row">
    <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\Freeship::count()}} Freeship Voucher</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="">
          <span class="float-left"></span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-address-card"></i>
          </div>
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\PercentDiscount::count()}} Percent Discount Voucher</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="">
          <span class="float-left"></span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-comments"></i>
          </div>
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\PriceDiscount::count()}} Price Discount Voucher</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="">
          <span class="float-left"></span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
        <!-- <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-users"></i>
          </div>
          <div class="mr-5"style="font-size: 20px;">{{\App\Models\User::count()}} Users</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('user')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>!-->
    <div>
        <h2>Freeship voucher</h2>
        <table>
            <th>ID</th>
            <th>Type</th>
            <th>Price</th>
            <th>Created</th>
            <th>Updated</th>
            <?php
            foreach ($freeships as $freeship) {
                $voucher = $freeship->voucher;
                print '<tr>';
                print "<td>$freeship->voucher_id</td>";
                print "<td>Freeship</td>";
                print "<td>$freeship->price</td>";
                print "<td>$voucher->effective_date</td>";
                print "<td>$voucher->expiration_date</td>";
                print '</tr>';
            }
            ?>
        </table>

        <h2>Discount voucher</h2>
        <table>
            <th>ID</th>
            <th>Type</th>
            <th>Percent</th>
            <th>Max Price</th>
            <th>Created</th>
            <th>Updated</th>
            <?php
            foreach ($percent_discounts as $percent_discount) {
                $voucher = $percent_discount->voucher;
                print '<tr>';
                print "<td>$percent_discount->voucher_id</td>";
                print "<td>Discount</td>";
                print "<td>$percent_discount->percent</td>";
                print "<td>$percent_discount->max_price</td>";
                print "<td>$voucher->effective_date</td>";
                print "<td>$voucher->expiration_date</td>";
                print '</tr>';
            }
            ?>
        </table>

        <h2>Price voucher</h2>
        <table>
            <th>ID</th>
            <th>Type</th>
            <th>Price</th>
            <th>Created</th>
            <th>Updated</th>
            <?php
            foreach ($price_discounts as $price_discount) {
                $voucher = $price_discount->voucher;
                print '<tr>';
                print "<td>$price_discount->voucher_id</td>";
                print "<td>Price discount</td>";
                print "<td>$price_discount->price</td>";
                print "<td>$voucher->effective_date</td>";
                print "<td>$voucher->expiration_date</td>";
                print '</tr>';
            }
            ?>
        </table>
        
    </div>
    </div>
<br>
@endsection