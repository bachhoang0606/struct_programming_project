@extends('layouts.admins.layouts')
@section('content')
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable({{ Js::from($result) }});
      var options = {
        chart: {
          title: 'Price Discount voucher creatd and used',
          subtitle: 'Created and Used',
        },
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material'));
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    
</script>
<h2 class="text-center">Price Discount Voucher</h2>
<div class="row justify-center" style="margin-top: 50px;">
    <div id="barchart_material" style="height: 500px;"></div>
</div>
<br><br>
  <table>
      <th>ID</th>
      <th>Price</th>\
      <th>Quantium</th>
      <th>Total</th>
      <th>Effective Date</th>
      <th>Expiration Date</th>
      <?php
      foreach ($price_discounts as $price_discount) {
          $voucher = $price_discount->voucher;
          print '<tr>';
          print "<td>$price_discount->voucher_id</td>";
          print "<td>$price_discount->price</td>";
          print "<td>$voucher->quantium</td>";
          print "<td>$voucher->total</td>";
          print "<td>$voucher->effective_date</td>";
          print "<td>$voucher->expiration_date</td>";
          print '</tr>';
      }
      ?>
  </table>
@endsection