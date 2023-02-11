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
    let arr_voucher_id = [];
    

    function getVoucherIdAndType(id){
        voucher_id = id;
        console.log(voucher_id);

        let checkBox = document.getElementById(id);
        if (checkBox.checked == false){
            console.log("checked false");
            let index = arr_voucher_id.indexOf(id);
            if (index !== -1)
                arr_voucher_id.splice(index, 1);
            else
                console.log("khong tim thay id");

            console.log(arr_voucher_id);
        }else
            arr_voucher_id.push(voucher_id);

        //document.getElementById("edit-tag").href = '/admins/edit-voucher/' + arr_voucher_id[0];

        document.getElementById("edit-tag").href = '/admins/edit-voucher/' + [arr_voucher_id[0]];
    }

    // fetch('/api/vouchers').then((res) => res.json()).then(
    //     response => {
    //         //console.log(response.data);
    //         let output = '';
    //         for (let i = 0; i < response.data.length; i++){
    //                 output += `
    //                 <tr>
    //                     <td>${response.data[i].titlle}</td>
    //                     <td>${response.data[i].content}</td>
    //                     <td>${response.data[i].minimun_price}</td>
    //                     <td>${response.data[i].quantium}</td>
    //                     <td>${response.data[i].expiration_date}</td>
    //                 <td>
    //                     <input type="checkbox" name="voucher_id_${response.data[i].id}" id="${response.data[i].id}" value="${response.data[i].id}" onclick="getVoucherId(${response.data[i].id})">
    //                 </td>
    //                 </tr>
    //             `;
    //         }
    //         document.getElementById("result").innerHTML = output;
    //     }
    // ).catch(error => console.log(error));

    window.addEventListener("load", function(){
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
                        <input type="checkbox" name="voucher_id_${response.data[i].id}" id="${response.data[i].id}" value="${response.data[i].id}" onclick="getVoucherIdAndType(${response.data[i].id})">
                    </td>
                    </tr>
                `;
            }
            document.getElementById("result").innerHTML = output;
            }
        ).catch(error => console.log(error));

        document.getElementById("del-button").addEventListener("click", function(event){
            if (arr_voucher_id.length == 0){
                event.preventDefault();
                alert('Need to choose voucher first!');
            }else{
                //construct params
                event.preventDefault();
                let params = '';
                arr_voucher_id.forEach(Element => {
                    params += `ids[]=${Element}&`;
                })

                let apiUrl = '/api/vouchers/delete?' + params.slice(0, -1);

                //event.preventDefault(); //test 
                //console.log(apiUrl);

                fetch(apiUrl, {method: 'DELETE',})
                .then(response => response.json())
                .then(
                    response => {
                        console.log(response);
                    }
                ).catch(error => {
                    //alert('Cannot delete this voucher');
                    console.log(error);
                });
                window.location.reload();
            }
        });

        document.getElementById("edit-tag").addEventListener("click", function(event){
            if (arr_voucher_id.length != 1){
                event.preventDefault();
                alert('Please choose one voucher to edit');
            }
        });
    });

</script>