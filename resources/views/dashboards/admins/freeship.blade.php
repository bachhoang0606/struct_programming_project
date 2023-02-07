@extends('layouts.admins.layouts')
@section('content')
<h2>Freeship Voucher</h2>
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
@endsection