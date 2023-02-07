@extends('layouts.admins.layouts')
@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<div class="container">
    <h1 class="my-3">Product</h1>
    <table>
        <x-validation-error class="mb-4":errors = "$errors"/>
        <th>Product</th>
        <th>Description</th>
        <th>Edit</th>

        <?php foreach ($products as $products) : ?>
            <tr>
                <td>
                    <img src="https://routine.vn/media/catalog/product/cache/5de180fdba0e830d350bd2803a0413e8/1/0/10f20pol002cr1_honey_gold_2__1.jpg" alt="" width="180px" height="230px"> 
                <td>
                <h5>ID: <?= $products->product_id; ?></h5>
                <h5>Product name: <?=$products->name; ?> </h5>
                <h5>Product coin: <?= $products->coin; ?> </h5>
                <h5>Percent discount: <?= $products->discount; ?>%</td><h5>
               </td>
                <td><a href="{{url('admins/product.edit/'.$products->product_id)}}" class="btn btn-success">Edit</a></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <br>
</div>
@endsection