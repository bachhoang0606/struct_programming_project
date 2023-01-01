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
<form action="" method="POST">
    <input type="hidden" name="sent" value="1">
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
    <input type="submit" value="Submit">
</form>
</div>


@endsection

<script>
    fetch('http://127.0.0.1:8000/api/vouchers?fbclid=IwAR0KyYRwTAtAMKP84mDPKCSG1CdOlqyBQpkc6F7Kf-HrUm9SMHjadvyXfzM').then((res) => res.json()).then(
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
                        <input type="checkbox" name="listSelectedVouchers[]" value="${response.data[i].id}">
                    </td>
                </tr>
                `;
            }
            document.getElementById("result").innerHTML = output;
        }
    ).catch(error => console.log(error));
</script>