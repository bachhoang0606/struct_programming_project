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

        <?php foreach ($products as $product) : ?>
            <tr>
                <td>
                    @foreach ($products_api as $product_api)
                        @if ($product_api['id']  == $product->product_id)
                            @php
                                $sub_products = $product_api['sub_products'];
                                foreach ($sub_products as $key => $value) {
                                    $image_url = $value['image_url'];
                                    break;
                                }
                            @endphp
                            <img src={{ $image_url }} alt="" width="180px" height="230px"> 
                            @break
                        @endif
                    @endforeach
                <td>
                <h5>ID: <?= $product->product_id; ?></h5>
                <h5>Product name: <?=$product->name; ?> </h5>
                <h5>Product coin: <?= $product->coin; ?> </h5>
                <h5>Percent discount: <?= $product->discount; ?>%</td><h5>
               </td>
                <td><a href="{{url('admins/product.edit/'.$product->product_id.'?image_url='.$image_url)}}" class="btn btn-success">Edit</a></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <br>
</div>
@endsection