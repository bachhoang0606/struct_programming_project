@extends('layouts.users.layouts')

@section('display')

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
<div>
<h2>Choose vouchers:</h2>
<form action="" method="GET">
    <table class="table">
        <thead>
            <th>Title</th>
            <th>Content</th>
            <th>Minimum price</th>
            <th>Quantium</th>
            <th>Expire at</th>
            <th>Choose this</th>
        </thead>
        <tbody id="result">
        </tbody>
    </table>
    <p></p>
    <input type="submit" id="submit_button" value="Submit" class="btn btn-success">
</form>
</div>
<script>
    let userId;
    let user_vouchers = new Array();
    let voucher_id;

    function getVoucherId(id){
        voucher_id = id;
    }

    function setUser(id){
        userId = id;
    }

    setUser({{$id}});

    fetch(`/api/user-has-voucher/${userId}`).then((res) => res.json()).then(
        response =>{
            //console.log(response.data.voucher_list[0].id);
            for (let i = 0; i < response.data.voucher_list.length; i++){
                user_vouchers.push(response.data.voucher_list[i].id);
            }
            //console.log(user_vouchers);
        }
    ).catch(error => console.log(error));

    
    fetch('/api/vouchers').then((res) => res.json()).then(
        response => {
            //console.log(response.data);
            let output = '';
            for (let i = 0; i < response.data.length; i++){
                if (user_vouchers.includes(response.data[i].id)){
                    output += `
                    <tr>
                        <td>${response.data[i].titlle}</td>
                        <td>${response.data[i].content}</td>
                        <td>${response.data[i].minimun_price}</td>
                        <td>${response.data[i].quantium}</td>
                        <td>${response.data[i].expiration_date}</td>
                    <td>
                        <input type="radio" name="voucher_id" value="${response.data[i].id}" onclick="getVoucherId(${response.data[i].id})" disabled>
                    </td>
                    </tr>
                `;
                }else{
                    output += `
                    <tr>
                        <td>${response.data[i].titlle}</td>
                        <td>${response.data[i].content}</td>
                        <td>${response.data[i].minimun_price}</td>
                        <td>${response.data[i].quantium}</td>
                        <td>${response.data[i].expiration_date}</td>
                    <td>
                        <input type="radio" name="voucher_id" value="${response.data[i].id}" onclick="getVoucherId(${response.data[i].id})">
                    </td>
                    </tr>
                `;
                }
            }
            document.getElementById("result").innerHTML = output;
        }
    ).catch(error => console.log(error));

    window.addEventListener("load", function(){
        document.getElementById("submit_button").addEventListener("click", function(event){
            event.preventDefault();

            let apiUrl = '/api/create-user-voucher?user_id=' + userId + '&voucher_id=' + voucher_id;
            fetch(apiUrl, {method: 'POST',})
            .then(response => response.json())
            .then(
                response => {
                    if (response.message == "user had this voucher"){
                        alert(response.message);
                    }else{
                        window.location.reload();
                        alert("Add voucher successful!");
                    }
                        
                }
            )
        });
    });

</script>
@endsection

