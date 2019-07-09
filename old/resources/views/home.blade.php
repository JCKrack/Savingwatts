<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Saving Watts</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/gentelella/1.4.0/css/custom.min.css' rel='stylesheet' />
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='/css/style.css' rel='stylesheet' />
  <link href='/css/menu.css' rel='stylesheet' />


  <!-- Scripts para Highcharts-->
  	<script type="text/javascript" src="js/highcharts.js"></script>
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script type="text/javascript" src="/js/menu.js"></script>
  <script type="text/javascript" src="/js/wattsData.js"></script>




</head>
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">SavingWatts</a>
  @foreach($stations as $station)
    <a href="{{ $station->name }}" class="active">{{ $station->name }}</a>
  @endforeach
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<body class="nav-md" onload="initCharts(), getStations({{ json_encode($readings) }},'{{ $stationActual[0]->name }}'),wattsData('{{ $stationActual[0]->name }}')">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
              <span>Saving Watts</span>
            </a>
          </div>

          <div class="clearfix"></div>

          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Devices</h3>
              <ul class="nav side-menu">
                @foreach($stations as $station)
	                <li class="2" onclick="getStations({{ $station->name }})">
	                  <a title="Device Id: {{ $station->name }}" href="/{{ $station->name }}">
	                    <i class="fa fa-plug"></i>
	                    {{$station->name}}
	                  </a>
	                </li>
	            @endforeach
         		<!-- Si no existe-->
         		<!-- Si no existe
                <li>
                  <a href='index.html'>
                    <i class="fa fa-info"></i>
                    no devices discovered yet
                  </a>
                </li>
            	-->
               
              </ul>
            </div>
          </div>

        </div>
      </div>

      <div class="right_col" role="main">
        
        <div class="page-header">
          <div class="row">
            <div class="col-sm-8">
              <div class="device-list-small">
                <ul class="list-inline">
                <!-- Si no existe-->
                <!-- Si no existe
                <li class="f">
                  <a title="Device Id: f" href="/f">
                    <i class="fa fa-plug"></i>
                    
                  </a>
                </li>
                
                <li>
                  <a href="index.html">
                    <i class="fa fa-info"></i>
                    no devices discovered yet
                  </a>
                </li>
            		-->
                
              </ul>
              </div>
              <h1>
                <i class="fa fa-plug"></i> {{ $stationActual[0]->name }}
              </h1>
            </div>
            <div class="col-sm-4">
              <div id="connection-error" class="alert alert-danger" style="display:none">Connection lost. Attempting to re-establish...</div>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile">
              <div class="x_title">
                <h2>
                  <strong>Medidor</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="chartMeter"></div>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel tile">
              <div class="x_title">
                <h2>
                  <strong>Watts de {{ $stationActual[0]->name }}</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="chart1">Hola</div>
              </div>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-4 col-sm-4 col-xs-12 col-lg-2 col-xl-2">
            <div class="x_panel small tile">
              <div class="x_title">
                <h2>
                  <strong>Status</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content small">
                  <h1>
                    <span id="power-state" class="btn btn-success btn-block">ON</span>
                  </h1>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12 col-lg-2 col-xl-2">
            <div class="x_panel small tile">
              <div class="x_title">
                <h2>
                  <strong>Max Watts</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content small">
                <h1><span id="maxVolt"></span><small> W</small></h1>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12 col-lg-2 col-xl-2">
            <div class="x_panel small tile">
              <div class="x_title">
                <h2>
                  <strong>Min Watts</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content small">
                <h1><span id="minVolt"></span> <small>W</small></h1>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12 col-lg-2 col-xl-2">
            <div class="x_panel small tile">
              <div class="x_title">
                <h2>
                  <strong>Promedio Watts</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content small">
                <h1><span id="promVolt">-</span> <small>W</small></h1>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12 col-lg-2 col-xl-2">
            <div class="x_panel small tile">
              <div class="x_title">
                <h2>
                  <strong>Total Watts</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content small">
                <h1><span id="totalVolt">-</span> <small>Kw</small></h1>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12 col-lg-2 col-xl-2">
            <div class="x_panel small tile">
              <div class="x_title">
                <h2>
                  <strong>Tarifa Aprox</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content small">
                <h1 ><span id="uptime">-</span> <small>$</small></h1>
              </div>
            </div>
          </div>

        </div>

		<!--
        <div class="row">
          
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile">
              <div class="x_title">
                <h2>
                  <strong>Logged Usage</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="logged-usage-chart" height="270"></canvas>
              </div>
            </div>
          </div>
        
        </div>
    	-->
      <!--
        <div class="row">

          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel tile">
              <div class="x_title">
                <h2>
                  <strong>Grafica 2</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="chart2"></div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile">
              <div class="x_title">
                <h2>
                  <strong>Grafica 3</strong>
                </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="chart3"></div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  <footer>
    <ul class="list-inline">
      <li>
        <strong>Device name:</strong> dev1</li>
      <li>
        <strong>Info:</strong> model1</li>
      <li>
        <strong>Info:</strong> sw</li>
      <li>
        <strong>Info:</strong> hw</li>
    </ul>
  </footer>
  !-->

  </div>
  </div>

  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://bernii.github.io/gauge.js/dist/gauge.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/2.2.2/moment-duration-format.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@1.4.0/dist/chartjs-plugin-streaming.min.js"></script>

  

</body>

</html>
