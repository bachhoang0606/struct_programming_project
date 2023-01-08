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
    <p></p>
    <input type="submit" id="del-button" value="Delete">
    <input type="submit" id="edit-button" value="Edit">
</form>
</div>
@endsection
<script>
    let voucher_id;

    function getVoucherId(id){
        voucher_id = id;
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

            let apiUrl = '/api/vouchers/delete/' + voucher_id;
            fetch(apiUrl, {method: 'DELETE',})
            .then(response => response.json())
            .then(
                response => {
                    window.location.reload();
                    alert('delete success!');
                }
            ).catch((error) => {
                console.error('Error:', error);
                alert('cannot delete!');
            });
        });
    });

</script>