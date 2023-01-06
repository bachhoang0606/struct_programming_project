@extends('userPages.ui.index')

@section('display')

    <div class="wrapper">
        <div class="navbar-voucher">
            <a class="navbar-text all" href="{{route('displayAll', 1 )}}" onclick="addActive()">All</a>
            <a class="navbar-text" href="{{route('displayFreeships', 1 )}}">FreeShips</a>
            <a class="navbar-text" href="{{route('displayPercent', 1 )}}">Percent</a>
            <a class="navbar-text" href="{{route('displayPrice', 1 )}}">Price</a>
        </div>
        @yield('voucherlist')
    </div>
@endsection