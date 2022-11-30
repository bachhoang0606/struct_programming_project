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
        <table>
            <th>ID</th>
            <th>Type</th>
            <th>Price</th>
            <th>Percent</th>
            <th>MaxPrice</th>
            <th>Ngay tao</th>
            <th>Ngay sua</th>
            <?php
                foreach ($voucher_list as $voucher){
                    if($voucher->price){
                        $type = "freship";
                        $price = $voucher->price;
                        $precent = "none";
                        $max_price = "none";
                    }else{
                        $type = "disscount";
                        $price = "none";
                        $precent = $voucher->percent;
                        $max_price = $voucher->max_price;
                    }
                    if($voucher->created_at){
                        $created = $voucher->created_at;
                    }else
                        $created = "null";
                    if($voucher->created_at){
                        $updated = $voucher->updated_at;
                    }else
                        $updated = "null";
                    print '<tr>';
                    print"<td>$voucher->voucher_id</td>";
                    print"<td>$type</td>";
                    print"<td>$price</td>";
                    print"<td>$precent</td>";
                    print"<td>$max_price</td>";
                    print"<td>$created</td>";
                    print"<td>$updated</td>";
                    print '</tr>';
                }
            ?>
            {{-- <tr>
                <td>1</td>
                <td>freeship</td>
                <td>12000</td>
                <td>23/09/2001</td>
                <td>null</td>
            </tr> --}}
        </table>
    </div>

@endsection
