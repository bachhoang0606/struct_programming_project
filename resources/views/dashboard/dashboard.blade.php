@extends('layouts.layouts')
@section('content')
<div class="container-fluid">
  <h1 style="margin-bottom:20px;">Dashboard</h1>
  <div class="row">
    <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\Freeship::count()}} Freeship</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('index')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-address-card"></i>
          </div>
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\PercentDiscount::count()}} Percent Discount</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('index')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-comments"></i>
          </div>
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\PriceDiscount::count()}} Price Discount</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('index')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <!-- <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-users"></i>
          </div>
          <div class="mr-5"style="font-size: 20px;">{{\App\Models\User::count()}} Users</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('user')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div> -->
  </div>
  <div class="row" style="margin-top: 200px;">
    <canvas id="myChart" height="500px"></canvas>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
      var labels =  {{ Js::from($labels) }};
      var users =  {{ Js::from($data) }};
      const data = {
        labels: labels,
        datasets: [{
          label: 'Number of vouchers generated per month',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
        }]
      };
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
</script>
@endsection