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
    
    <div>
        <h2>Freeship voucher</h2>
        <table>
            <th>ID</th>
            <th>Type</th>
            <th>Price</th>
            <th>Created</th>
            <th>Updated</th>
            <?php
                foreach ($freeships as $freeship){
                    print '<tr>';
                    print"<td>$freeship->voucher_id</td>";
                    print"<td>Freeship</td>";
                    print"<td>$freeship->price</td>";
                    print"<td>$freeship->created_at</td>";
                    print"<td>$freeship->updated_at</td>";
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
                foreach ($percent_discounts as $percent_discount){
                    print '<tr>';
                    print"<td>$percent_discount->voucher_id</td>";
                    print"<td>Discount</td>";
                    print"<td>$percent_discount->percent</td>";
                    print"<td>$percent_discount->max_price</td>";
                    print"<td>$percent_discount->created_at</td>";
                    print"<td>$percent_discount->updated_at</td>";
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
                foreach ($price_discounts as $price_discount){
                    print '<tr>';
                    print"<td>$price_discount->voucher_id</td>";
                    print"<td>Price discount</td>";
                    print"<td>$price_discount->price</td>";
                    print"<td>$price_discount->created_at</td>";
                    print"<td>$price_discount->updated_at</td>";
                    print '</tr>';
                }
            ?>
        </table>
        
    </div>

@endsection
