@extends('layouts.admins.layouts')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="bg-image bg-opacity-50"  style="background-image:linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url('{{$image_url}}');height: 95vh;">
<div class="container-fluid px-4 d-flex justify-content-center align-items-center h-100">
    <div class="card mt-4 w-50" style="opacity: 1;">
        <div class="card-header">
            <h4 class="text-center">Edit coin and discount</h4>
        </div>
        <div class="card-body">
            <form action="{{url('/admins/product.update/'.$products->product_id)}}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="coin"  value="{{ old('coin', $products->coin) }}"class="form-control">
               </div> 

               <div class="mb-3">
                    <label>Discount</label>
                    <input type="text" name="discount"  value="{{ old('discount', $products->discount) }}"class="form-control">
               </div> 

               <div class="mb-6">
                <button type="submit" class="btn btn-primary">Update product</button>
               </div>
            </form>
        </div>
    </div>
    </div>
</div>
</div>
@endsection