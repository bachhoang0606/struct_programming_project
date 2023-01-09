@extends('layouts.layouts')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit coin and discount</h4>
        </div>
        <div class="card-body">
            <form action="{{url('product.update/'.$products->product_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <div class="mb-3">
                    <label>Product ID</label>
                    <input type="text" name="id" readonly="readonly" value="{{$products->product_id}}"class="form-control">
               </div> 

               <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" readonly="readonly" value="{{$products->name}}"class="form-control">
               </div> 

               <div class="mb-3">
                    <label>Coin</label>
                    <input type="text" name="coin"  value="{{$products->coin}}"class="form-control">
               </div> 

               <div class="mb-3">
                    <label>Discount</label>
                    <input type="text" name="discount"  value="{{$products->discount}}"class="form-control">
               </div> 

               <div class="mb-6">
                <button type="submit" class="btn btn-primary">Update product</button>
               </div>
            </form>
        </div>
    </div>
</div>
@endsection