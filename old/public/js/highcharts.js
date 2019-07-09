function initCharts(){
  console.log("Script Load")
}
function ajaxMaxVolt(station){

  $.ajax({
    type: 'GET', //THIS NEEDS TO BE GET
    url: '/test/test',
    data: {station:station},

    success: function (data) {
            document.getElementById('maxVolt').innerHTML = data[0].valueMax;
              document.getElementById('minVolt').innerHTML = data[0].valueMin;
              document.getElementById('promVolt').innerHTML = data[0].valueProm.toFixed(1);
              document.getElementById('totalVolt').innerHTML = (data[0].totalVolt.toFixed(1) / 1000).toFixed(1);
              document.getElementById('uptime').innerHTML = (((data[0].totalVolt.toFixed(1) / 1000) * 0.617)/30).toFixed(1);
        //prepareChart(data);

        
    },
    error: function(data) { 
         console.log(data);
    }
});



}

function getStations(readings,station){
  ajaxMaxVolt(station); // get Values for Status/MaxVolt/MinVolt/PromVolt/TotalVolt
  var seriesData = [];
  var xAxisCategories = [];
  var volts;
  //read data
  readings.forEach(function(item) {
    xAxisCategories.push(item.created_at);
    seriesData.push(parseFloat(item.value));
  });
  volts = seriesData[0];
  chart1(seriesData,xAxisCategories,station);
  //chart2(seriesData,xAxisCategories,station);
  //chart3(seriesData,xAxisCategories,station);
  chart4(volts,station);
  getDatas(station); // getData for Real Time Chart

}

function drawChart(readings,station){

  var seriesData = [];
  var xAxisCategories = [];
  readings.forEach(function(item) {
    xAxisCategories.push(item.created_at);
    seriesData.push(parseFloat(item.value));
  });
  chart1(seriesData,xAxisCategories,station);

}

function getDatas(station){

  setInterval(function(){

    $.ajax({
    type: 'GET', //THIS NEEDS TO BE GET
    url: '/get/data',
    data: {station:station},

    success: function (data) {
          drawChart(data,station);
            

        
    },
    error: function(data) { 
         console.log(data);
    }
  });





  },2000);


}

function chart1(seriesData,xAxisCategories,station){

$.getJSON(
  'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
  function (data) {

    Highcharts.chart('chart1', {
      chart: {
        zoomType: 'x'
      },
      title: {
        text: 'Watts de ' + station
      },
      subtitle: {
        text: document.ontouchstart === undefined ?
            ' ' : ' '
      },
      xAxis: {
        reversed: true,
        type: 'datetime',
        categories: xAxisCategories

      },
      yAxis: {
        title: {
          text: 'Watts'

        }
      },
      legend: {
        enabled: false
      },
      plotOptions: {
        series: {
          animation: false
        },
        area: {
          fillColor: {
            linearGradient: {
              x1: 0,
              y1: 0,
              x2: 0,
              y2: 1
            },
            stops: [
              [0, Highcharts.getOptions().colors[0]],
              [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
            ]
          },
          marker: {
            radius: 2
          },
          lineWidth: 1,
          states: {
            hover: {
              lineWidth: 1
            }
          },
          threshold: null
        }
      },

      series: [{
        type: 'area',
        name: 'Watts',
        data: seriesData
      }]
    });
  }
);

}

function chart2(seriesData,xAxisCategories,station){

$.getJSON(
  'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
  function (data) {

    Highcharts.chart('chart2', {
      chart: {
        zoomType: 'x'
      },
      title: {
        text: 'Voltaje de ' + station
      },
      subtitle: {
        text: document.ontouchstart === undefined ?
            ' ' : ' '
      },
      xAxis: {
        reversed: true,
        type: 'datetime',
        categories: xAxisCategories

      },
      yAxis: {
        title: {
          text: 'volts'

        }
      },
      legend: {
        enabled: false
      },
      plotOptions: {
        area: {
          fillColor: {
            linearGradient: {
              x1: 0,
              y1: 0,
              x2: 0,
              y2: 1
            },
            stops: [
              [0, Highcharts.getOptions().colors[0]],
              [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
            ]
          },
          marker: {
            radius: 2
          },
          lineWidth: 1,
          states: {
            hover: {
              lineWidth: 1
            }
          },
          threshold: null
        }
      },

      series: [{
        type: 'area',
        name: 'Volts',
        data: seriesData
      }]
    });
  }
);

}

function chart3(seriesData,xAxisCategories,station){

$.getJSON(
  'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
  function (data) {

    Highcharts.chart('chart3', {
      chart: {
        zoomType: 'x'
      },
      title: {
        text: 'Voltaje de ' + station
      },
      subtitle: {
        text: document.ontouchstart === undefined ?
            ' ' : ' '
      },
      xAxis: {
        reversed: true,
        type: 'datetime',
        categories: xAxisCategories

      },
      yAxis: {
        title: {
          text: 'volts'

        }
      },
      legend: {
        enabled: false
      },
      plotOptions: {
        area: {
          fillColor: {
            linearGradient: {
              x1: 0,
              y1: 0,
              x2: 0,
              y2: 1
            },
            stops: [
              [0, Highcharts.getOptions().colors[0]],
              [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
            ]
          },
          marker: {
            radius: 2
          },
          lineWidth: 1,
          states: {
            hover: {
              lineWidth: 1
            }
          },
          threshold: null
        }
      },

      series: [{
        type: 'area',
        name: 'Volts',
        data: seriesData
      }]
    });
  }
);

}

function chart4(volts,station){
  Highcharts.chart('chartMeter', {

  chart: {
    type: 'gauge',
    plotBackgroundColor: null,
    plotBackgroundImage: null,
    plotBorderWidth: 0,
    plotShadow: false
  },

  title: {
    text: 'Medidor de Watts'
  },

  pane: {
    startAngle: -150,
    endAngle: 150,
    background: [{
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#FFF'],
          [1, '#333']
        ]
      },
      borderWidth: 0,
      outerRadius: '109%'
    }, {
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#333'],
          [1, '#FFF']
        ]
      },
      borderWidth: 1,
      outerRadius: '107%'
    }, {
      // default background
    }, {
      backgroundColor: '#DDD',
      borderWidth: 0,
      outerRadius: '105%',
      innerRadius: '103%'
    }]
  },

  // the value axis
  yAxis: {
    min: 0,
    max: 200,

    minorTickInterval: 'auto',
    minorTickWidth: 1,
    minorTickLength: 10,
    minorTickPosition: 'inside',
    minorTickColor: '#666',

    tickPixelInterval: 30,
    tickWidth: 2,
    tickPosition: 'inside',
    tickLength: 10,
    tickColor: '#666',
    labels: {
      step: 2,
      rotation: 'auto'
    },
    title: {
      text: 'Watts'
    },
    plotBands: [{
      from: 0,
      to: 120,
      color: '#55BF3B' // green
    }, {
      from: 120,
      to: 160,
      color: '#DDDF0D' // yellow
    }, {
      from: 160,
      to: 200,
      color: '#DF5353' // red
    }]
  },

  series: [{
    name: 'Speed',
    data: [volts],
    tooltip: {
      valueSuffix: ' km/h'
    }
  }]

},
// Add some life
function (chart) {
  
  if (!chart.renderer.forExport) {
    setInterval(function () {
      var point = chart.series[0].points[0],
        newVal,

      newVal = WattsForMetre(station);
      console.log(newVal);
      point.update(newVal);

    }, 2000);
  }
});

}

function WattsForMetre(station){
  var wattsValue;
  $.ajax({
    type: 'GET', //THIS NEEDS TO BE GET
    url: '/get/dataMetre',
    async: false,  
    data: {station:station},

    success: function (readings) {

      var xAxisCategories = [];
      var seriesData = [];
      readings.forEach(function(item) {
        xAxisCategories.push(item.created_at);
        seriesData.push(parseFloat(item.value));
      });
      wattsValue = seriesData[0];
        
    },
    error: function(data) { 
         console.log(data);
    }
  });
  return wattsValue;
}


function returnData(data){
  console.log(data);
  return data;

}