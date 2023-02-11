@extends('layouts.admins.layouts')
@section('content')
<h2>Percent Discount Voucher</h2>
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
@endsection