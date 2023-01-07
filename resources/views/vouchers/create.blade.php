@extends('layouts.layouts')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<form action="{{ route('create') }}" method="POST">
    @csrf
    <input type="hidden" name="sent" value="1">

    <div class="form-group">
        <label for="title" class="form-label">Set title</label><br>
        <input type="text" name="title" class="form-control" required>
    </div>
    <p></p>
    <div class="form-group">
        <label for="content" class="form-label">Write description: </label><br>
        <textarea name="content" id="" cols="30" rows="5" placeholder="Describe voucher" class="form-control" required></textarea>
    </div>
    <p></p>
    <div class="form-group">
        <label for="minimun_price" class="form-label">Minimum price</label><br>
        <input type="number" name="minimun_price" value="0" min="0" class="form-control" required>
    </div>
    <p></p>
    <div class="form-group">
        <label for="quantium" class="form-label">Amount of vouchers:</label><br>
        <input type="number" name="quantium" value="1" min="1" class="form-control" required>
    </div>
    <p></p>    
    <div class="form-group">
        <label for="effective_date" class="form-label">Effective date: </label>
        <input type="date" name="effective_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="expiration_date" class="form-label">Expiration date: </label>
        <input type="date" name="expiration_date" class="form-control" required>
    </div>
    <p></p>
    <div class="form-group">
        <label for="price" id="label_price">Price: </label>
        <input type="number" id="input_price" name="price" value="0" min="0" class="form-control" required>
    </div>
    <h4>Choose types for voucher:</h4>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="free_ship" name="Vtype" value="freeships" onclick="perDisOption()" required>
        <label class="form-check-label" for="freeships">Free ship</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="percent_discount" name="Vtype" value="percentDiscounts" min="0" onclick="perDisOption()">
        <label class="form-check-label" for="percentDiscounts">Percent discount</label>
    </div>
    <div class="form-group">
        <label for="max_price" name="label_perDis" style="display:none">Set max price: </label>
        <input type="number" id="set_max" name="max_price" value="0" min="0" style="display:none" class="form-control">
    </div>
    <div class="form-group">
        <label for="percent" name="label_perDis" style="display:none">Set percentage: </label>
        <input type="number" id="set_percent" name="percent" value="0" min="0" max="100" style="display:none" class="form-control">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="price_discount" name="Vtype" value="priceDiscounts" onclick="perDisOption()">
        <label class="form-check-label" for="priceDiscounts">Price discount</label>
    </div>
    {{-- <h4>Choose range of products:</h4>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="VGeneral" name="Vrange" value="VGeneral" onclick="vGeneralOption()" required>
        <label class="form-check-label" for="VGeneral">Available for all product</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="VProduct" name="Vrange" value="VProduct" onclick="vProductOption()">
        <label class="form-check-label" for="VProduct">Available for an amount of products</label>
    </div>
    <div class="form-group">
        <label for="set_of_products" id="label_Vproduct" style="display:none">Please enter product's names: </label>
        <input type="text" id="input_Vproduct" name="set_of_products" style="display:none" class="form-control">
    </div> --}}
    <p></p><input type="submit" value="Submit" class="btn btn-primary" onclick="perDisOption()">
</form>
<br>
@endsection

<script>
    
    function perDisOption(){
        let checkbox = document.getElementById('percent_discount');
        let label = document.getElementsByName('label_perDis');
        let input1 = document.getElementById('set_max');
        let input2 = document.getElementById('set_percent');
        if (checkbox.checked){
            label[0].style.display = "block";
            label[1].style.display = "block";
            input1.style.display = "block";
            input2.style.display = "block";
            input1.required = true;
            input2.required = true;
            
            document.getElementById('input_price').disabled = true;
        }else{
            label[0].style.display = "none";
            label[1].style.display = "none";
            input1.style.display = "none";
            input1.value=0;
            input2.style.display = "none";
            input2.value=0;
            input1.required = false;
            input2.required = false;
            document.getElementById('input_price').disabled = false;
        }
    }
    function vProductOption(){
        let label = document.getElementById('label_Vproduct');
        let input = document.getElementById('input_Vproduct');
        
        label.style.display = "block";
        input.style.display = "block";
        input.required = true;
    }
    function vGeneralOption(){
        let label = document.getElementById('label_Vproduct');
        let input = document.getElementById('input_Vproduct');
        label.style.display = "none";
        input.style.display = "none";
        input.value="";
        input.required = false;
    }
    
</script>

    

