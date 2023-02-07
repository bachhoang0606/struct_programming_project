@extends('layouts.admins.layouts')
@section('content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Voucher', 'Percent'],
      ['Freeship voucher', 100],
      ['Percent Discount voucher', 120],
      ['Price Discount voucher', 90],

    ]);

    var options = {
      title: 'Type of voucher the user uses'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart', 'bar']
  });
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff() {

    var button = document.getElementById('change-chart');
    var chartDiv = document.getElementById('chart_div');

    var data = google.visualization.arrayToDataTable([
      ['Galaxy', 'Created', 'Used'],
      ['1', 500, 490],
      ['2', 350, 180],
      ['3', 300, 250],
      ['4', 400, 380],
      ['5', 450, 280],
      ['6', 200, 80],
      ['7', 320, 80],
      ['8', 380, 280],
      ['9', 270, 200],
      ['10', 320, 180],
      ['11', 100, 100],
      ['12', 280, 180],
      ['13', 350, 320],
      ['14', 470, 420],
      ['15', 600, 550],
      ['16', 400, 100],
      ['17', 350, 200],
      ['18', 200, 180],
      ['19', 190, 80],
      ['20', 100, 90],
      ['21', 220, 150],
      ['22', 250, 180],
      ['23', 200, 150],
      ['24', 100, 80],
      ['25', 300, 280],
      ['26', 200, 180],
      ['27', 400, 250],
      ['28', 350, 180],
      ['29', 230, 180],
      ['30', 100, 80],


     
    ]);

    var materialOptions = {
      width: 900,
      chart: {
        title: 'Users use vouchers',
        subtitle: 'number of vouchers generated on the left, number of vouchers used by users on the right'
      },
      series: {
        0: {
          axis: 'created'
        }, // Bind series 0 to an axis named 'distance'.
        1: {
          axis: 'used'
        } // Bind series 1 to an axis named 'brightness'.
      },
      axes: {
        y: {
          distance: {
            label: 'parsecs'
          }, // Left y-axis.
          brightness: {
            side: 'right',
            label: 'apparent magnitude'
          } // Right y-axis.
        }
      }
    };

    var classicOptions = {
      width: 900,
      series: {
        0: {
          targetAxisIndex: 0
        },
        1: {
          targetAxisIndex: 1
        }
      },
      title: 'number of vouchers generated on the left, number of vouchers used by users on the right',
      // vAxes: {
      //   // Adds titles to each axis.
      //   0: {
      //     title: 'parsecs'
      //   },
      //   1: {
      //     title: 'apparent magnitude'
      //   }
      // }
    };

    function drawMaterialChart() {
      var materialChart = new google.charts.Bar(chartDiv);
      materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
      button.innerText = 'Change to Classic';
      button.onclick = drawClassicChart;
    }

    function drawClassicChart() {
      var classicChart = new google.visualization.ColumnChart(chartDiv);
      classicChart.draw(data, classicOptions);
      button.innerText = 'Change to Material';
      button.onclick = drawMaterialChart;
    }

    drawMaterialChart();
  };
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
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\Freeship::count()}} Freeship</div>
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
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\PercentDiscount::count()}} Percent Discount</div>
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
          <div class="mr-5" style="font-size: 20px;">{{\App\Models\PriceDiscount::count()}} Price Discount</div>
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


      <div id="piechart" style="width: 900px; height: 500px;"></div>


    </div>
    <div class="row">

      <div id="chart_div" style="width: 1000px; height: 500px;"></div>
    </div>
  </div>
</div>




@endsection