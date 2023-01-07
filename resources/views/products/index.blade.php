@extends('layouts.layouts')
@section('content')
<div class="container">
    <h1 class="my-3">Product</h1>
    <table>
        <x-validation-error class="mb-4":errors = "$errors"/>
        <th>ID</th>
        <th>Name</th>
        <th>Coin</th>
        <th>Discount</th>
        <th>Edit</th>

        <?php foreach ($products as $products) : ?>
            <tr>
                <td><?= $products->product_id; ?></td>
                <td><?= $products->name; ?></td>
                <td><?= $products->coin; ?></td>
                <td><?= $products->discount; ?></td>
                <td><a href="{{url('product.edit/'.$products->product_id)}}" class="btn btn-success">Edit</a></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <br>
</div>
@endsection