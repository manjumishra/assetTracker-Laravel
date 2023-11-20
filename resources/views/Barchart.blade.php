@extends('dashboard')
<!doctype html>
<html lang="en">
  <head> 
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
     // Load the Visualization API and the barchart package.
      google.charts.load('current', {'packages':['corechart']});
       // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
      


      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

         // Create our data table.
        var data = new google.visualization.DataTable();
         data.addColumn('string', 'Topping');
         data.addColumn('number', 'Active');
        data.addRows([
         <?php echo $chartData; ?>
        ]);

        var barchart_options = {title:'Number of Asset ',
            is3D:true
        };
           
         // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

      chart.draw(data, barchart_options);
    }
    </script>
</head>

<body>
    
@section('con')
    <div id="barchart" style="width: 700px; height: 500px;margin-left:70px;"></div>
    @endsection
</body>
</html>