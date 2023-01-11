@extends('userPages.ui.index')

@section('display')

    <div class="wrapper">
        <div class="navbar-voucher">
            <a class="navbar-text all" href="{{route('displayAll', 3 )}}" onclick="addActive()">All</a>
            <a class="navbar-text" href="{{route('displayFreeships', 3 )}}">FreeShips</a>
            <a class="navbar-text" href="{{route('displayPercent', 3 )}}">Percent</a>
            <a class="navbar-text" href="{{route('displayPrice', 3 )}}">Price</a>
        </div>
        @yield('voucherlist')
    </div>
@endsection