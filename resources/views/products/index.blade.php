@extends('layouts.layouts')
@section('content')
    <h2>Products</h2>
    <table>
        <th>ID</th>
        <th>Name</th>
        <th>Coin</th>
        <th>Discount</th>
        <th>Created</th>
        <th>Updated</th>
        <?php
            foreach ($products as $products){
                print '<tr>';
                print"<td>$products->product_id</td>";
                print"<td>$products->name</td>";
                print"<td>$products->coin</td>";
                print"<td>$products->discount</td>";
                print"<td>$products->created_at</td>";
                print"<td>$products->updated_at</td>";
                print '</tr>';
            }
        ?>
    </table>
@endsection
