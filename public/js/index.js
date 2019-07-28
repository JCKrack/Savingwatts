function init(){
	console.log("Load Script");
	getValuesToChart();
  getDataIndex();
}

function getDataIndex()
{
  $.ajax({
    type: 'GET', //THIS NEEDS TO BE GET
    url: '/get/dataindex',
    success: function (data) 
    {
      console.log(data);
      updateIndexValues(data);
    },
    error: function(data) 
    { 
      console.log("Error de Json");
    }
    });

}




function getValuesToChart()
{
	$.ajax({
		type: 'GET', //THIS NEEDS TO BE GET
		url: '/get/measurements',
		success: function (data) 
		{
			console.log(data);
			drawChart();
		},
		error: function(data) 
		{ 
			console.log("Error de Json");
		}
		});

}

function drawChart(){
// Get current year for the copyright
  $("#year").text(new Date().getFullYear());

  // Chart
  const dataSource = {
    chart: {
      caption: "Expense Analysis",
      subcaption: "ACME Inc.",
      xaxisname: "Region",
      yaxisname: "Amount (In Watts)",
      numberprefix: "",
      exportenabled: "1",
      theme: "fusion"
    },
    categories: [
      {
        category: [
          {
            label: "05/01/2019"
          },
          {
            label: "05/10/2019"
          },
          {
            label: "05/20/2019"
          },
          {
            label: "05/30/2019"
          }
        ]
      }
    ],
    dataset: [
      {
        seriesname: "Device 01",
        renderas: "line",
        data: [
          {
            value: "100"
          },
          {
            value: "150"
          },
          {
            value: "450"
          },
          {
            value: "700"
          }
        ]
      },
      {
        seriesname: "Device 02",
        renderas: "line",
        data: [
          {
            value: "50"
          },
          {
            value: "350"
          },
          {
            value: "400"
          },
          {
            value: "500"
          }
        ]
      },
      {
        seriesname: "All devices",
        renderas: "area",
        showanchors: "0",
        data: [
          {
            value: "150"
          },
          {
            value: "500"
          },
          {
            value: "850"
          },
          {
            value: "1200"
          }
        ]
      }
    ]
  };

  FusionCharts.ready(function() {
    var myChart = new FusionCharts({
      type: "mscombi2d",
      renderAt: "chart-container",
      width: "100%",
      height: "100%",
      dataFormat: "json",
      dataSource
    }).render();
  });
}

function updateIndexValues(indexValues)
{
  console.log("IndexValueUpdate");
  document.getElementById('totalWatts').innerHTML = indexValues[0];
  document.getElementById('bill').innerHTML = indexValues[1].toFixed(2);
  document.getElementById('devicesHigh').innerHTML = "";
  indexValues[2].forEach(function(element){
    document.getElementById('devicesHigh').innerHTML += "<li>" + element.device_uuid + "</li>";
  });
  document.getElementById('devicesLow').innerHTML = "";
  indexValues[3].forEach(function(element){
    document.getElementById('devicesLow').innerHTML += "<li>" + element.device_uuid + "</li>";
  });
  document.getElementById('wattsDay').innerHTML = indexValues[4]
  document.getElementById('wattsNight').innerHTML = indexValues[5]
  document.getElementById('wattsPerWeek').innerHTML = indexValues[6]
  document.getElementById('wattsPerWeekEnd').innerHTML = indexValues[7]
}