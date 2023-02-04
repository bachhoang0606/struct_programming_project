@extends('layouts.admins.layouts')
@section('content')
<h2 class="text-center">User coin</h2>
<hr>
<br>
    <div class="container-fluid my-3">
        <div class="row  row-cols-md-2 row-cols-1 g-4">
            @foreach ($coin_cards as $coin_card)
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        {{$coin_card->name}}
                    </div>
                    <div class="card-body">
                            <div class="row">Phone number: {{ $coin_card->phone }}</div>
                            <div class="row">Email: {{ $coin_card->email }}</div>
                            <div class="row">Coin: {{ $coin_card->coin }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection