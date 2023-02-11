@extends('layouts.users.layouts')

@section('display')
    <div class="wrapper">
        <div class="navbar-voucher">
            <a class="navbar-text all" href="{{route('displayAll', ['id' => $id] )}}" onclick="addActive()">All</a>
            <a class="navbar-text" href="{{route('displayFreeships', ['id' => $id] )}}">FreeShips</a>
            <a class="navbar-text" href="{{route('displayPercent', ['id' => $id] )}}">Percent</a>
            <a class="navbar-text" href="{{route('displayPrice', ['id' => $id] )}}">Price</a>
        </div>
        @yield('voucherlist')
    </div>
@endsection