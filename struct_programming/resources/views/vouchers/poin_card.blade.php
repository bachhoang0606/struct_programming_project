@extends('layouts/layouts')

@section('content')
<div class="container">
    @foreach ($poinCards as $poinCard)
    <div class="card">
        <div class="card-header">
            {{$poinCard->name}}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">Phone number: {{$poinCard->phone}}</div>
                <div class="col">Email: {{$poinCard->email}}</div>
                <div class="col">Poin: {{$poinCard->poin}}</div>
            </div>
        </div>
        
    </div>
    @endforeach
</div>
@endsection