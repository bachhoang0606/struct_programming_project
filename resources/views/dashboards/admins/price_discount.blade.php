@extends('layouts.admins.layouts')
@section('content')
<h2>Price Discount Voucher</h2>
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
@endsection