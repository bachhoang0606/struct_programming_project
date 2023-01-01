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
<div>
<h2>Choose vouchers:</h2>
<form action="" method="GET">
    <table>
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
    <input type="submit" id="submit_button" value="Submit">
</form>
</div>

@endsection

<script>
    let numberOfVoucher;
    fetch('/api/vouchers').then((res) => res.json()).then(
        response => {
            //console.log(response.data);
            let output = '';
            numberOfVoucher = response.data.length;
            for (let i = 0; i < response.data.length; i++){
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
            document.getElementById("result").innerHTML = output;
        }
    ).catch(error => console.log(error));
    
    let voucher_id;

    function getVoucherId(id){
        voucher_id = id;
    }

    window.addEventListener("load", function(){
        document.getElementById("submit_button").addEventListener("click", function(event){
            event.preventDefault();

            let userId = "1";
            let apiUrl = '/api/create-user-voucher?user_id=' + userId + '&voucher_id=' + voucher_id;
            fetch(apiUrl, {method: 'POST',})
            .then(response => response.json())
            .then(
                response => {
                    if (response.message == "user had this voucher"){
                        alert(response.message);
                    }else
                        alert("Add voucher successful!");
                }
            )
        });
    });
    

    // $("form").on("submit", function(e){
    // e.preventDefault(); //1

    // let this_form = $(this);
    // let url = this_form.attr("action");
    // alert(url);

    // //var $this = $(this); //alias form reference
    

    // // $.ajax({ //2
    // //     url: $this.prop('action'),
    // //     method: $this.prop('method'),
    // //     dataType: 'json',  //3
    // //     data: $this.serialize() //4
    // // }).done( function (response) {
    // //     if (response.hasOwnProperty('status')) {
    // //         $('#target-div').html(response.status); //5
    // //     }
    // // });
    // });

</script>