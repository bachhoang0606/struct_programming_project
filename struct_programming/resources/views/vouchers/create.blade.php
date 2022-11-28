@extends('layouts.layouts')

@section('content')
<form action="" method="GET">
    <input type="hidden" name="sent" value="1">

    <div class="form-group">
        <label for="title" class="form-label">Set title</label><br>
        <input type="text" name="title" class="form-control">
    </div>
    <p></p>
    <div class="form-group">
        <label for="description" class="form-label">Write description: </label><br>
        <textarea name="description" id="" cols="30" rows="5" class="form-control">Describe your voucher</textarea>
    </div>
    <p></p>
    <div class="form-group">
        <label for="minimum_price" class="form-label">Minimum price</label><br>
        <input type="number" name="minimum_price" class="form-control">
    </div>
    <p></p>
    <div class="form-group">
        <label for="create_date" class="form-label">Create at: </label>
        <input type="date" name="create_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="expire_date" class="form-label">Expire at: </label>
        <input type="date" name="expire_date" class="form-control">
    </div>
    <p></p>
    <h4>Choose types for voucher:</h4>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="free_ship" name="free_ship" value="free_ship" onclick="freeShipOption()">
        <label class="form-check-label" for="free_ship">Free ship</label>
    </div>
    <div class="form-group">
        <label for="FP_price" id="label_FP_price" style="display:none">Price: </label>
        <input type="number" id="FP_price" name="FP_price" value="0" style="display:none" class="form-control">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="percent_discount" name="percent_discount" value="percent_discount" onclick="perDisOption()">
        <label class="form-check-label" for="percent_discount">Percent discount</label>
    </div>
    <div class="form-group">
        <label for="max_price" name="label_perDis" style="display:none">Set max price: </label>
        <input type="number" id="set_max" name="input_perDis_1" value="0" style="display:none" class="form-control">
    </div>
    <div class="form-group">
        <label for="percent" name="label_perDis" style="display:none">Set percentage: </label>
        <input type="number" id="set_percent" name="input_perDis_2" value="0" style="display:none" class="form-control">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="price_discount" name="price_discount" value="price_discount" onclick="priceDisOption()">
        <label class="form-check-label" for="price_discount">Price discount</label>
    </div>
    <div class="form-group">
        <label for="input_priceDis" id="label_priceDis" style="display:none">Price: </label>
        <input type="number" id="input_priceDis" name="input_priceDis" value="0" style="display:none" class="form-control">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="VGeneral" name="Vtype" value="VGeneral" checked onclick="vGeneralOption()">
        <label class="form-check-label" for="VGeneral">Available for all product</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="VProduct" name="Vtype" value="VProduct" onclick="vProductOption()">
        <label class="form-check-label" for="VProduct">Available for an amount of products</label>
    </div>
    <div class="form-group">
        <label for="set_of_products" id="label_Vproduct" style="display:none">Please enter product's names: </label>
        <input type="text" id="input_Vproduct" name="set_of_products" style="display:none" class="form-control">
    </div>
    <p></p><input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

<script>
    function freeShipOption(){
        let checkbox = document.getElementById('free_ship');
        let label = document.getElementById('label_FP_price');
        let input = document.getElementById('FP_price');

        if (checkbox.checked){
            label.style.display = "block";
            input.style.display = "block";
        }else{
            label.style.display = "none";
            input.style.display = "none";
            input.value=0;
        }
    }

    function perDisOption(){
        let checkbox = document.getElementById('percent_discount');
        let label = document.getElementsByName('label_perDis');
        let input1 = document.getElementById('set_max');
        let input2 = document.getElementById('set_percent')

        if (checkbox.checked){
            label[0].style.display = "block";
            label[1].style.display = "block";
            input1.style.display = "block";
            input2.style.display = "block";
        }else{
            label[0].style.display = "none";
            label[1].style.display = "none";
            input1.style.display = "none";
            input1.value=0;
            input2.style.display = "none";
            input2.value=0;
        }
    }

    function priceDisOption(){
        let checkbox = document.getElementById('price_discount');
        let label = document.getElementById('label_priceDis');
        let input = document.getElementById('input_priceDis');

        if (checkbox.checked){
            label.style.display = "block";
            input.style.display = "block";
        }else{
            label.style.display = "none";
            input.style.display = "none";
            input.value=0;
        }
    }

    function vProductOption(){
        let label = document.getElementById('label_Vproduct');
        let input = document.getElementById('input_Vproduct');
        
        label.style.display = "block";
        input.style.display = "block";
    }

    function vGeneralOption(){
        let label = document.getElementById('label_Vproduct');
        let input = document.getElementById('input_Vproduct');

        label.style.display = "none";
        input.style.display = "none";
        input.value="";
    }
    
</script>

    

