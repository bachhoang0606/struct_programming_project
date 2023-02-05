@extends('layouts.admins.layouts')

@section('content')

<form action="" method="POST" id="edit-form">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <!-- <input type="hidden" name="sent" value="1"> -->

    <div class="form-group">
        <label for="title" class="form-label">Set title</label><br>
        <input type="text" name="title" id="input-title" class="form-control" required>
    </div>
    <p></p>
    <div class="form-group">
        <label for="content" class="form-label">Write description: </label><br>
        <textarea name="content" id="input-content" cols="30" rows="5" placeholder="Describe voucher" class="form-control" required></textarea>
    </div>
    <p></p>
    <div class="form-group">
        <label for="minimun_price" class="form-label">Minimum price</label><br>
        <input type="number" name="minimun_price" id="input-min-price" value="0" min="0" class="form-control" required>
    </div>
    <p></p>
    <div class="form-group">
        <label for="quantium" class="form-label">Amount of vouchers:</label><br>
        <input type="number" name="quantium" id="input-quantium" value="1" min="1" class="form-control" required>
    </div>
    <p></p>    
    <div class="form-group">
        <label for="effective_date" class="form-label">Effective date: </label>
        <input type="date" name="effective_date" id="input-eff-date" class="form-control" >
    </div>
    <div class="form-group">
        <label for="expiration_date" class="form-label">Expiration date: </label>
        <input type="date" name="expiration_date" id="input-exp-date" class="form-control">
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
    <p></p><input type="submit" id="submit_button" name="submit_btn" value="Update" class="btn btn-primary">
</form>
<br>
@endsection

<script>
    //need to get back to prev page
    let voucher_id;

    function getVoucherId(id){
        voucher_id = id;
    }

    //getVoucherId(4);
    
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

    
    window.addEventListener("load", function(){
        let currentUrl = window.location.href
        //console.log(currentUrl);
        let str_arr = currentUrl.split("/");
        //console.log(str_arr[str_arr.length -1]);
        getVoucherId(str_arr[str_arr.length -1]);
        console.log('voucher_id: ' + voucher_id);
        document.getElementById("edit-form").action = `/api/vouchers/update/${voucher_id}`;
        // document.getElementById("submit_button").addEventListener("click", function(event){
        //     event.preventDefault();
        //     document.getElementById("edit-form").submit();
        //     //window.location.replace("http://localhost:8000/admins/del-voucher");
        // });

        fetch('/api/vouchers').then((res) => res.json()).then(
            response => {
                let i;
                for (i = 0; i < response.data.length; i++){
                    if (response.data[i].id == voucher_id){
                        break;
                    } 
                }
                document.getElementById("input-title").value = response.data[i].titlle;
                document.getElementById("input-content").value = response.data[i].content;
                document.getElementById("input-min-price").value = response.data[i].minimun_price;
                document.getElementById("input-quantium").value = response.data[i].quantium;
                document.getElementById("input-eff-date").value = response.data[i]["effective date"].split(" ")[0];
                //console.log(response.data[i]["effective date"].split(" ")[0]);
                document.getElementById("input-exp-date").value = response.data[i]["expiration_date"].split(" ")[0];
                let type = response.data[i].type;
                if (type == 1)
                    document.getElementById("free_ship").checked = true;
                else if (type == 2)
                    document.getElementById("percent_discount").checked = true;
                else
                    document.getElementById("price_discount").checked = true;
            }
        )
    });
    
</script>