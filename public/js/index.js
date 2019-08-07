function init(){
	console.log("Load Script");
  setInterval(function(){
    getValuesToChart();
    getDataIndex();
    console.log("Actualizado");
  },2000);

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
      drawChart(data);
		},
		error: function(data) 
		{ 
			console.log("Error de Json");
		}
		});

}

function drawChart(mySeries){
Highcharts.chart('chart-container', {
    plotOptions: {
      series: {
          animation: false
      }
  },
  chart: {
    type: 'area',
    zoomType: 'x'
  },

  title: {
    text: 'Area chart  negative values'
  },
  xAxis: {
    categories: mySeries['dates'],
    reversed: true
  },
  credits: {
    enabled: false
  },
  series: mySeries['series']
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