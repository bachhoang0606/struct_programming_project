@extends('layouts.admins.layouts')
@section('content')
<h1 class="text-center">Freeship Voucher</h1>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable({{ Js::from($result) }});
      var options = {
        chart: {
          title: 'Freeship voucher creatd and used',
          subtitle: 'Created and Used',
        },
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material'));
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    
</script>
<div class="row justify-center" style="margin-top: 50px;">
    <div id="barchart_material" style="height: 500px;"></div>
</div>
<br><br>
<table>
    <th>ID</th>
    <th>Price</th>
    <th>Quantium</th>
    <th>Total</th>
    <th>Effective Date</th>
    <th>Expiration Date</th>
    <?php
    foreach ($freeships as $freeship) {
        $voucher = $freeship->voucher;
        print '<tr>';
        print "<td>$freeship->voucher_id</td>";
        print "<td>$freeship->price</td>";
        print "<td>$voucher->quantium</td>";
        print "<td>$voucher->total</td>";
        print "<td>$voucher->effective_date</td>";
        print "<td>$voucher->expiration_date</td>";
        print '</tr>';
    }
    ?>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection