@extends('layouts.admins.layouts')

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
    <p></p>
    <input type="submit" id="del-button" value="Delete" class="btn btn-danger">
    <a id="edit-tag" href="" class="btn btn-info">Edit this voucher</a>
</form>
</div>
@endsection
<script>
    let voucher_id;

    function getVoucherId(id){
        voucher_id = id;
        console.log(voucher_id);
        document.getElementById("edit-tag").href = '/edit-voucher/' + voucher_id;
    }

    fetch('/api/vouchers').then((res) => res.json()).then(
        response => {
            //console.log(response.data);
            let output = '';
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

    window.addEventListener("load", function(){
        document.getElementById("del-button").addEventListener("click", function(event){
            event.preventDefault();

            if (voucher_id == '' || voucher_id == undefined){
                alert('Need to choose voucher first!');
            }else{
                let apiUrl = '/api/vouchers/delete/' + voucher_id;
                fetch(apiUrl, {method: 'DELETE'})
                .then(response => {
                    if (response.ok)
                        return response.json();
                    
                    //throw new Error('Cannot delete this voucher!');
                })
                // .then(response => response.json())
                .then(
                    response => {
                        console.log(response);
                    }
                ).catch(error => {
                    alert('Cannot delete this voucher');
                });
                window.location.reload();
                }
        });

        document.getElementById("edit-tag").addEventListener("click", function(event){
            if (voucher_id == '' || voucher_id == undefined){
                event.preventDefault();
                alert('Need to choose voucher first!');
            }
        });
    });

    // window.addEventListener("load", function(){
    //     document.getElementById("edit-button").addEventListener("click", function(event){
    //         event.preventDefault();

            
    //     });
    // });

</script>