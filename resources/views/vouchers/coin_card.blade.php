@extends('layouts.layouts')
@section('content')
<h2>User coin</h2>
    <div class="container-fluid my-3">
        @foreach ($coinCards as $coinCard)
            <div class="card mb-3">
                <div class="card-header">
                    {{$coinCard->name}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">Phone number: {{ $coinCard->phone }}</div>
                        <div class="col">Email: {{ $coinCard->email }}</div>
                        <div class="col">Coin: {{ $coinCard->coin }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection