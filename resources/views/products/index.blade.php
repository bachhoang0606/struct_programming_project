@extends('layouts.layouts')
@section('content')
<div class="container">
    <h1 class="my-3">Product</h1>
    <table>
        <th>ID</th>
        <th>Name</th>
        <th>Coin</th>
        <th>Discount</th>
        <?php
            foreach ($products as $products){
                print '<tr>';
                print"<td>$products->product_id</td>";
                print"<td>$products->name</td>";
                print"<td>$products->coin</td>";
                print"<td>$products->discount</td>";
                print '</tr>';
            }
        ?>
    </table>
    <br>
</div>
@endsection
