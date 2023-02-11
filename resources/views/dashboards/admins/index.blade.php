@extends('layouts.admins.layouts')
@section('content')
@if (session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif
<script type="text/javascript">
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable({{ Js::from($result) }});
  var options = {
    chart: {
      title: 'the number of vouchers generated and the remaining quantity',
      subtitle: 'Total and quantium',
    },
  };
  var chart = new google.charts.Bar(document.getElementById('barchart_material'));
  chart.draw(data, google.charts.Bar.convertOptions(options));
}

</script>
<div class="container-fluid px-4">

  <h1>Dashboard</h1>

  <div class="row" style="margin-left : 20px ;margin-top :50px;">
    <div class="col-xl-3 col-sm-8 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5" style="font-size: 20px;">{{$freeship}} Freeship Voucher</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{route('freeship')}}">
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
          <div class="mr-5" style="font-size: 20px;">{{$percent}} Percent Discount Voucher</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{route('percent_discount')}}">
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
          <div class="mr-5" style="font-size: 20px;">{{$price}} Price Discount Voucher</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{route('price_discount')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    
    <div class="row" style="margin-top: 50px;">
    <div id="barchart_material" style="width: 1300px; height: 500px;"></div>
    </div>
    <div class="row" style="margin-top: 50px;">
    <canvas id="myChart" height="600px"></canvas>
    </div>
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
          label: 'Number of vouchers created',
          backgroundColor: 'blue',
          borderColor: 'blue',
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